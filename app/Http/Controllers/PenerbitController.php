<?php

namespace App\Http\Controllers;

use App\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Penerbit::all();
        return response()->json([
            'status' => 'Success',
            'size' => sizeof($data),
            'data' => [
                'penerbit' => $data->toArray()
            ],
        ],200);
    }

    public function create()
    {
        $data = Penerbit::all();
        return view('penerbit.create')->with('data', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerbit'=>'required',
            'alamat'=>'required',
            'email'=>'required',
            'telp'=>'required',
        ]);

        $penerbit = new Penerbit([
            'nama_penerbit' => $request->input('nama_penerbit'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'telp' => $request->input('telp'),
        ]);
        $penerbit->save();
        return response()->json($penerbit);
    }

    public function show($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return response()->json([
            'status' => 'Success',
            'data' => [
                'buku' => $penerbit->toArray()
            ],
        ],200);
    }

    public function edit(Request $request, $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());
        $penerbit->save();
        return response()->json($penerbit);
    }


    public function destroy($id)
    {
        Penerbit::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
