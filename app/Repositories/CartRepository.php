<?php
namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;


interface CartRepository
{
    public function createCart($user);

}
