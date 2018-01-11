<?php

namespace App\Http\Controllers;

use App\library\CustomPdf;
use App\library\TicketPrint;
use App\Model\Passenger;
use App\Model\Ticket;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Model\Trip;
use Illuminate\Support\Facades\DB;

class TicketBookingController extends Controller
{
    public function passengerDetails(Request $request)
	{
        $trip = Trip::where('id', $request->one_way_trip_id)
    		->with('ferry', 'departure_port', 'destination_port', 'prices')->first();

    	$return_trip = null;

    	if ($request->trip_type == '2')
			$return_trip = Trip::where('id', $request->return_trip_id)
    		->with('ferry', 'departure_port', 'destination_port', 'prices')->first();

    	return view('ticket.passenger_details', compact('trip', 'return_trip'))
    		->with('pax_no', $request->pax_no);
    }

	public function storeTicket(Request $request)
	{
		$this->validate($request,[
			'email'=>'email|required',
			'contact_no' => 'required',
			'name.*' => 'required',
			'gender.*' => 'required',
			'dob.*' => 'required',
			'passport_no.*' => 'required',
			'passport_exp.*' => 'required',
			'nationality.*' => 'required',
			'type_id.*' => 'required'
		]);

        $return = $request->return_trip;
        $count = $request->no_of_passenger;
        $trip = Trip::find($request->trip_id);

        //creating order info
        if($return==1)
            $request['trip_type'] = 2;
        else
            $request['trip_type'] = 1;

        $request['departure_port_id'] = $trip->departure_port_id;
        $request['destination_port_id'] = $trip->destination_port_id;
        $request['departure_trip_id'] = $trip->id;
        $order = Order::create($request->all());

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
				if($passenger)
				{
					return view('ticket.success', compact('tickets', 'ticketRounds', 'count'));
				}
			}
			else
			{
				$ticketRounds = null;
				return view('ticket.success', compact('tickets', 'ticketRounds', 'count'));
			}
	}

	public function ticketPrint($orderId)
	{
        $order = Order::find($orderId);
        $tickets = collect([]);
        $roundTickets = collect([]);

        foreach($order->tickets as $oneTicket)
        {
            if($oneTicket->trip_id == $order->tickets->first()->trip_id)
            {
                $tickets->push($oneTicket);
            }
            else
            {
                $roundTickets->push($oneTicket);
            }
        }

        $ifRound = $order->trip_type;
        $count = $order->tickets();
        $count = $count->count();
        if($ifRound == 2)
        {
            $count = $count/2;
        }

        //Generating Tickets for one way...
        $ticketId = $tickets->first()->id;
        $pdf = new CustomPdf();
        $ticketCompany = new TicketPrint();
        $ticketCompany->printCompanyHead($pdf, $ticketId);

        //Generating Passengers for one way...
        $add = 0;
        $page = 0;
        for($i =0; $i<$count; $i++)
        {
            $ticketId = $tickets[$i]['id'];
            $printPassengers = new TicketPrint();
            $printPassengers->printPassengers($pdf, $ticketId, $add, $page);

            $add= $add + 65;
            if($i==2)
            {
                $pdf->AddPage();
                $page = 1;
                $add=0;
            }

            if($i!=2 && $page==1 && ($i-2)%4==0)
            {
                $pdf->AddPage();
                $pdf->SetXY(10,10);
                $add = 0;
            }
        }

        //Generating Tickets for round way...
        if($ifRound==2)
        {
            $ticketRoundId = $roundTickets->first()->id;
            $printReturnCompany = new TicketPrint();
            $printReturnCompany->printCompanyHead($pdf, $ticketRoundId);

            //Generating Passengers for round way...
            $add = 0;
            $page = 0;
            for($i =0; $i<$count; $i++)
            {
                $ticketRoundId = $roundTickets[$i]['id'];
                $printPassengers = new TicketPrint();
                $printPassengers->printPassengers($pdf, $ticketRoundId, $add, $page, $i);
                $add= $add + 65;
                if($i==2)
                {
                    $pdf->AddPage();
                    $page = 1;
                    $add=0;
                }

                if($i!=2 && $page==1 && ($i-2)%4==0)
                {
                    $pdf->AddPage();
                    $pdf->SetXY(10,10);
                    $add = 0;
                }

            }
        }
        $pdf->Output('ticket.pdf');
	}


}
