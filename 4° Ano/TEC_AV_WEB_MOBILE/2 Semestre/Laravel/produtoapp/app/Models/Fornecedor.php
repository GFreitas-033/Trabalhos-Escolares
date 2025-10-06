<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    
    //Permite atribuição em massa nos campos nome, site, uf e email
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
