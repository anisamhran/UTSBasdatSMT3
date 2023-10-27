
@extends('partials.main')

@section('title')
Data User Dihapus
@endsection

@section('content')
<div class="card">
    <div class="card-body">      
        <div class="mt-3">
        <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                    <th>ID User</th>
                    <th>Nama user</th>
                    <th>Email</th>
                    <th>Role user</th>
                    <th>ID Role</th>
                    <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trashes as $trash)
                <tr>
                    <th>{{ $trash->id_user }}</th>
                    <td>{{ $trash->nama_user }}</td>
                    <td>{{ $trash->username }}</td>
                    <td>{{ $trash->nama_role }}</td>
                    <th>{{ $trash->id_role }}</th>
                    <td>
                        <a href="{{ route('restore-user-dihapus', $trash->id_user) }}" class="btn btn-outline-primary btn-sm mr-2" title="Kembalikan User" onclick="return confirm('Kembalikan data user ini?')">
                            <i class="fas fa-download"></i> Kembalikan
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>   
@endsection