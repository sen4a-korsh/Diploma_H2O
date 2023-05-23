<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    public function index()
    {
        return view('admin.client.index', ['name_table' => 'Clients']);
    }

    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->route('client.index');
    }
}
