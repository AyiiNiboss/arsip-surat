@extends('layout.main')
@section('content')
        @if(Session::has('status'))
          <div class="alert alert-primary text-center" role="alert">
            <h5>{{ Session::get('pesan') }}</h5>
          </div>
        @else
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengguna Sistem /</span> User</h4>
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
                <form action="/user-add-proses" method="POST">
                 @csrf
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">Name</label>
                      <input type="text" id="nameBasic" name="name" class="form-control" placeholder="Masukan Nama" required />
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailBasic" class="form-label">Username</label>
                      <input type="text" id="emailBasic" name="username" class="form-control" placeholder="Masukan Username" required />
                    </div>
                    <div class="col mb-0">
                      <label for="dobBasic" class="form-label">Password</label>
                      <input type="text" id="dobBasic" name="password" class="form-control" placeholder="Masukan Password" required />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Role</label>
                        <select class="form-select" name="role" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected>--Pilih--</option>
                          <option value="1">KA SUBAG</option>
                          <option value="2">SEKRETARIS</option>
                          <option value="3">CAMAT</option>
                        </select>
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
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $row)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->username }}</td>
                        <td>
                          @if ($row->role == 1)
                              Sekretaris
                          @elseif($row->role == 2)
                              Ka Subag
                          @else
                              Camat
                          @endif
                        </td>
                        <td class="text-center">
                            <a href="/user-edit/{{ $row->id }}" class="btn btn-icon btn-success" title="Edit"><i class="bx bx-edit-alt me-1"></i></a>
                            <a href="/user-delete/{{ $row->id }}" class="btn btn-icon btn-danger" title="Delete"><i class="bx bx-trash me-1"></i></a>
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