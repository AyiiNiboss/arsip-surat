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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Surat / </span>Surat Masuk</h4>
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
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah Surat Masuk</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                <h5 class="fw-bold mb-0">INFORMASI UMUM </h5>
                <p>lengkapi informasi pada surat masuk</p>
                <form action="/surat-masuk-add-proses" method="POST" enctype="multipart/form-data">
                 @csrf
                  <div class="row g-2">
                    <div class="col-6 mb-1">
                      <label for="nameBasic" class="form-label">NOMOR SURAT</label>
                      <input type="text" id="nameBasic" name="no_surat" class="form-control" placeholder="Masukan Nomor Surat" required />
                    </div>
                    <div class="col mb-1">
                      <label for="namabasic" class="form-label">TANGGAL SURAT</label>
                      <input type="date" id="namabasic" name="tgl_surat" class="form-control" placeholder="Masukan Nama" required />
                    </div>
                    <div class="col mb-1">
                      <label for="emailBasic" class="form-label">DITERIMA TANGGAL</label>
                      <input type="date" id="emailBasic" name="tgl_diterima" class="form-control" placeholder="Masukan Nama" required />
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col-6 mb-1">
                      <label for="nameBasic" class="form-label">PENGIRIM</label>
                      <input type="text" id="nameBasic" name="pengirim" class="form-control" placeholder="Masukan Pengirim Surat" required />
                    </div>
                    <div class="col-6 mb-1">
                      <label for="nameBasic" class="form-label">Nomor index</label>
                      <input type="text" id="nameBasic" name="no_index" class="form-control" placeholder="Masukan Nomor Index Surat" required />
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <div class="col mb-1">
                        <label for="emailBasic" class="form-label">PERIHAL SURAT</label>
                        <input type="text" id="emailBasic" name="perihal" class="form-control" placeholder="Masukan Perihal Surat" required />
                      </div>
                  </div>
                  <p class="fw-bold mb-0">INFORMASI TAMBAHAN </p>
                  <div class="row g-2 mb-4">
                    <div class="col mb-1">
                        <label for="exampleFormControlSelect1" class="form-label">LAMPIRAN</label>
                        <select class="form-select" name="lampiran" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>--Lampiran--</option>
                          <option value="1 Lampiran">1 Lampiran</option>
                          <option value="2 Lampiran">2 Lampiran</option>
                          <option value="3 Lampiran">3 Lampiran</option>
                          <option value="4 Lampiran">4 Lampiran</option>
                          <option value="5 Lampiran">5 Lampiran</option>
                          <option value="6 Lampiran">6 Lampiran</option>
                        </select>
                    </div>
                  </div>
                  <p class="fw-bold mb-0">UNGGAH FILE SURAT </p>
                  <div class="row g-2">
                    <div class="col mb-3">
                      <div class="mb-3">
                        <label for="formFile" class="form-label">UPLOAD FILE</label>
                        <input class="form-control" name="files" type="file" id="formFile" />
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
                <th>Tanggal Diterima</th>
                <th class="text-center">No index</th>
                <th>pengirim</th>
                <th>Perihal</th>
                <th class="text-center">Proses</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($data as $row)
              <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                  <td>{{Carbon\Carbon::parse($row->tgl_diterima)->translatedFormat('d F Y'); }}</td>
                  <td class="text-center">{{ $row->no_index }}</td>
                  <td>{{ $row->pengirim }}</td>
                  <td>{{ $row->perihal }}</td>
                  <td class="text-center">
                    @if ($row->aktivitas == 1)
                      <span class="badge bg-warning">Menunggu</span>
                    @elseif($row->aktivitas == 3)
                      <span class="badge bg-primary">Verifikasi Sekretaris</span>
                    @elseif($row->aktivitas == 4)
                      <span class="badge bg-info">Terdisposisi</span>
                    @elseif($row->aktivitas == 5)
                      <span class="badge bg-success">Arsip</span>
                    @else
                      <span class="badge bg-danger">Revisi Surat</span>
                    @endif
                    
                  </td>
                  <td class="text-center">
                      @if ($row->aktivitas == 2)
                        <a href="/surat-masuk-edit/{{ $row->id }}" class="btn btn-icon btn-success" title="Edit"><span class="bx bx-edit-alt me-1"></span></a>
                      @endif
                      @if ($row->aktivitas == 4)
                        <a href="/sm-disposisi/{{ $row->id }}" class="btn btn-icon btn-danger" title="Surat Disposisi"><span class="bx bxs-file-pdf me-1"></span></a>
                      @endif
                      @if ($row->aktivitas == 5)
                        <a href="/sm-disposisi/{{ $row->id }}" class="btn btn-icon btn-danger" title="Surat Disposisi"><span class="bx bxs-file-pdf me-1"></span></a>
                        <a href="/surat-masuk-arsip-proses/{{ $row->id }}" class="btn btn-icon btn-primary" title="Arsip"><span class="bx bxs-archive-in"></span></a>
                      @endif
                      <a href="/surat-masuk-detail/{{ $row->id }}" class="btn btn-icon btn-warning" title="Detail"><span class="bx bx-show-alt me-1"></span></a>
                      @if ($row->aktivitas == 2)
                      <a href="/surat-masuk-hapus/{{ $row->id }}" class="btn btn-icon btn-danger" title="Delete"><span class="bx bx-trash me-1"></span></a>                          
                      @endif
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