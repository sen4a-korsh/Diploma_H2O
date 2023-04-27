<?php

namespace App\Http\Controllers;

use App\DataTables\ClientsDataTable;
use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    public function index(ClientsDataTable $dataTable)
    {
        return $dataTable->render('admin.client.index', ['name_table' => 'Clients']);
    }

    public function testModal()
    {
        return view('test.modal');
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button id="'. $row->id .'" class="edit btn btn-success btn-sm">Edit</button>
                                  <button id="'. $row->id .'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return false;
    }

    public function destroy(Request $request)
    {
        $status = Client::find($request->id);
        $status->delete();

        return redirect()->route('clients.index');
    }
}
