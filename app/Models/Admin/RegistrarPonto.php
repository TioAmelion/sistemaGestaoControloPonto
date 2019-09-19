<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RegistrarPonto extends Model
{
    protected = "registro";
    protected $fillable = ['data', 'entrada', 'saida_a', 'entrada_a', 'saida'];
    protected $guarded = ['id'];
}
