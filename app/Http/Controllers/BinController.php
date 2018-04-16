<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BinController extends Controller
{

    public function __construct() {
    	//define middleware for each function here
    	Auth::loginUsingId(1);
    }

    public function getIndex() {
    	$user = Auth::user();
    	if ($user->hasRole('administrator')) {
    		$bins = \App\Bin::all();
    	} else {
    		$bins = Auth::user()->bins;
    	}
    	return view('bins', ['bins' => $bins]);
    }

    public function getObservations($id) {
    	$bin = \App\Bin::findOrFail($id);
    	$observations = $bin->observations->filter(function($obs) use ($bin) {
            return (new \DateTime($obs->created_at))->format("d-M-Y") == (new \DateTime($bin->observations->last()->created_at))->format("d-M-Y");
        })->sort();
    	return view('observations', ['obs' => $observations]);
    }

    public function getInputData($input) {
    	//format: phone number - weight - infrared
    	//e.g. http://localhost:8000/bins/input/+923168653259-5674-1
    	$keys = ["mobile", "weight", 'infrared'];
    	$values = explode('-', trim($input));
		$data = array_combine($keys, $values);
    	if (($data['weight'] <= 10000) && ($data['infrared'] == 0 || $data['infrared'] == 1) && (strlen($data['mobile']) == 13)) {
    		//retrieve bin, create new observation, save observation
    		$bin = \App\Bin::where('mobile', $data['mobile'])->firstOrFail();
    		$bin->observations()->create(['weight' => $data['weight'], 'infrared' => $data['infrared']]);
    		//$obs = \App\observation::create(['bin_id' => $bin->id, 'weight' => $data['weight'], 'infrared' => $data['infrared']]);
    		return "Data Input Successful.";
    	}	
    	return "Invalid Data.";
    }
}
