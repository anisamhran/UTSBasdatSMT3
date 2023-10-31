@extends('partials.main')

@section('title')
Data Jenis Barang Terhapus
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Jenis Barang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @if($trashes)
                    @foreach ($trashes as $trash)
                    <tr>
                        <th>{{ $trash->id_jenis_barang }}</th>
                        <td>{{ $trash->nama_jenis }}</td>
                          @php
                          $status = "";
                          if($trash->status_jenis_barang == 1){
                              $status = "Aktif";
                          }else{
                              $status = "Tidak Aktif";
                          }
                          @endphp
                          <td>{{ $status }}</td>
                        <td>
                            <a href="{{ route('restore-jenis-barang-dihapus', $trash->id_jenis_barang) }}" class="btn btn-outline-primary btn-sm mr-2" title="Kembalikan Data" onclick="return confirm('Kembalikan data satuan ini?')">
                                <i class="fas fa-download"></i> Kembalikan
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection