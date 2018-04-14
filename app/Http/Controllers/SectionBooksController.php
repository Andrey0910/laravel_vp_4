<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectionBooksController extends Controller
{
    public function asd(){
        $data = [
            'asd' => 'aaa'
        ];
        return view('section-books.index', $data);
    }
}
