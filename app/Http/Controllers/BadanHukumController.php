<?php

namespace App\Http\Controllers;

use App\Models\BadanHukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BadanHukumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $badanhukum = BadanHukum::whereNull('deleted_at')->get();
        return view('badanhukum.data-badanhukum',compact('badanhukum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('badanhukum.create-badanhukum');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('badan_hukum_vendor')->insert([
            'nama_hukum' => $request->input('nama_hukum'),
            'status_badanhukum' => $request->input('status'),
        ]);

        return redirect()->route('data-badan-hukum')->with('success', 'Data badanhukum berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_badan_hukum)
    {
        $badanhukum = DB::table('badan_hukum_vendor')->where('id_badan_hukum', $id_badan_hukum)->first();
        return view('badanhukum.edit-badanhukum', compact('badanhukum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_badan_hukum)
    {
        DB::table('badan_hukum_vendor')
        ->where('id_badan_hukum', $id_badan_hukum)
        ->update([
            'nama_hukum' =>$request->input('nama_hukum'),
            'status_badanhukum' =>$request->input('status'),
        ]);

        return redirect()->route('data-badan-hukum');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_badan_hukum)
    {
        $badanhukum = BadanHukum::find($id_badan_hukum);
        $badanhukum->delete();  
    
        return redirect()->route('data-badan-hukum')->with('success', 'Data badanhukum berhasil dihapus secara permanen');
    }
    
        
    public function onlyTrashed()
    {
        $trashes = BadanHukum::onlyTrashed()->get();
        return view('badanhukum.deleted-badanhukum', compact('trashes'));
    }
    
    public function deleted()
    {
        $trashes = BadanHukum::withTrashed()->whereNotNull('deleted_at')->get();
        return view('badanhukum.deleted-badanhukum', compact('trashes'));
    }
    
        
            public function restore($id_badan_hukum)
            {
                DB::table('badan_hukum_vendor')
                    ->where('id_badan_hukum', $id_badan_hukum)
                    ->update(['deleted_at' => null]);
        
                return redirect()->route('data-badan-hukum')->with('success', 'Data badanhukum berhasil dikembalikan');
            }
}
