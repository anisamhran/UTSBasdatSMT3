<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $users = DB::table('user_table')->join('role_table', 'user_table.id_role', '=', 'role_table.id_role')->get();
         $userCount = DB::table('user_table')->count();
         $barangCount = DB::table('barang')->count();
         $vendorCount = DB::table('vendor')->count();
 
         $barangs = DB::table('barang')->join('jenis_barang', 'barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')->take(7)->get();
         $vendors = DB::table('vendor')->join('badan_hukum_vendor', 'vendor.id_badan_hukum', '=', 'badan_hukum_vendor.id_badan_hukum')->take(7)->get();
 
         return view('dashboard', compact('users', 'barangs', 'vendors', 'userCount', 'barangCount', 'vendorCount'));
     }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
