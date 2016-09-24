<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Orders;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{

    public function orders()
    {
        $orders = Orders::all();
        return view('dashboard.orders.orders', [
            'orders' => $orders
        ]);
    }

    public function edit($id)
    {
        $order = Orders::find($id);
        return view('dashboard.orders.edit',[
            'order' => $order
        ]);

    }

    public function update(Request $request,$id)
    {
        $data = $request->all();
        $order = Orders::find($id);
        $order->update($data);
        return redirect('/dashboard/orders');
    }

}
