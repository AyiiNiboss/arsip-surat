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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Surat / </span>Surat Keluar</h4>
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
            @if (Auth::user()->role == 1)
                <button class="btn btn-icon btn-secondary" data-bs-toggle="modal" data-bs-target="#basicModal" title="Tambah Data"><span class="tf-icons bx bx-plus"></span></button>  
            @endif
        </h5>
        {{-- Modal Tambah data --}}
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah Surat keluar</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                <h5 class="fw-bold mb-0">INFORMASI UMUM </h5>
                <p>lengkapi informasi pada surat keluar</p>
                <form action="/surat-keluar-add-proses" method="POST" enctype="multipart/form-data">
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
                  </div>
                  <div class="row g-2">
                    <div class="col-6 mb-1">
                      <label for="nameBasic" class="form-label">Kepada</label>
                      <input type="text" id="nameBasic" name="kepada" class="form-control" placeholder="Masukan Instansi Pengirim" required />
                    </div>
                    <div class="col mb-1">
                      <label for="emailBasic" class="form-label">PERIHAL SURAT</label>
                      <input type="text" id="emailBasic" name="perihal" class="form-control" placeholder="Masukan Perihal Surat" required />
                    </div>
                  </div>
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
                    <div class="col mb-1">
                        <label for="exampleFormControlSelect1" class="form-label">SIFAT</label>
                        <select class="form-select" name="sifat" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>--SIFAT--</option>
                          <option value="biasa">BIASA</option>
                          <option value="penting">PENTING</option>
                        </select>
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col">
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">ISI surat</label>
                        <textarea class="form-control" name="isi_surat" id="editor" rows="3" style="height: 200px;"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">EDIT</button>
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
                <th>Tanggal Surat</th>
                <th>Nomor Surat</th>
                <th>Perihal</th>
                <th>Kepada</th>
                <th class="text-center">Status</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($data as $row)
              <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                  <td>{{ Carbon\Carbon::parse($row->tgl_surat)->translatedFormat('d F Y'); }}</td>
                  <td>{{ $row->no_surat  }}</td>
                  <td>{{ $row->perihal }}</td>
                  <td>{{ $row->kepada }}</td>
                  <td class="text-center">
                    @if ($row->aktivitas == 1)
                      <span class="badge bg-warning">Menunggu</span>
                    @elseif($row->aktivitas == 3)
                      <span class="badge bg-primary">Verifikasi Sekretaris</span>
                    @elseif($row->aktivitas == 4)
                      <span class="badge bg-info">Sukses</span>
                    @elseif($row->aktivitas == 5)
                      <span class="badge bg-success">Arsip</span>
                    @else
                      <span class="badge bg-danger">Revisi Surat</span>
                    @endif
                    
                  </td>
                  <td class="text-center">
                        @if (Auth::user()->role == 1)
                            @if ($row->aktivitas == 1 || $row->aktivitas == 2 )
                            <a href="/surat-keluar-edit/{{ $row->id }}" class="btn btn-icon btn-success" title="Edit"><span class="bx bx-edit-alt me-1"></span></a>
                            <a href="/surat-keluar-delete/{{ $row->id }}" class="btn btn-icon btn-danger" title="Delete"><span class="bx bx-trash me-1"></span></a>  
                            @endif
                            @if ($row->aktivitas == 4)
                            <a href="/surat-keluar-arsip-proses/{{ $row->id }}" class="btn btn-icon btn-primary" title="Arsip"><span class="bx bxs-archive-in"></span></a>
                            @else
                            -
                            @endif
                        @endif
                        @if (Auth::user()->role == 2)
                            @if ($row->aktivitas == 3 || $row->aktivitas == 2 || $row->aktivitas == 4)
                                <a href="/sk-sekretaris-detail/{{ $row->id }}" class="btn btn-icon btn-success" title="Detail"><span class="bx bx-show-alt me-1"></span></a>
                            @endif
                            @if($row->aktivitas == 1)
                                <a href="/sk-sekretaris-validasi/{{ $row->id }}" class="btn btn-icon btn-warning" title="Validasi"><span class="bx bx-paper-plane me-1"></span></a>
                            @endif
                        @endif
                        @if (Auth::user()->role == 3)
                            @if ($row->aktivitas == 4 )
                            <a href="/sk-camat-detail/{{ $row->id }}" class="btn btn-icon btn-success" title="Detail"><span class="bx bx-show-alt me-1"></span></a>
                            
                            @endif
                            @if($row->aktivitas == 3)
                                <a href="/sk-camat-validasi/{{ $row->id }}" class="btn btn-icon btn-warning" title="Disposisi"><span class="bx bx-paper-plane me-1"></span></a>
                            @endif
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
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection