<?php
namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;


class CartRepositoryEloquent implements CartRepository
{ 
    public function createCart($user)
    {
        return  DB::transaction(function () use($user) {
             $Cart = new Cart();
             return $Cart->create($user);
         });
    }
}
