@extends('partials.main')

@section('title')
Form Tambah Data user
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12">
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ route('data-user') }}'">
         Kembali
      </button>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('save-user') }}">
        @csrf
        <form>
            <div class="row mb-3">
              <label for="nama_user" class="col-sm-2 col-form-label">Nama user</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" id="nama_user" name="nama_user">
            </div>
            </div>
            <div class="row mb-3">
              <label for="username" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" id="username" name="username">
            </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control form-control-sm" id="password" name="password">
              </div>
              </div>
            <div class="row mb-3">
              <label for="status" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-3">
                  <select name="id_role" class="form-control" id="id_role" type="number">
                         @foreach ($roles as $role)
                        <option value="{{ $role->id_role }}">{{ $role->nama_role }}</option>
                         @endforeach
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