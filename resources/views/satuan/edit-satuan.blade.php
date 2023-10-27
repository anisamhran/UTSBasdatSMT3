@extends('partials.main')

@section('title')
Form Edit Data satuan
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12">
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ route('data-satuan') }}'">
         Kembali
      </button>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('update-satuan', $satuan->id_satuan) }}">
            @csrf
            @method('PUT')
        <form>
            <div class="row mb-3">
              <label for="nama_satuan" class="col-sm-2 col-form-label">Nama satuan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm @error('nama_satuan') is-invalid @enderror" id="nama_satuan" name="nama_satuan" value="{{old('nama_satuan', $satuan->nama_satuan)}}">                @error('nama_satuan')
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
                        <option value="1" @if(old('status', $satuan->status_satuan) == 1) selected @endif>Aktif</option>
                        <option value="0" @if(old('status', $satuan->status_satuan) == 0) selected @endif>Tidak Aktif</option>
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