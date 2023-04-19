<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarWashServiceController extends Controller
{
    public function index()
    {
        return view('admin.car-wash-service.index');
    }
}
