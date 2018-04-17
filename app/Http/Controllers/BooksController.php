<?php

namespace App\Http\Controllers;

use App\Books;
use App\SectionBooks;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'books' => Books::all(),
            'sectionBooks' => SectionBooks::all()
        ];
        return view('index', $data);
    }
}
