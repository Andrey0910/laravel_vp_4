<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function fff(){
        $data = [
            'mmm' => 'kkk'
        ];
        return view('books.index', $data);
    }
}
