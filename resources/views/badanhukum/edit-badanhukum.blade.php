@extends('partials.main')

@section('title')
Form Edit Data Badan Hukum
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12">
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ route('data-badan-hukum') }}'">
         Kembali
      </button>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('update-badan-hukum', $badanhukum->id_badan_hukum) }}">
            @csrf
            @method('PUT')
        <form>
            <div class="row mb-3">
              <label for="nama_hukum" class="col-sm-2 col-form-label">Nama badanhukum</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm @error('nama_hukum') is-invalid @enderror" id="nama_hukum" name="nama_hukum" value="{{old('nama_hukum', $badanhukum->nama_hukum)}}">                @error('nama_hukum')
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
                        <option value="1" @if(old('status', $badanhukum->status_badanhukum) == 1) selected @endif>Aktif</option>
                        <option value="0" @if(old('status', $badanhukum->status_badanhukum) == 0) selected @endif>Tidak Aktif</option>
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