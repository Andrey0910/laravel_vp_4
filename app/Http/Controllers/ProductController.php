<?php

namespace App\Http\Controllers;

use App\Books;
use App\SectionBooks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($book_id)
    {
        $book = Books::find($book_id);
        $section_id = $book['section_books_id'];
        $data = [
            'book' => $book,
            'category' => SectionBooks::find($section_id),
            'sectionBooks' => SectionBooks::all(),
            'authUser' => Auth::user()
        ];
        return view('product', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
