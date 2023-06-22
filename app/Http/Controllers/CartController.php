<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use PHPUnit\Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class CartController extends Controller
{
    private $cartService;
    private $logger;

    public function __construct(CartService $cartService, LoggerInterface $logger)
    {
        $this->cartService = $cartService;
        $this->logger = $logger;
    }
    public function createCart(Request $request)
    {
        $data = $request->all();
        dd($data);
        try {
            $result = $this->cartService->createCart($request);
            if ($result) {
                return new JsonResponse([
                    'success' => true,
                    'message' => 'Produto criado com sucesso.'
                ],201);
            } else {
                return new JsonResponse([
                    'error' => true,
                    'message' => 'Não foi possível criar o produto.'
                ], 500);
            }
        } catch (Exception $e) {
            $this->logError($e);
            return new JsonResponse([
                'error' => true,
                'message' => 'Ocorreu um erro ao criar o produto.',
                'details' => $e->getMessage()
            ], 500);
        }
    }


    private function logError(Exception $exception)
    {
        $this->logger->error('Erro no controlador CartController', [
            'message' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString()
        ]);
    }
}
