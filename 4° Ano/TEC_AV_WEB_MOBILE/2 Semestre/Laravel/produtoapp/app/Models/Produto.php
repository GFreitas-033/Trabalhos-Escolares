<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    //Permite atribuição em massa nos campos nome, preco, descricao e quantidade
    protected $fillable = ['nome', 'fornecedor_id', 'preco', 'descricao', 'quantidade'];

    public function fornecedor(){
        //1 Produto pertence a 1 Fornecedor
        return $this->belongsTo('App\Models\Fornecedor');
    }

}
