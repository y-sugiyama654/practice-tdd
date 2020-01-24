<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        Book::create($data);
    }

    /**
     * 引数で受け取った値を上書きする
     * @param Book $book
     */
    public function update(Book $book)
    {
        $data = request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $book->update($data);
    }
}
