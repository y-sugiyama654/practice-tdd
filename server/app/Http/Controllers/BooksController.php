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
        $book = Book::create($this->validateRequest());

        return redirect($book->path());
    }

    /**
     * 引数で受け取った値を上書きする
     * @param Book $book
     */
    public function update(Book $book)
    {
        $book->update($this->validateRequest());

        return redirect($book->path());
    }

    /**
     * DELETEリクエストで値を削除してリダイレクト
     * @param Book $book
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }

    /**
     * POSTリクエストで受け取った値をバリデーション
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author_id' => 'required',
        ]);
    }
}
