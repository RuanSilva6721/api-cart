<?php
namespace App\Services;

use App\Repositories\CartRepository;

class CartService
{
    private $cartRepository;

    public function __construct(CartRepository $cartRepository){
        $this->cartRepository = $cartRepository;
    }
    
    public function createCart($request)
    {
        $user = $request->all();
        return $this->cartRepository->createCart($user);
    }
}
