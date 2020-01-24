<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * POSTリクエストで受け取った値を保存
     */
    public function store()
    {
        Book::create($this->validateRequest());
    }

    /**
     * 引数で受け取った値を上書きする
     * @param Book $book
     */
    public function update(Book $book)
    {
        $book->update($this->validateRequest());
    }

    /**
     * POSTリクエストで受け取った値をバリデーション
     * @return array
     */
    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
