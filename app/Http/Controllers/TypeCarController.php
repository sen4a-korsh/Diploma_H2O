<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeCarController extends Controller
{
    public function index()
    {
        return view('admin.type-car.index');
    }
}
