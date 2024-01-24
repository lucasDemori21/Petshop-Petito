<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agendamento extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'agendamento';
    protected $primaryKey = 'id_agendamento';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_pet',
        'id_func',
        'id_procedimento',
        'usn_cod',
        'dono',
        'descricao',
        'data',
        'valor',
        'forma_pagamento',
    ];
}
