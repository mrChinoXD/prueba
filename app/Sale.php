<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;
class Sale extends Model
{
    public function User()
    {
        return $this->hasMany(User::class);
    }
    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
