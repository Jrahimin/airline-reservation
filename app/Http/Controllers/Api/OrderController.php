<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Model\Trip;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function OrderDetails(Request $request)
    {
        $trip = Trip::where('id', $request->one_way_trip_id)
            ->with('ferry', 'departure_port', 'destination_port', 'prices')->first();

        if(!$trip)
            return response()->json(["success"=>false, "message"=>"No such departure trip found"], 406);

        $passenger_types = array();
        foreach($trip->prices as $price)
        {
            $passengerTypeArray = array(
                "id"=>$price->passenger_type->id,
                "name"=>$price->passenger_type->name,
                "price"=>$price->price,
            );
            array_push($passenger_types, $passengerTypeArray);
        }

        $trip = array(
            "id"=>$trip->id,
            "departure_date"=>$trip->departure_date_time,
            "departure_port"=>$trip->departure_port->name,
            "destination_port"=>$trip->destination_port->name,
            "ferry"=>$trip->ferry->name,
            "no_of_seat"=>$trip->ferry_total_seat,
            "passenger_type"=>$passenger_types,
        );

        $return_trip = null;
        if ($request->trip_type == '2')
        {
            $return_trip = Trip::where('id', $request->return_trip_id)
                ->with('ferry', 'departure_port', 'destination_port', 'prices')->first();

            if(!$return_trip)
                return response()->json(["success"=>false, "message"=>"No such return trip found"], 406);

            $return_passenger_types = array();
            foreach($return_trip->prices as $price)
            {
                $returnPassengerTypeArray = array(
                    "id"=>$price->passenger_type->id,
                    "name"=>$price->passenger_type->name,
                    "price"=>$price->price,
                );
                array_push($return_passenger_types, $returnPassengerTypeArray);
            }

            $return_trip = array(
                "id"=>$return_trip->id,
                "departure_date"=>$return_trip->departure_date_time,
                "departure_port"=>$return_trip->departure_port->name,
                "destination_port"=>$return_trip->destination_port->name,
                "ferry"=>$return_trip->ferry->name,
                "no_of_seat"=>$return_trip->ferry_total_seat,
                "passenger_type"=>$return_passenger_types,
            );
        }

        $data = array(
            "departure_trip"=>$trip,
            "return_trip"=>$return_trip,
        );

        return response()->json(["success"=>true, "data"=>$data], 200);
    }
}
