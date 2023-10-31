@extends('partials.main')

@section('content')
<div class="card">
  <div class="card-body">
    <p class="card-title">Data Jenis Barang</p>
    <div class="row">
      <div class="col-12">
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('data-jenis-barang') }}'">
         Kembali
      </button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('save-jenis-barang') }}">
        @csrf
        <form>
            <div class="row mb-3">
              <label for="nama_jenis" class="col-sm-2 col-form-label">Nama Jenis Barang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" id="nama_jenis" name="nama_jenis">
            </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-3">
                    <select name="status" class="form-control" id="status" type="number">
                          <option value="1">Aktif</option>
                          <option value="0">Tidak Aktif</option>
                    </select>
                  </div>
                </div>
                      <div class="col-sm-6">
                        <button type="submit" class="btn btn-sm btn-success">
                            Simpan
                        </button>
                      </div>
                    </div>
              </div>
            </div>
          </form>
    </div>
  </div>
</div>

@endsection