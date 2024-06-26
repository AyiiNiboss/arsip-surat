@extends('layout.main')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold"><span class="text-muted fw-light">User / Data User /</span> Detail</h4>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
            <form id="formAccountSettings" action="/bagian-detail-proses/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              @if ($data->foto != '')
                  <img src="{{ asset('storage/profil/'.$data->foto) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
              @else
                  <img src="{{ asset('assets/img/avatars/8.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
              @endif
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Upload new photo</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input type="file" id="upload" name="image" class="account-file-input" hidden accept="image/png, image/jpeg"/>
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                  <i class="bx bx-reset d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Reset</span>
                </button>
                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
              <div class="row">
                <div class="mb-3 col-md-12">
                  <label for="firstName" class="form-label">Nama Bagian</label>
                  <input class="form-control" type="text" id="firstName" name="nama_bagian" value="{{ $data->nama_bagian }}" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Username</label>
                  <input class="form-control" type="text" name="username" id="lastName" value="{{ $data->username }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="nama" class="form-label">Nama</label>
                  <input class="form-control" type="text" name="nama" id="nama" value="{{ $data->nama }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                  <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $data->tempat_lahir }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                  <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $data->tgl_lahir }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input class="form-control" type="text" name="alamat" id="alamat" value="{{ $data->alamat }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="no_hp" class="form-label">NO HP</label>
                  <input class="form-control" type="text" name="no_hp" id="no_hp" value="{{ $data->no_hp }}" />
                </div>
               
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <a href="/bagian" class="btn btn-outline-secondary">Cancel</a>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
      </div>
    </div>
  </div>
      
@endsection