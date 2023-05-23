<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index', ['name_table' => 'Orders']);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->route('order.index');
    }
}
