<?php

namespace App\Http\Controllers;

use App\Models\TypeCar;
use Illuminate\Http\Request;

class TypeCarController extends Controller
{
    public function index()
    {
        return view('admin.type-car.index');
    }

    public function destroy(Request $request)
    {
        $status = TypeCar::find($request->id);
        $status->delete();

        return redirect()->route('type-cars.index');
    }
}
