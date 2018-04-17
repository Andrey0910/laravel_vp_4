<?php

namespace App\Http\Controllers;

use App\SectionBooks;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $data = [
            'sectionBooks' => SectionBooks::all()
        ];
        return view('news', $data);
    }
}
