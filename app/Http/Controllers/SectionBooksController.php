<?php

namespace App\Http\Controllers;

use App\Books;
use App\SectionBooks;
use Illuminate\Http\Request;

class SectionBooksController extends Controller
{
    public function index($section_id)
    {
        $data = [
            'books' => Books::where('section_books_id', $section_id)->get(),
            'sectionBooks' => SectionBooks::all()
        ];
        return view('category', $data);
    }
}
