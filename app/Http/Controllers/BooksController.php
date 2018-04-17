<?php

namespace App\Http\Controllers;

use App\Books;
use App\SectionBooks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'sectionBooks' => SectionBooks::all(),
            'authUser' => User::find(Auth::id())
        ];
        return view('index', $data);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
