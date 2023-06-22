<?php
namespace App\Repositories;

use App\Models\BookStore;
use Illuminate\Support\Facades\DB;


class BookStoreRepositoryEloquent implements BookStoreRepository
{

    public function getBookStoreAll()
    {
       
        return BookStore::orderBy('name')->get();;
    }
    public function getBookStoreOne($id)
    {
        
        return BookStore::find($id);
    }
    public function createBookStore($user)
    {
        return  DB::transaction(function () use($user) {
             $BookStore = new BookStore();
             return $BookStore->create($user);
         });
    }
    public function editBookStore($id, $user)
    {
        return  DB::transaction(function () use($id, $user) {
             $BookStore = BookStore::find($id);
             return $BookStore->update($user);
         });
    }
    public function deleteBookStore($id)
    {
        return  DB::transaction(function () use($id) {
            $BookStore = BookStore::find($id);
            return $BookStore->delete();
        });
    }
}
