<?php

namespace App\Http\Controllers;


use App\Order;
use Illuminate\Http\Request;

class OrdersAdminController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::all();
        return view('index-orders', $data);
    }

    public function edit($orders_id)
    {
        if (empty(Order::find($orders_id))) {
            abort(404);
        }
        $data['orders'] = Order::find($orders_id);
        return view('edit-orders', $data);
    }

    public function update($orders_id, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255'
        ]);
        if (empty(Order::find($orders_id))) {
            abort(404);
        }
        $orders = Order::find($orders_id);
        $orders->email = $this->clearAll($request->get('email'));
        $orders->save();
        return redirect('/admin/orders');
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