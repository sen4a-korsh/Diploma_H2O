<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStatus\StoreRequest;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function index()
    {
        return view('admin.order-status.index', ['name_table' => 'Order Statuses']);
    }

    public function destroy($id)
    {
        OrderStatus::destroy($id);
        return redirect()->route('order-status.index');
    }

}
