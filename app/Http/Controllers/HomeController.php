<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\User;
use App\Models\VendorModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function index()
        {
            $users = User::with('role')->get();
            $userCount = User::count();
            $barangCount = BarangModel::count();
            $vendorCount = VendorModel::count();
            

        $barangs = BarangModel::take(7)->get();
        $vendors = VendorModel::take(7)->get();

            return view('dashboard', compact('users','barangs', 'vendors','userCount', 'barangCount', 'vendorCount'));
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
