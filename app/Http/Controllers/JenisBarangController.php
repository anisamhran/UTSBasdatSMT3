<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisbarang = JenisBarang::whereNull('deleted_at')->get();
        return view('jenisbarang.data-jenisbarang',compact('jenisbarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisbarang.create-jenisbarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('jenis_barang')->insert([
            'nama_jenisbarang' => $request->input('nama_jenisbarang'),
            'status_jenisbarang' => $request->input('status'),
        ]);

        return redirect()->route('data-jenisbarang')->with('success', 'Data jenisbarang berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_jenis_barang)
    {
        $jenisbarang = DB::table('jenis_barang')->where('id_jenis_barang', $id_jenis_barang)->first();
        return view('jenisbarang.edit-jenisbarang', compact('jenisbarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_jenis_barang)
    {
        DB::table('jenis_barang')
        ->where('id_jenis_barang', $id_jenis_barang)
        ->update([
            'nama_jenis' =>$request->input('nama_jenis'),
            'status_jenisbarang' =>$request->input('status'),
        ]);

        return redirect()->route('data-jenis-barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_jenis_barang)
    {
        $jenisbarang = JenisBarang::find($id_jenis_barang);
        $jenisbarang->delete();
    
        return redirect()->route('data-jenis-barang')->with('success', 'Data jenisbarang berhasil dihapus secara permanen');
    }
    
        
    public function onlyTrashed()
    {
        $trashes = JenisBarang::onlyTrashed()->get();
        return view('jenisbarang.deleted-jenisbarang', compact('trashes'));
    }
    
    public function deleted()
    {
        $trashes = JenisBarang::withTrashed()->whereNotNull('deleted_at')->get();
        return view('jenisbarang.deleted-jenisbarang', compact('trashes'));
    }
    
        
            public function restore($id_jenis_barang)
            {
                DB::table('jenis_barang')
                    ->where('id_jenis_barang', $id_jenis_barang)
                    ->update(['deleted_at' => null]);
        
                return redirect()->route('data-jenis-barang')->with('success', 'Data jenisbarang berhasil dikembalikan');
            }
}
