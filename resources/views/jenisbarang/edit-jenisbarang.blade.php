@extends('partials.main')

@section('title')
Form Edit Data Jenis Barang
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12">
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ route('data-jenis-barang') }}'">
         Kembali
      </button>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('update-jenis-barang', $jenisbarang->id_jenis_barang) }}">
            @csrf
            @method('PUT')
        <form>
            <div class="row mb-3">
              <label for="nama_jenis" class="col-sm-2 col-form-label">Nama Jenis Barang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm @error('nama_jenis') is-invalid @enderror" id="nama_jenis" name="nama_jenis" value="{{old('nama_jenis', $jenisbarang->nama_jenis)}}">                @error('nama_jenis')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
            @enderror
            </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-3">
                    <select name="status" class="form-control" id="status" type="number">
                        <option value="1" @if(old('status', $jenisbarang->status_jenisbarang) == 1) selected @endif>Aktif</option>
                        <option value="0" @if(old('status', $jenisbarang->status_jenisbarang) == 0) selected @endif>Tidak Aktif</option>
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