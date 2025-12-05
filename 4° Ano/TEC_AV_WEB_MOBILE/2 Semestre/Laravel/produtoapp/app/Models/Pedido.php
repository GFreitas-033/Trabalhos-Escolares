<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id'];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function produtos(){
        return $this->belongsToMany('App\Models\Produto','itens_pedidos')->withPivot('id', 'quantidade');
    }
}