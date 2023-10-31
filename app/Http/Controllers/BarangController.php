<?php

    namespace App\Http\Controllers;


    use App\Models\BarangModel;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class BarangController extends Controller
    {

        public function index()
        {
            $barangs = BarangModel::whereNull('barang.deleted_at') // Specify the table name
                ->join('satuan', 'barang.id_satuan', '=', 'satuan.id_satuan')
                ->join('jenis_barang', 'barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
                ->select('barang.*', 'satuan.nama_satuan as nama_satuan', 'jenis_barang.nama_jenis as nama_jenis')
                ->get();
        
            return view('barang.data-barang', compact('barangs'));
        }
        
        


        public function create()
        {
            $satuans = DB::table('satuan')->get();
            $jenis_barang = DB::table('jenis_barang')->get();
            return view('barang.create-barang', compact('satuans','jenis_barang'));
        }

        public function store(Request $request)
        {
            DB::table('barang')->insert([
                'nama_barang' => $request->input('nama_barang'),
                'id_jenis_barang' => $request->input('jenis_barang'),
                'id_satuan' => $request->input('id_satuan'),
                'harga' => $request->input('harga'),
                'status_barang' => $request->input('status'),
            ]);

            return redirect()->route('data-barang')->with('success', 'Data barang berhasil disimpan');
        }

        public function edit($id_barang)
        {
            $barang = DB::table('barang')
                ->join('satuan', 'barang.id_satuan', '=', 'satuan.id_satuan')
                ->join('jenis_barang', 'barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
                ->select('barang.*', 'satuan.nama_satuan as nama_satuan', 'jenis_barang.nama_jenis as nama_jenis')
                ->where('barang.id_barang', $id_barang)
                ->first();

            $satuans = DB::table('satuan')->get();
            $jenis_barang = DB::table('jenis_barang')->get();
            return view('barang.edit-barang', compact('barang', 'satuans', 'jenis_barang'));
        }

        public function update(Request $request, $id)
        {
            DB::table('barang')
                ->where('id_barang', $id)
                ->update([
                    'nama_barang' => $request->input('nama_barang'),
                    'id_jenis_barang' => $request->input('jenis_barang'),
                    'id_satuan' => $request->input('id_satuan'),
                    'harga' => $request->input('harga'),
                    'status_barang' => $request->input('status'),
                ]);

            return redirect()->route('data-barang')->with('success', 'Data barang berhasil diperbarui');
        }
        public function destroy($id_barang)
{
    DB::table('barang')->where('id_barang', $id_barang)->update(['deleted_at' => now()]);

    return redirect()->route('data-barang-dihapus')->with('success', 'Data barang berhasil dihapus');
}
public function deleted()
{
    $trashes = BarangModel::withTrashed()
        ->join('satuan', 'barang.id_satuan', '=', 'satuan.id_satuan')
        ->join('jenis_barang', 'barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        ->select('barang.*', 'satuan.nama_satuan', 'jenis_barang.nama_jenis')
        ->whereNotNull('barang.deleted_at')
        ->get();

    return view('barang.deleted-data', compact('trashes'));
}


        public function restore($id_barang)
        {
            DB::table('barang')->where('id_barang', $id_barang)->update(['deleted_at' => null]);

            return redirect()->route('data-barang')->with('success', 'Data barang berhasil dikembalikan');
        }

        
    }
?>