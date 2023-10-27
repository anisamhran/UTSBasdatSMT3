
@extends('partials.main')

@section('title')
Data Barang
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">

            <button type="button" class="btn btn-sm btn-primary ml-auto" onclick="window.location='{{ route('create-barang') }}'">
                <i class="fas fa-plus-circle"></i> Tambah Barang
            </button>
        </div>

      
        <div class="mt-3">
        <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->nama_jenis }}</td>
                    <td>{{ $barang->nama_satuan }}</td>
                    <td>{{ $barang->harga }}</td>
                    @php
                    $status = "";
                    if($barang->status_barang == 1){
                        $status = "Aktif";
                    }else{
                        $status = "Tidak Aktif";
                    }
                    @endphp
                    <td>{{ $status }}</td>
                    <td>
                            <button onclick="window.location='{{ route('edit-barang', $barang->id_barang) }}'" type="button" class="btn btn-sm btn-warning" title="Edit data" >
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form method="POST" action="{{ route('destroy-barang', $barang->id_barang) }}" style="display: inline-block">
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