<?php

namespace App\Http\Controllers;

use App\SectionBooks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $data = [
            'sectionBooks' => SectionBooks::all(),
            'authUser' => Auth::user()
        ];
        return view('news', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
