<?php
namespace App\Repositories;

use App\Models\BookStore;
use Illuminate\Support\Facades\DB;


interface BookStoreRepository
{

    public function getBookStoreAll();
    public function getBookStoreOne($id);

    public function createBookStore($user);

    public function editBookStore($id, $user);

    public function deleteBookStore($id);

}
