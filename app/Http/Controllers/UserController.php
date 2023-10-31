<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{

    public function index()
    {
        $users = User::whereNull('user_table.deleted_at') 
            ->join('role_table', 'user_table.id_role', '=', 'role_table.id_role')
            ->select('user_table.*', 'role_table.nama_role as nama_role')
            ->get();
    
        return view('user.data-user', compact('users'));
    }
    

    public function create()
    {
        $roles = DB::table('role_table')->get();
        return view('user.create-user', compact('roles'));
    }

    public function store(Request $request)
    {
        DB::table('user_table')->insert([
            'nama_user' => $request->input('nama_user'),
            'username' => $request->input('username'),
            'password_user' => $request->input('password'),
            'id_role' => $request->input('id_role'),
        ]);

        return redirect()->route('data-user')->with('success', 'Data user berhasil disimpan');
    }

    public function edit($id_user)
    {
        $user = DB::table('user_table')
            ->join('role_table', 'user_table.id_role', '=', 'role_table.id_role')
            ->select('user_table.*', 'role_table.nama_role as role_nama')
            ->where('user_table.id_user', $id_user)
            ->first();

        $roles = DB::table('role_table')->get();
        return view('user.edit-user', compact('user', 'roles'));
    }

    public function update(Request $request, $id_role)
    {
        DB::table('user_table')
            ->where('id_user', $id_role)
            ->update([
                'nama_user' => $request->input('nama_user'),
                'id_role' => $request->input('id_role'),
                'password_user' => $request->input('password'),
                'username' => $request->input('username'),
            ]);

        return redirect()->route('data-user');
    }

    public function onlyTrashed()
    {
        $trashes = DB::table('user_table')
            ->whereNotNull('deleted_at')
            ->get();

        return view('user_table.deleted-satuan', compact('trashes'));
    }

    public function destroy($id_user)
    {
        $user = User::find($id_user);
        $user->delete();

        return redirect()->route('data-user-dihapus')->with('success', 'Data user berhasil dihapus');
    }

    public function deleted()
    {
        $trashes = User::onlyTrashed()
            ->join('role_table', 'user_table.id_role', '=', 'role_table.id_role')
            ->select('user_table.*', 'role_table.nama_role as role_nama')
            ->get();
    
        return view('user.deleted-user', compact('trashes'));
    }
    
    public function restore($id_user)
    {
        DB::table('user_table')->where('id_user', $id_user)->update(['deleted_at' => null]);

        return redirect()->route('data-user')->with('success', 'Data user berhasil dikembalikan');
    }

    
}