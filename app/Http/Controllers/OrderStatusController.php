<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function index()
    {
        return view('admin.order-status.index');
    }

    public function destroy(Request $request)
    {
        $status = OrderStatus::find($request->id);
        $status->delete();

        return redirect()->route('order-status.index');
    }
}
