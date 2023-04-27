<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index', ['name_table' => 'Orders']);
    }

    public function destroy(Request $request)
    {
        dd($request) ;
    }
}
