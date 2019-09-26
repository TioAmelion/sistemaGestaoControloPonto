<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Faltas extends Model
{
    protected $table = "falta";
    protected $fillable = ['data', 'func_id', 'justificar'];
    protected $guarded = ['id'];
}
