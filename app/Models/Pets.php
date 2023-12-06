<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pets extends Model
{
    use HasFactory,Notifiable;

    protected $table = 'pet';
    protected $primaryKey = 'id_pet';

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_categoria',
        'titulo',
        'descricao',
        'qtd_produto',
        'valor',
        'img_produto',
    ];
}
