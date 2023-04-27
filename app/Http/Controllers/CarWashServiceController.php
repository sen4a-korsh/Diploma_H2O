<?php

namespace App\Http\Controllers;

use App\Models\CarWashService;
use Illuminate\Http\Request;

class CarWashServiceController extends Controller
{
    public function index()
    {
        return view('admin.car-wash-service.index', ['name_table' => 'Car Wash Services']);
    }

    public function destroy(Request $request)
    {
        $status = CarWashService::find($request->id);
        $status->delete();

        return redirect()->route('car-wash-service.index');
    }
}
