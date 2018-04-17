<?php

namespace App\Http\Controllers;

use App\SectionBooks;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $data = [
            'sectionBooks' => SectionBooks::all()
        ];
        return view('about', $data);
    }
}
