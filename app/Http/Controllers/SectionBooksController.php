<?php

namespace App\Http\Controllers;

use App\Books;
use App\SectionBooks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionBooksController extends Controller
{
    public function index($section_id)
    {
        $data = [
            'books' => Books::where('section_books_id', $section_id)
                ->where('show', 1)->get(),
            'category' => SectionBooks::find($section_id),
            'sectionBooks' => SectionBooks::where('show', 1)->get(),
            'authUser' => Auth::user()
        ];
        return view('category', $data);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
