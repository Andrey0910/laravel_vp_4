<?php

namespace App\Http\Controllers;

use App\Books;
use App\SectionBooks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function index()
    {
        $data = [
            'books' => Books::where('show', 1)->get(),
            'sectionBooks' => SectionBooks::where('show', 1)->get(),
            'authUser' => Auth::user()
        ];
        return view('index', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
