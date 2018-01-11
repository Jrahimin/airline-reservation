<?php

namespace App\Http\Controllers\Api;

use App\Model\Passenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassengerController extends Controller
{
    public function getPassengerInfo($id)
    {

        $passenger = Passenger::find($id);
        $passenger = array(
            "id"=>$passenger->id,
            "name"=>$passenger->name,
            "gender"=>$passenger->gender,
            "dob"=>$passenger->dob,
            "nationality"=>$passenger->nationality,
            "passport_no"=>$passenger->passport_no,
            "passport_exp"=>$passenger->passport_exp,
            "ticket_id"=>$passenger->ticket_id,
            "type_id"=>$passenger->type_id,
            "code"=>$passenger->code
        );
        $data = array();
        return response()->json($passenger);
    }
}
