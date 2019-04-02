<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Valida_aluno extends Authenticatable
{
    protected $table='valida_aluno';
    //protected $primaryKey = 'gra';
    Public $timestamps = false;
    protected $fillable = [
        'nome',
        'ativo',
        'turno',
        'cpf'];
   // protected $guarded = ['ativo','datacadastro'];
    public $rules = [
        'grr'=>'required|min:11|max:11',
        'nome'=>'required|min:3',
        'ativo'=>'required',
        'turno'=>'required|max:1',
        'cpf'=>'required|min:11',
        'email'=>'required'
    ];
}
