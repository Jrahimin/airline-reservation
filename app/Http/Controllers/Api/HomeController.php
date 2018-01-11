<?php

namespace App\Http\Controllers\Api;

use App\Model\Port;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        $ports = Port::all();
        return response()->json($ports, 200);
    }
}
