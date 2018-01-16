<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=['name'];

    public function permissions()
    {
        return $this->belongsToMany('Spatie\Permission\Models\Permission');
    }

}
