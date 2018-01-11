<?php

namespace App\Http\Controllers\Api;

use App\Model\Port;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortController extends Controller
{
    public function all() {

        $ports = Port::all();
        $countries = config('country.countries');
        return response()->json($ports,200);
        //return view('port.all', compact('ports', 'countries'));
    }
}
