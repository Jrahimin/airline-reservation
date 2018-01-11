<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zend\Diactoros\Request;

class Passenger extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'gender', 'date', 'nationality', 'passport_no', 'passport_exp', 'type_id', 'code'];
    protected $dates = ['deleted_at'];

    public function ticket() {
        return $this->hasOne('App\Model\Ticket');
    }

    public function type() {
        return $this->belongsTo('App\Model\PassengerType');
    }

    public function insertPassenger($request, Ticket $ticket, $i)
    {
        $request['code'] = str_random(20);
        $this->name = $request->name[$i];
        $this->gender = $request->gender[$i];
        $this->type_id = $request->type_id[$i];
        $this->dob = $request->dob[$i];
        $this->nationality = $request->nationality[$i];
        $this->passport_no = $request->passport_no[$i];
        $this->passport_exp = $request->passport_exp[$i];
        $this->ticket_id = $ticket->id;
        $this->code = $request->code;
        $this->save();
        return $this;
    }
}
