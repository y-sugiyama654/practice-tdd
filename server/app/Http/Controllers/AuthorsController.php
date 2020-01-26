<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * POSTリクエストで受け取った値を保存
     */
    public function store()
    {
        Author::create(request()->only([
            'name', 'dob',
        ]));
    }
}
