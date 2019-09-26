<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RegistrarPonto extends Model
{
    protected $table = "registro";
    protected $fillable = ['func_id','data', 'entrada', 'saida_a', 'entrada_a', 'saida', 'status'];
    //protected $guarded = ['id'];
}
