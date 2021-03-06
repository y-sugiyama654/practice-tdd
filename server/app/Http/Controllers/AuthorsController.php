<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function create()
    {
        return view('authors.create');
    }

    /**
     * POSTリクエストで受け取った値を保存
     */
    public function store()
    {
        Author::create($this->validateRequest());
    }

    /**
     * @return array
     */
    protected function validateRequest(): array
    {
        return request()->validate([
            'name' => 'required',
            'dob' => 'required',
        ]);
    }
}
