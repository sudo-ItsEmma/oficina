<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // datos rellenables desde la vista
    protected $fillable = ['sku', 'name', 'description', 'stock', 'state'];
}
