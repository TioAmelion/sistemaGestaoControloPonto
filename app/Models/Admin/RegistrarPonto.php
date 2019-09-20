<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RegistrarPonto extends Model
{
    protected $table = "registro";
    protected $fillable = ['id', 'func_id','data', 'entrada', 'saida_a', 'entrada_a', 'saida'];
    protected $guarded = ['id'];
}
