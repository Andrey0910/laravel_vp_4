<?php

namespace App\Http\Controllers;

use App\Books;
use App\SectionBooks;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $data = [
            'books' => Books::all(),
            'sectionBooks' => SectionBooks::all()
        ];
        return view('index', $data);
    }

    public function category($section_id)
    {
        $data = [
            'books' => Books::where('section_books_id', $section_id)->get(),
            'sectionBooks' => SectionBooks::all()
        ];
        return view('category', $data);
    }

    public function news(){
        $data = [
            'sectionBooks' => SectionBooks::all()
        ];
        return view('news', $data);
    }
}
