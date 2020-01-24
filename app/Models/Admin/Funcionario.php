<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionario";
    protected $fillable = ['nome', 'num_bi', 'genero', 'telefone', 'departamento', 'funcao', 'local_trabalho', 'imagem'];
    protected $guarded = ['id'];
}
