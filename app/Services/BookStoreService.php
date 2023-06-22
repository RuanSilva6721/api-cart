<?php
namespace App\Services;

use App\Repositories\BookStoreRepository;

class BookStoreService
{
    private $BookStoreRepository;

    public function __construct(BookStoreRepository $BookStoreRepository){
        $this->BookStoreRepository = $BookStoreRepository;
    }
    public function getBookStoreAll()
    {
        return $this->BookStoreRepository->getBookStoreAll();
    }
    public function getBookStoreOne($id)
    {
        return $this->BookStoreRepository->getBookStoreOne($id);
    }
    public function createBookStore($request)
    {
        $user = $request->all();
        return $this->BookStoreRepository->createBookStore($user);
    }
    public function editBookStore($id, $request)
    {
        $user = $request->all();
        return $this->BookStoreRepository->editBookStore($id, $user);
    }
    public function deleteBookStore($id)
    {
        return $this->BookStoreRepository->deleteBookStore($id);
    }
}
