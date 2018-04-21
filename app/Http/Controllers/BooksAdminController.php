<?php

namespace App\Http\Controllers;

use App\Books;
use App\Http\ImsgeResize;
use Illuminate\Http\Request;

class BooksAdminController extends Controller
{
    public function index()
    {
        $data['books'] = Books::where('show', 1)->get();
        return view('index-books', $data);
    }

    //присваевмем кмтегории признак невидимостм
    public function delete($books_id)
    {
        $books = Books::find($books_id);
        $books->show = 0;
        $books->save();
        return redirect('/admin/books');
    }

    public function edit($books_id)
    {
        if (empty(Books::find($books_id))){
            abort(404);
        }
        $data['books'] = Books::find($books_id);
        return view('edit-books', $data);
    }

    public function update($books_id, Request $request)
    {
        if (empty(Books::find($books_id))){
            abort(404);
        }
        $books = Books::find($books_id);
        $books->book_name = $this->clearAll($request->get('book_name'));
        $books->section_books_id = $request->get('section_books_id');
        $books->price = $request->get('price');
        $books->photo = $this->addPhoto();;
        $books->description = $this->clearAll($request->get('description'));
        $books->save();
        return redirect('/admin/books');
    }

    public function create()
    {
        return view('create-books');
    }

    public function store(Request $request)
    {
        $books = new Books();
        $books->book_name = $this->clearAll($request->get('book_name'));
        $books->section_books_id = $request->get('section_books_id');
        $books->price = $request->get('price');
        $books->photo = $request->get('photo');
        $books->description = $this->clearAll($request->get('description'));
        $books->save();
        return redirect('/admin/books');
    }

    //Очишаем вводимую информацию от вреданосного кода.
    public function clearAll($data)
    {
        $data = strip_tags($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        $data = htmlentities($data);
        return $data;
    }

    public function addPhoto(){
        $img = new ImsgeResize();
        return $img->moveFile();
    }
}
