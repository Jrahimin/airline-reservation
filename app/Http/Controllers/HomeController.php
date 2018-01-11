<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Port;
use App\Model\Trip;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index() {
    	$ports = Port::all();

    	return view('home.welcome', compact('ports'));
    }

    public function search(Request $request) {
    	$rules  = [
    			'departure_port_id' => 'required',
    			'destination_port_id' => 'required',
    			'departure_date' => 'required',
    			'trip_type' => 'required',
    			'pax' => 'required',
    		];

		if ($request->trip_type == "2")
			$rules['return_date'] = 'required';

    	$this->validate($request, $rules);

    	$ports = Port::all();

    	$trips = Trip::where('departure_port_id', $request->departure_port_id)
					->where('destination_port_id', $request->destination_port_id)
					->whereDate('departure_date_time', $request->departure_date)
					->where('ferry_remaining_seat', '>=', $request->pax)
					->with('ferry')
					->get();

		$return_trips = Trip::where('departure_port_id', $request->destination_port_id)
					->where('destination_port_id', $request->departure_port_id)
					->whereDate('departure_date_time', $request->return_date)
					->where('ferry_remaining_seat', '>=', $request->pax)
					->with('ferry')
					->get();

		$departure_port = Port::where('id', $request->departure_port_id)->first();
		$destination_port = Port::where('id', $request->destination_port_id)->first();

		return view('home.search_result', compact('trips','return_trips', 'ports', 'departure_port', 'destination_port', 'request'));
    }
}