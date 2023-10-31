<?php

namespace App\Http\Controllers;

use App\Models\SatuanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{

    public function index()
    {
        $satuans = SatuanModel::whereNull('deleted_at')->get();
        return view('satuan.data-satuan', compact('satuans'));
    }
    
    
        public function create()
        {
            return view('satuan.create-satuan');
        }
    
        public function store(Request $request)
        {
            DB::table('satuan')->insert([
                'nama_satuan' => $request->input('nama_satuan'),
                'status_satuan' => $request->input('status'),
            ]);
    
            return redirect()->route('data-satuan')->with('success', 'Data satuan berhasil disimpan');
        }
    
        public function edit($id_satuan)
        {
            $satuan = DB::table('satuan')->where('id_satuan', $id_satuan)->first();
            return view('satuan.edit-satuan', compact('satuan'));
        }
    
        public function update(Request $request, $id_satuan)
        {
            DB::table('satuan')
                ->where('id_satuan', $id_satuan)
                ->update([
                    'nama_satuan' => $request->input('nama_satuan'),
                    'status_satuan' => $request->input('status'),
                ]);
    
            return redirect()->route('data-satuan')->with('success', 'Data satuan berhasil diperbarui');
        }
    
        public function destroy($id_satuan)
{
    $satuan = SatuanModel::find($id_satuan);
    $satuan->delete();

    return redirect()->route('data-satuan')->with('success', 'Data satuan berhasil dihapus secara permanen');
}

    
public function onlyTrashed()
{
    $trashes = SatuanModel::onlyTrashed()->get();
    return view('satuan.deleted-satuan', compact('trashes'));
}

public function deleted()
{
    $trashes = SatuanModel::withTrashed()->whereNotNull('deleted_at')->get();
    return view('satuan.deleted-satuan', compact('trashes'));
}

    
        public function restore($id_satuan)
        {
            DB::table('satuan')
                ->where('id_satuan', $id_satuan)
                ->update(['deleted_at' => null]);
    
            return redirect()->route('data-satuan')->with('success', 'Data satuan berhasil dikembalikan');
        }
    }
    

