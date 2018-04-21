<?php

namespace App\Http\Controllers;

use App\SectionBooks;
use Illuminate\Http\Request;

class SectionBooksAdminController extends Controller
{
    public function index()
    {
        $data['category'] = SectionBooks::where('show', 1)->get();
        return view('index-category', $data);
    }

    //присваевмем кмтегории признак невидимостм
    public function delete($category_id)
    {
        $category = SectionBooks::find($category_id);
        $category->show = 0;
        $category->save();
        return redirect('/admin');
    }

    public function edit($category_id)
    {
        if (empty(SectionBooks::find($category_id))){
            abort(404);
        }
        $data['category'] = SectionBooks::find($category_id);
        return view('edit-category', $data);
    }

    public function update($category_id, Request $request)
    {
        if (empty(SectionBooks::find($category_id))){
            abort(404);
        }
        $category = SectionBooks::find($category_id);
        $category->section_name = $this->clearAll($request->get('section_name'));
        $category->description = $this->clearAll($request->get('description'));
        $category->save();
        return redirect('/admin');
    }

    public function create()
    {
        return view('create-category');
    }

    public function store(Request $request)
    {
        $category = new SectionBooks();
        $category->section_name = $this->clearAll($request->get('section_name'));
        $category->description = $this->clearAll($request->get('description'));
        $category->save();
        return redirect('/admin');
    }

    //Очишаем вводимую информацию от вреданосного кода.
    public function clearAll($data)
    {
        $data = strip_tags($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        $data = htmlentities($data);
        return $data;
    }
}
