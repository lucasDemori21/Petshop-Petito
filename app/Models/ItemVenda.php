<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ItemVenda extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'item_venda';
    protected $primaryKey = 'id_item_venda';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_item_venda',
        'id_venda',
        'id_produto',
        'qtd_produto',
        'valor_unitario'
    ];
}
