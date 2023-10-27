
@extends('partials.main')

@section('title')
Data User
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">

            <button type="button" class="btn btn-sm btn-primary ml-auto" onclick="window.location='{{ route('create-user') }}'">
                <i class="fas fa-plus-circle"></i> Tambah user
            </button>
        </div>

      
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
            @foreach ($users as $user)
                <tr>
                    <th>{{ $user->id_user }}</th>
                    <td>{{ $user->nama_user }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->nama_role }}</td>
                    <th>{{ $user->id_role }}</th>
                    <td>
                            <button onclick="window.location='{{ route('edit-user', $user->id_user) }}'" type="button" class="btn btn-sm btn-warning" title="Edit data" >
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form method="POST" action="{{ route('destroy-user', $user->id_user) }}" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus data" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form> 
                        </td>       
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>   
@endsection