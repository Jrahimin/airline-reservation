<?php

namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Port;
use App\Model\Trip;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function search(Request $request) {

        $rules  = [
            'departure_port_id' => 'required',
            'destination_port_id' => 'required',
            'departure_date' => 'required|date',
            'trip_type' => 'required',
            'pax' => 'required|numeric|min:1',
        ];

        if ($request->trip_type == "2")
            $rules['return_date'] = 'required|date|after_or_equal:departure_date';

        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()){
            return response()->json([ "success" => false,
                "message" => $validation->errors()->first()], 406);
        }

        //$ports = Port::all();

        $trips = Trip::where('departure_port_id', $request->departure_port_id)
            ->where('destination_port_id', $request->destination_port_id)
            ->whereDate('departure_date_time', $request->departure_date)
            ->where('ferry_remaining_seat', '>=', $request->pax)
            ->with('company','ferry')->get();

        $return_trips = collect([]);
        if ($request->trip_type == "2"){
            $return_trips = Trip::where('departure_port_id', $request->destination_port_id)
                ->where('destination_port_id', $request->departure_port_id)
                ->whereDate('departure_date_time', $request->return_date)
                ->where('ferry_remaining_seat', '>=', $request->pax)
                ->with('company','ferry')->get();
        }

        $departure_port = Port::find($request->departure_port_id);
        $destination_port = Port::find($request->destination_port_id);

        $tripsWithCompany = array();
        foreach($trips as $trip)
        {
            $tripArray = array(
                "id"=>$trip->id,
                "departure_date"=>date("Y-m-d", strtotime($trip->departure_date_time)),
                "departure_time"=>date('h:i A', strtotime($trip->departure_date_time)),
                "remaining_seat"=>$trip->ferry_remaining_seat,
                "comapany_name"=>$trip->company->name,
                "image_url"=>asset('').$trip->company->image_url,
                "ferry_name"=>$trip->ferry->name,
            );
            array_push($tripsWithCompany,$tripArray);
        }

        $returnTripsWithCompany = array();
        foreach($return_trips as $returnTrip)
        {
            $returnTripArray = array(
                "id"=>$returnTrip->id,
                "departure_date"=>date("Y-m-d", strtotime($returnTrip->departure_date_time)),
                "departure_time"=>date('h:i A', strtotime($returnTrip->departure_date_time)),
                "remaining_seat"=>$returnTrip->ferry_remaining_seat,
                "comapany_name"=>$returnTrip->company->name,
                "image_url"=>asset('').$returnTrip->company->image_url,
                "ferry_name"=>$returnTrip->ferry->name,
            );
            array_push($returnTripsWithCompany,$returnTripArray);
        }

        $departure_trip_count = $trips->count();
        $return_trip_count = $return_trips->count();

        $data = null;

        if(!empty($tripsWithCompany))
        {
            $data = array(
                "trips"=> array(
                    "no_of_trips"=>$departure_trip_count,
                    "departure_port"=>$departure_port->name,
                    "destination_port"=>$destination_port->name,
                    "trip_info"=>$tripsWithCompany,
                ),
                "return_trips"=> array(
                    "no_of_trips"=>$return_trip_count,
                    "departure_port"=>$destination_port->name,
                    "destination_port"=>$departure_port->name,
                    "trip_info"=>$returnTripsWithCompany,
                ),
            );
        }

        if($data!==null)
            return response()->json(["success"=>true, "data"=>$data], 200);
        else
            return response()->json(["success"=>true, "data"=>$data], 200);

    }

    public function upcomingTrips()
    {
        $add = 8;
        $trips = Trip::where('departure_date_time', '>=', Carbon::now())
            ->where('departure_date_time', '<=', Carbon::now()->addHours($add))->get();

        return response()->json(["success"=>true, "data"=>$trips], 200);
    }
}


