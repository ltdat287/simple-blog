<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class MembersController extends Controller
{
    //
    public function index() 
    {
    	$data = Request::all();
    	// dd($data);
    	$valids = Validator::make($data,[
    		'username' => 'required|min:6',
    		'password' => 'required|min:6'
    		]);
    	// dd($valids);
    	if ($valids->fails()) {
    		// dd($valids->messages());
    		return view('members.login')->with('errors',$valids->messages());
    	} else {
    		extract($data);
    		$user = User::where('name', '=', $username)->first();
    		if ($user) {
    			return "Wellcome";
    		} else {
    			view('members.login');
    		}
    	}
    }
}
