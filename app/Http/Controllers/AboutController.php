<?php

namespace App\Http\Controllers;

use App\SectionBooks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index(){
        $data = [
            'sectionBooks' => SectionBooks::all(),
            'authUser' => User::find(Auth::id())
        ];
        return view('about', $data);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
