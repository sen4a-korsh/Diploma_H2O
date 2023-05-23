<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeCar\StoreRequest;
use App\Models\TypeCar;
use Illuminate\Http\Request;

class TypeCarController extends Controller
{
    public function index()
    {
        return view('admin.type-car.index', ['name_table' => 'Type Cars']);
    }

    public function destroy($id)
    {
        TypeCar::destroy($id);
        return redirect()->route('type-car.index');
    }

}
