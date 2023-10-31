@extends('partials.main')

@section('title')
    Data Jenis Barang
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ route('create-jenis-barang') }}'">
        <i class="fas fa-plus-circle"></i> Tambah item
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
                    <th>Nama Jenis Barang</th>
                    <th>Status</th>
                    <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisbarang as $item)
                <tr>
                    <th>{{ $item->id_jenis_barang }}</th>
                    <td>{{ $item->nama_jenis }}</td>
                     @php
                     $status = "";
                     if($item->status_jenisbarang == 1){
                         $status = "Aktif";
                     }else{
                         $status = "Tidak Aktif";
                     }
                     @endphp
                    <td>{{ $status }}</td>
                    <td>
                      <button onclick="window.location='{{ route('edit-jenis-barang', $item->id_jenis_barang) }}'" type="button" class="btn btn-sm btn-warning" title="Edit data" >
                          <i class="fas fa-edit"></i> Edit
                      </button>
                      <form method="POST" action="{{ route('destroy-jenis-barang', $item->id_jenis_barang) }}" style="display: inline-block">
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