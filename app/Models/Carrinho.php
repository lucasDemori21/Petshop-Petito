<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Carrinho extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'carrinho';
    protected $primaryKey = 'id_carrinho';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_produto',
        'usn_cod',
        'dono',
    ];
}
