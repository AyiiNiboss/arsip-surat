@extends('layout.main')
@section('content')
<style>
    .table td {
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
    }
    td {
        font-weight: 600;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Surat / Surat Masuk /</span> Detail Surat Masuk</h4>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Detail Surat Masuk</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="mb-4 col-12 mb-0">
                <div class="alert alert-warning">
                  <h6 class="alert-heading fw-bold mb-1">Catatan Revisi Surat !!</h6>
                  <p class="mb-0">{{ $data->catatan }}</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="fw-bold mb-0">INFORMASI UMUM </h5>
                    <p>lengkapi informasi pada surat masuk</p>
                    <form action="/surat-masuk-edit-proses/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div class="row g-2">
                        <div class="col-6 mb-2">
                          <label for="nameBasic" class="form-label">NOMOR SURAT</label>
                          <input type="text" id="nameBasic" name="no_surat" class="form-control" value="{{ $data->no_surat }}" placeholder="Masukan Nomor Surat" required />
                        </div>
                        <div class="col mb-2">
                          <label for="namabasic" class="form-label">TANGGAL SURAT</label>
                          <input type="date" id="namabasic" name="tgl_surat" class="form-control" value="{{ $data->tgl_surat }}" placeholder="Masukan Nama" required />
                        </div>
                        <div class="col mb-2">
                          <label for="emailBasic" class="form-label">DITERIMA TANGGAL</label>
                          <input type="date" id="emailBasic" name="tgl_diterima" class="form-control" value="{{ $data->tgl_diterima }}" placeholder="Masukan Nama" required />
                        </div>
                      </div>
                      <div class="row g-2">
                        <div class="col-6 mb-2">
                          <label for="nameBasic" class="form-label">PENGIRIM</label>
                          <input type="text" id="nameBasic" name="pengirim" class="form-control" value="{{ $data->pengirim }}" placeholder="Masukan Instansi Pengirim" required />
                        </div>
                        <div class="col-6 mb-1">
                          <label for="nameBasic" class="form-label">Nomor index</label>
                          <input type="text" id="nameBasic" name="no_index" class="form-control" value="{{ $data->no_index }}" placeholder="Masukan Nomor Index Surat" required />
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                        <div class="col mb-2">
                            <label for="emailBasic" class="form-label">PERIHAL SURAT</label>
                            <input type="text" id="emailBasic" name="perihal" class="form-control" value="{{ $data->perihal }}" placeholder="Masukan Perihal Surat" required />
                          </div>
                      </div>
                      <p class="fw-bold mb-0">INFORMASI TAMBAHAN </p>
                      <div class="row g-2 mb-4">
                        <div class="col mb-1">
                            <label for="exampleFormControlSelect1" class="form-label">LAMPIRAN</label>
                            <select class="form-select" name="lampiran" id="exampleFormControlSelect1" aria-label="Default select example">
                              <option value="{{ $data->lampiran }}" {{ $data->lampiran ? 'selected' : '' }} @disabled(true)>{{ $data->lampiran }}</option>
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
                            <label for="formFile" class="form-label mb-2">UPLOAD FILE</label>
                            <a href="/surat-masuk-download/{{ $data->id }}" id="fileName" class="d-block">
                                {{ $data->file }}
                            </a>
                            <input class="form-control" name="files" type="file" id="inputFile" onchange="displayFileName(this)" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                        <a href="/surat-masuk" class="btn btn-info">Kembali</a>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
   if (input.files && input.files[0]) {
    fileNameElement.textContent = "";
  }
    </script>
@endsection