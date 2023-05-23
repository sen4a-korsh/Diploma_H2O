<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testModal()
    {
        return view('test.modal');
    }

    public function geolocationIndex()
    {
        return view('test.geolocation');
    }

    public function geolocationGet(Request $request)
    {
//        dd($request);
        return response('Геолокация успешно сохранена на сервере');
    }
}
