<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->rules = array(
            'name' => 'required',
            'email' => 'required|email',
        );
    }
    /**
     * Show the form for editing the user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    	$user = Auth::user();
        return view('dashboard.modules.profile.edit', compact('user'));
    }
    
    /**
     * Update the logged in user based on preferences screen form inputs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$user = Auth::user();
        $this->validate($request, $this->rules);
        $user->name = $request->name;
        $user->email = $request->email;
       	if($request->display_name != null) {
       		$user->display_name = $request->display_name;
       	}
        $user->save();

        return redirect('/admin')->with(['status' => 'User updated!', 'message_type' => 'success']);
    }
}
