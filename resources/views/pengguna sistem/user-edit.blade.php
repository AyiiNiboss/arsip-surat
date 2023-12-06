@extends('layout.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengguna Sistem /</span> User Edit</h4>
{{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> --}}
<div class="row">
  <div class="col-lg-12 order-0">
    <div class="card">
        <h5 class="card-header">

        </h5>
        <div class="card-body">
            <form action="/user-edit/proses/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col mb-3">
                          <label for="nameBasic" class="form-label">Name</label>
                          <input type="text" id="nameBasic" name="name" class="form-control" value="{{ $data->name }}" placeholder="Masukan Nama" required />
                        </div>
                      </div>
                      <div class="row g-2">
                        <div class="col mb-0">
                          <label for="emailBasic" class="form-label">Username</label>
                          <input type="text" id="emailBasic" name="username" class="form-control" value="{{ $data->username }}" placeholder="Masukan Username" required />
                        </div>
                      </div>
                    <div class="col-md-6 mt-3">
                        <a href="{{ route('user') }}" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
  </div>
</div>
@endsection