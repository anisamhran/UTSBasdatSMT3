@extends('partials.main')

@section('title')
Data Barang Terhapus
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
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
                    @foreach ($trashes as $trash)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $trash->nama_barang }}</td>
                          <td>{{ $trash->nama_jenis }}</td>
                          <td>{{ $trash->nama_satuan }}</td>
                          <td>{{ $trash->harga }}</td>
                          @php
                          $status = "";
                          if($trash->status_barang == 1){
                              $status = "Aktif";
                          }else{
                              $status = "Tidak Aktif";
                          }
                          @endphp
                          <td>{{ $status }}</td>
                        <td>
                            <a href="{{ route('restore-barang-dihapus', $trash->id_barang) }}" class="btn btn-outline-primary btn-sm mr-2" title="Kembalikan Data" onclick="return confirm('Kembalikan data barang ini?')">
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