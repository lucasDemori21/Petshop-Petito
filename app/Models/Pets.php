<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pets extends Model
{
    use HasFactory,Notifiable;

    protected $table = 'pets';
    protected $primaryKey = 'id_pet';

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usn_cod',
        'nome',
        'data_nasc',
        'tipo_pet',
        'sexo',
        'castrado',
        'dono',
        'peso',
        'img_pet',
    ];
}
