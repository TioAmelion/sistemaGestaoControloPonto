<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = "ferias";
     protected $fillable = ['nome','start_date','end_date'];
}
