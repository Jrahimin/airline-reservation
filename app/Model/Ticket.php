<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zend\Diactoros\Request;

class Ticket extends Model
{
    use SoftDeletes;

    protected $table = 'tickets';
    public $fillable = ['trip_id', 'departure_date_time', 'depart_from', 'arrive_at', 'price',
        'order_id', 'checked'];

    protected $dates = ['deleted_at'];

    public function order() {
        return $this->belongsTo('App\Model\Order');
    }

    public function passenger() {
        return $this->hasOne('App\Model\Passenger');
    }

    public function trip() {
        return $this->belongsTo('App\Model\Trip');
    }

    public function insertTicket(Order $order, Trip $trip, $price)
    {
        $this->trip_id = $trip->id;
        $this->departure_date_time = $trip->departure_date_time;
        $this->depart_from = $trip->departure_port->id;
        $this->arrive_at = $trip->destination_port->id;
        $this->price = $price;
        $this->order_id = $order->id;
        $this->save();

        //trip remaining seat calculation
        $trip->ferry_remaining_seat = $trip->ferry_remaining_seat - 1;
        $trip->save();

        return $this;
    }

    public function deleteTicket(Ticket $ticket)
    {
        $ticket->passenger()->delete();

        //adding trip seats
        $trip = $ticket->trip;
        $trip->ferry_remaining_seat = $trip->ferry_remaining_seat + 1;
        $trip->save();

        $ticket->delete();
    }
}
