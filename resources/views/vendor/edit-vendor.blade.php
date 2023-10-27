@extends('partials.main')

@section('title')
Form Edit Data Vendor
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12">
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ route('data-vendor') }}'">
         Kembali
      </button>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('update-vendor', $vendor->id_vendor) }}">
            @csrf
            @method('PUT')
        <form>
            <div class="row mb-3">
              <label for="nama_vendor" class="col-sm-2 col-form-label">Nama vendor</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm @error('nama_vendor') is-invalid @enderror" id="nama_vendor" name="nama_vendor" value="{{old('nama_vendor', $vendor->nama_vendor)}}">                @error('nama_vendor')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
            @enderror
            </div>
            </div>
            <div class="row mb-3">
              <label for="badan_hukum" class="col-sm-2 col-form-label">Badan Hukum</label>
              <div class="col-sm-10">
                <select name="badan_hukum" class="form-control" id="badan_hukum" type="number">
                  @foreach ($badan_hukum as $item)
                  <option value="{{ $item->id_badan_hukum }}" @if($item->id_badan_hukum == old('id_badan_hukum', $vendor->nama_hukum)) selected @endif>{{ $item->nama_hukum }}</option>
              @endforeach
                </select>
            </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-3">
                    <select name="status" class="form-control" id="status" type="number">
                        <option value="1" @if(old('status', $vendor->status_vendor) == 1) selected @endif>Aktif</option>
                        <option value="0" @if(old('status', $vendor->status_vendor) == 0) selected @endif>Tidak Aktif</option>
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