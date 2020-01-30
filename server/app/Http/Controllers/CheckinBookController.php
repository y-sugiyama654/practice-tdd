<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CheckinBookController extends Controller
{
    public function store(Book $book)
    {
        $book->checkin(auth()->user());
    }
}
