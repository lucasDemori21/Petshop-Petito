<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Venda extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'venda';
    protected $primaryKey = 'id_venda';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_venda',
        'id_cliente',
        'date_compra',
        'valor_total',
        'forma_pagamento'
    ];
}
