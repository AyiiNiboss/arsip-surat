@extends('layout.main')
@section('content')
<style>
.alert {
    display: flex;
    justify-content: center;
}
</style>
        @if(Session::has('status'))
          <div class="alert alert-primary text-center" role="alert">
            <h5>{{ Session::get('pesan') }}</h5>
          </div>
        @else
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / </span>Data User</h4>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger mt-4" role="alert">
                <p class="text-center text-dark" style="margin-bottom: 0px">
                    {{ $error }}
                </p>
            </div> 
            @endforeach
        @endif
{{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> --}}
<div class="row">
  <div class="col-lg-12 order-0">
    <div class="card">
        <h5 class="card-header">
            <button class="btn btn-icon btn-secondary" data-bs-toggle="modal" data-bs-target="#basicModal" title="Tambah Data"><span class="tf-icons bx bx-plus"></span></button>
        </h5>
        {{-- Modal Tambah data --}}
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah Data User</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                <form action="/bagian-add-proses" method="POST" enctype="multipart/form-data">
                 @csrf
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">Nama Bagian</label>
                      <input type="text" id="nameBasic" name="nama_bagian" class="form-control" placeholder="Masukan Nama Bagian" required />
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailBasic" class="form-label">Username</label>
                      <input type="text" id="emailBasic" name="username" class="form-control" placeholder="Masukan Username" required />
                    </div>
                    <div class="col mb-0 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                          </div>
                          <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                        <label for="emailBasic" class="form-label">Nama</label>
                        <input type="text" id="emailBasic" name="nama" class="form-control" placeholder="Masukan Nama" required />
                      </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-3">
                      <label for="dobBasic" class="form-label">Tempat Lahir</label>
                      <input type="text" id="dobBasic" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir" required />
                    </div>
                    <div class="col mb-3">
                      <label for="dobBasic" class="form-label">Tanggal Lahir</label>
                      <input type="date" id="dobBasic" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" required />
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="dobBasic" class="form-label">Alamat</label>
                      <input type="text" id="dobBasic" name="alamat" class="form-control" placeholder="Masukan Alamat Rumah" required />
                    </div>
                    <div class="col mb-0">
                      <label for="dobBasic" class="form-label">No HP</label>
                      <input type="text" id="dobBasic" name="no_hp" class="form-control" placeholder="Masukan Nomor HP" required />
                    </div>
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ asset('assets/img/avatars/8.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
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
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Devisi</th>
                <th>Username</th>
                <th>Nama</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $row)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                        <td>{{ $row->nama_bagian }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->nama }}</td>
                        <td class="text-center">
                            {{-- <a href="/bagian-edit/{{ $row->id }}" class="btn btn-icon btn-success" title="Edit"><span class="bx bx-edit-alt me-1"></span></a> --}}
                            <a href="/bagian-detail/{{ $row->id }}" class="btn btn-icon btn-warning" title="Detail"><span class="bx bx-show-alt me-1"></span></a>
                            <a href="/bagian-delete/{{ $row->id }}" class="btn btn-icon btn-danger" title="Delete"><span class="bx bx-trash me-1"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
@endsection