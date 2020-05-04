<?php

namespace App\Http\Controllers;

use App\Buku;
use App\KategoriBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{

    public function sendSertif()
    {
        $buku = DB::table('buku')
                ->select('penerbit.*' , 'kategori_buku.*' , 'buku.*')
                ->join('penerbit','penerbit.id_penerbit','=','buku.id_penerbit')
                ->join('kategori_buku','kategori_buku.id_kategori','=','buku.id_kategori')
                ->get();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Buku::all();
        return response()->json([
            'status' => 'Success',
            'size' => sizeof($data),
            'data' => [
                'buku' => $data->toArray()
            ],
        ],200);
    }

    public function create()
    {
        $data = Buku::all();
        return view('buku.create')->with('data', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id_kategori'=>'required',
            // 'id_penerbit'=>'required',
            'judul'=>'required',
            'pengarang'=>'required',
            'tahun_terbit'=>'required',
            'harga'=>'required',
            'stok'=>'required',
        ]);
        $buku = new Buku([
            'id_kategori' => $request->input('id_kategori'),
            'id_penerbit' => $request->input('id_penerbit'),
            'judul' => $request->input('judul'),
            'pengarang' => $request->input('pengarang'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok')
        ]);
        $buku->save();
        return response()->json($buku);
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return response()->json([
            'status' => 'Success',
            'data' => [
                'buku' => $buku->toArray()
            ],
        ],200);

    }

    public function edit(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        $buku->save();
        return response()->json($buku);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori'=>'required',
            'id_penerbit'=>'required',
            'judul'=>'required',
            'pengarang'=>'required',
            'tahun_terbit'=>'required',
            'harga'=>'required',
            'stok'=>'required',
        ]);
        $data = [
            'id_kategori' => $request->input('id_kategori'),
            'id_penerbit' => $request->input('id_penerbit'),
            'judul' => $request->input('judul'),
            'pengarang' => $request->input('pengarang'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok')
        ];
        Buku::where('id_buku',$id)->update($data);
        return redirect('buku');
    }

    public function destroy($id)
    {
        Buku::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
    
}

