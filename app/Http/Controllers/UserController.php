<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{

    public function __construct() {
    	//define middleware for each function here
    	Auth::loginUsingId(1);
    }

    public function getIndex() {
    	$users = \App\User::all();
    	$latestObs = [];
    	foreach ($users as $u) {
    		$observation = \App\Observation::all()->filter(function($o) use ($u) {
    			return ($o->bin->user_id == $u->id);
    		})->sortByDesc('created_at')->first();
    		array_push($latestObs, $observation);
    	}
    	return view('users', ['users' => $users, 'latestObs' => $latestObs]);
    }

}
