<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function index()
    {
        return view('admin.order-status.index');
    }
}
