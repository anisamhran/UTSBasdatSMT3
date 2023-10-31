@extends('partials.main')

@section('title')
    Data Badan Hukum
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ route('create-badan-hukum') }}'">
        <i class="fas fa-plus-circle"></i> Tambah Badan Hukum
      </button>
    </div>
    <div class="card-body">
        @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
@endif
     <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                    <th>ID</th>
                    <th>Nama Badan Hukum</th>
                    <th>Status</th>
                    <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($badanhukum as $item)
                <tr>
                    <th>{{ $item->id_badan_hukum }}</th>
                    <td>{{ $item->nama_hukum }}</td>
                     @php
                     $status = "";
                     if($item->status_badanhukum == 1){
                         $status = "Aktif";
                     }else{
                         $status = "Tidak Aktif";
                     }
                     @endphp
                    <td>{{ $status }}</td>
                    <td>
                      <button onclick="window.location='{{ route('edit-badan-hukum', $item->id_badan_hukum) }}'" type="button" class="btn btn-sm btn-warning" title="Edit data" >
                          <i class="fas fa-edit"></i> Edit
                      </button>
                      <form method="POST" action="{{ route('destroy-badan-hukum', $item->id_badan_hukum) }}" style="display: inline-block">
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
@endsection