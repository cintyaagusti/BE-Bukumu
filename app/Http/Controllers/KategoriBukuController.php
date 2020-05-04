<?php

namespace App\Http\Controllers;

use App\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = KategoriBuku::all();
        return response()->json([
            'status' => 'Success',
            'size' => sizeof($data),
            'data' => [
                'kategori_buku' => $data->toArray()
            ],
        ],200);
    }

    public function create()
    {
        $data = KategoriBuku::all();
        return view('kategori_buku.create')->with('data', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori'=>'required',
        ]);

        $kategori_buku = new KategoriBuku([
            'nama_kategori' => $request->input('nama_kategori'),
        ]);
        $kategori_buku->save();
        return response()->json($kategori_buku);
    }

    public function show($id)
    {
        $kategori_buku = KategoriBuku::findOrFail($id);
        return response()->json([
            'status' => 'Success',
            'data' => [
                'buku' => $kategori_buku->toArray()
            ],
        ],200);
    }

    public function edit(Request $request, $id)
    {
        $kategori_buku = KategoriBuku::findOrFail($id);
        $kategori_buku->update($request->all());
        $kategori_buku->save();
        return response()->json($kategori_buku);
    }

    public function destroy($id)
    {
        KategoriBuku::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
