<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
    	'name', 'phone', 'email', 'time_from', 'time_to', 'description', 'room_number', 'floor', 'notes'
    ];
}
