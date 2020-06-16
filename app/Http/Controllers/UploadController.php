<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UploadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JSON
     */
    public function __invoke(Request $request)
    {
        $imgpath = $request->file->store('uploads', 'public');
        return response()->json([
            'location' => $imgpath
        ]);
    }
}