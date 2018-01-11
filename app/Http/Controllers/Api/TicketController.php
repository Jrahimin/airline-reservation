<?php

namespace App\Http\Controllers\Api;

use App\Model\Order;
use App\Model\Passenger;
use App\Model\Ticket;
use App\Model\Trip;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function bookingStore(Request $request)
    {
        $rules = [
            'email' => 'email|required',
            'contact_no' => 'required',
            'trip_id' => 'required|numeric',
            'return_trip_id' => 'required|numeric',
            'name.*' => 'required',
            'gender.*' => 'required',
            'dob.*' => 'required|date',
            'passport_no.*' => 'required',
            'passport_exp.*' => 'required',
            'nationality.*' => 'required',
            'type_id.*' => 'required'
        ];

        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return response()->json(["success" => false,
                "message" => $validation->errors()->first()], 406);
        }

        $return = $request->return_trip;
        $count = $request->no_of_passenger;
        $trip = Trip::find($request->trip_id);
        $request['company_id'] = $trip->company->id;

        //creating order info
        if($return==1)
            $request['trip_type'] = 2;
        else
            $request['trip_type'] = 1;

        $request['departure_port_id'] = $trip->departure_port_id;
        $request['destination_port_id'] = $trip->destination_port_id;
        $request['departure_trip_id'] = $trip->id;
        $order = Order::create($request->all());

        $print_url = route('order_print', ['orderId'=>$order->id]);

        //Generating tickets and including passengers for mandatory departure trip
        $tickets = collect([]);

        for($i=0; $i<$count; $i++)
        {
            $price = DB::table('trip_passenger_price')->where('trip_id', $request->trip_id)
                ->where('passenger_type_id', $request->type_id[$i])->first();
            $price = $price->price;

            //Booking ticket for each passenger
            $ticket = new Ticket();
            $ticket = $ticket->insertTicket($order, $trip, $price);
            $tickets->push($ticket);

            //inserting passenger for the departure trip
            $passenger = new Passenger();
            $passenger = $passenger->insertPassenger($request, $ticket, $i);
        }

            //checking if round trip...
            if($return==1)
            {
                $tripRound = Trip::find($request->return_trip_id);
                $ticketRounds = collect([]);
                for($i=0; $i<$count; $i++)
                {
                    $priceRound = DB::table('trip_passenger_price')->where('trip_id', $tripRound->id)
                        ->where('passenger_type_id', $request->type_id[$i])->first();

                    $priceRound = $priceRound->price;

                    // Booking ticket for return trip
                    $ticketRound = new Ticket();
                    $ticketRound = $ticketRound->insertTicket($order, $tripRound, $priceRound);
                    $ticketRounds->push($ticketRound);

                    //updating order with return trip
                    $order = $ticketRound->order;
                    $order->return_trip_id = $tripRound->id;
                    $order->save();

                    //inserting passenger for the return trip
                    $passenger = new Passenger();
                    $passenger = $passenger->insertPassenger($request, $ticketRound, $i);
                }

                $data = array("print_url"=>$print_url);
                if($passenger)
                    return response()->json(["success"=>true, "message"=>"Ticket is Booked", "data"=>$data], 200);
                else
                    return response()->json(["success"=>false, "message"=>"Passenger has not been saved"], 406);

            }

        if(!$passenger)
            return response()->json(["success"=>false, "message"=>"Passenger has not been saved"], 406);
        else
            return response()->json(["success"=>true, "message"=>"Ticket is Booked"], 200);
    }

    public function checkTicket(Request $request)
    {
        $rules = [
            'code' => 'required',
            'requestTripId' => 'required|numeric',
        ];

        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return response()->json(["success" => false,
                "message" => $validation->errors()->first()], 406);
        }

        $passenger = Passenger::where('code', $request->code)->first();

        if(!$passenger)
            return response()->json(["success"=>false, "message"=>"ticket code did not match"], 401);

        $ticket = Ticket::find($passenger->ticket_id);
        if($ticket->checked == 1)
            return response()->json(["success"=>false, "message"=>"ticket is already checked"], 401);

        $tripIdFromCode = $ticket->trip->id;

        if($request->requestTripId != $tripIdFromCode)
            return response()->json(["success"=>false, "message"=>"Sorry, Ticket Trip Mismatched"], 401);

        //staus update
        $ticket->checked = 1;
        $ticket->save();
        return response()->json(["success"=>true, "message"=>"Ticket info matched"], 200);
    }

    public function checkHistory()
    {
        $tickets = Ticket::where('departure_date_time', '>=', Carbon::now())
            ->where('departure_date_time', '<=', Carbon::now()->addDays(2))
            ->where('checked', 1)->get();

        return response()->json(["success"=>true, "data"=>$tickets], 200);
    }

}
