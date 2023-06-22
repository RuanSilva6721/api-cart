<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookStoreRequest;
use App\Http\Requests\UpdateBookStoreRequest;
use App\Models\BookStore;
use App\Services\BookStoreService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class BookStoreController extends Controller
{
    private $BookStoreService;
    private $logger;

    public function __construct(BookStoreService $BookStoreService, LoggerInterface $logger)
    {
        $this->BookStoreService = $BookStoreService;
        $this->logger = $logger;
    }

    public function getBookStoreAll()
    {
        try {
            return $this->BookStoreService->getBookStoreAll();
        } catch (\Exception $e) {
            $this->logError($e);
            return new JsonResponse([
                'error' => true,
                'message' => 'Ocorreu um erro ao obter os livros da loja.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function getBookStoreOne($id)
    {
        try {
            return $this->BookStoreService->getBookStoreOne($id);
        } catch (\Exception $e) {
            $this->logError($e);
            return new JsonResponse([
                'error' => true,
                'message' => 'Ocorreu um erro ao obter o livro da Loja.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
    public function createBookStore(Request $request)
    {
        try {
            $result = $this->BookStoreService->createBookStore($request);
            if ($result) {
                return new JsonResponse([
                    'success' => true,
                    'message' => 'Livro Adicionado a Loja com sucesso.'
                ], 201);
            } else {
                return new JsonResponse([
                    'error' => true,
                    'message' => 'Não foi possível fazer a criação do Livro na Loja.'
                ], 404);
            }
        } catch (\Exception $e) {
            $this->logError($e);
            return new JsonResponse([
                'error' => true,
                'message' => 'Ocorreu um erro ao criar a marca.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function editBookStore($id, Request $request)
    {
        try {
            $result = $this->BookStoreService->editBookStore($id, $request);
            if ($result) {
                return new JsonResponse([
                    'success' => true,
                    'message' => 'Livro editada com sucesso.'
                ], 200);
            } else {
                return new JsonResponse([
                    'error' => true,
                    'message' => 'Não foi possível encontrar o Livro para edição.'
                ], 404);
            }
        } catch (\Exception $e) {
            $this->logError($e);
            return new JsonResponse([
                'error' => true,
                'message' => 'Ocorreu um erro ao editar o Livro.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteBookStore($id)
    {
        try {
            $this->BookStoreService->deleteBookStore($id);
            return response()->json('Livro excluido com Sucesso!',204);
 
        } catch (\Exception $e) {
            $this->logError($e);
            return new JsonResponse([
                'error' => true,
                'message' => 'Ocorreu um erro ao excluir o Livro.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    private function logError(\Exception $exception)
    {
        $this->logger->error('Erro no controlador BookStoreController', [
            'message' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString()
        ]);
    }
}
