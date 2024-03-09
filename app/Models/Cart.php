<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'cart';
    public function getUserTable(){
        return $this->hasOne(user::class);
    }
    public function getProductTable(){
        return $this->hasOne(product::class);
    }
}
