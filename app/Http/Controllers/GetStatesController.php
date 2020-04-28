<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use Illuminate\Support\Facades\Log;

class GetStatesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $countries = new Countries();
        $country = $countries->where('name.common', $request->input('country'))->first();
        $states = $country->hydrateStates()->states->sortBy('name')->pluck('name');
        Log::info(print_r($states, true));
        return response()->json([
            'states' => $states,
        ]);
    }
}
