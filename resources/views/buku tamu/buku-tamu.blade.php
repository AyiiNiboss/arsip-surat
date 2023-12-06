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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Buku Tamu</h4>
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
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah data</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                <form action="/buku-tamu-add-proses" method="POST" enctype="multipart/form-data">
                 @csrf
                  <div class="row g-2">
                    <div class="col-6 mb-1">
                      <label for="nameBasic" class="form-label">Nama</label>
                      <input type="text" id="nameBasic" name="nama" class="form-control" placeholder="Masukan Nama Anda" required />
                    </div>
                    <div class="col-6 mb-1">
                      <label for="nameBasic" class="form-label">Alamat</label>
                      <input type="text" id="nameBasic" name="alamat" class="form-control" placeholder="Masukan Alamat Anda" required />
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col-12 mb-1">
                      <label for="exampleFormControlTextarea1" class="form-label">Maksud Kunjungan</label>
                      <textarea class="form-control" name="maksud_kunjungan" placeholder="Masukan maksud kunjungan" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                  </div>
                  
                  <div class="row g-2 mb-3">
                    <div class="col mb-1">
                        <label for="namabasic" class="form-label">TANGGAL</label>
                        <input type="date" id="namabasic" name="tanggal" class="form-control" placeholder="Masukan Nama" required />
                    </div>
                    <div class="col mb-1">
                        <label for="emailBasic" class="form-label">Jabatan</label>
                        <input type="text" id="emailBasic" name="jabatan" class="form-control" placeholder="Masukan Jabatan" required />
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
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Maksud Kunjungan</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($data as $row)
              <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                  <td>{{Carbon\Carbon::parse($row->tanggal)->translatedFormat('d F Y'); }}</td>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->alamat }}</td>
                  <td>{{ $row->maksud_kunjungan }}</td>
                  <td class="text-center">{{ $row->jabatan }}</td>
                  <td class="text-center">
                      <a href="/buku-tamu-edit/{{ $row->id }}" class="btn btn-icon btn-success" title="Edit"><span class="bx bx-edit-alt me-1"></span></a>
                      
                      {{-- <a href="/buku-tamu-detail/{{ $row->id }}" class="btn btn-icon btn-warning" title="Detail"><span class="bx bx-show-alt me-1"></span></a> --}}
                      <a href="/buku-tamu-hapus/{{ $row->id }}" class="btn btn-icon btn-danger" title="Delete"><span class="bx bx-trash me-1"></span></a>
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