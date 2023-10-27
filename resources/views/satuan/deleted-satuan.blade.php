@extends('partials.main')

@section('title')
Data satuan Terhapus
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama satuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @if($trashes)
                    @foreach ($trashes as $trash)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $trash->nama_satuan }}</td>
                          @php
                          $status = "";
                          if($trash->status_satuan == 1){
                              $status = "Aktif";
                          }else{
                              $status = "Tidak Aktif";
                          }
                          @endphp
                          <td>{{ $status }}</td>
                        <td>
                            <a href="{{ route('restore-satuan-dihapus', $trash->id_satuan) }}" class="btn btn-outline-primary btn-sm mr-2" title="Kembalikan Data" onclick="return confirm('Kembalikan data satuan ini?')">
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