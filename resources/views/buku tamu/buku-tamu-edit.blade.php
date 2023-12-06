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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Buku Tamu</h4>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Detail Buku Tamu</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="fw-bold mb-0">INFORMASI UMUM </h5>
                    <p>lengkapi informasi pada surat masuk</p>
                    <form action="/buku-tamu-edit-proses/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-2">
                            <div class="col-6 mb-3">
                              <label for="nameBasic" class="form-label">Nama</label>
                              <input type="text" id="nameBasic" name="nama" value="{{ $data->nama }}" class="form-control" placeholder="Masukan Nama Anda" required />
                            </div>
                            <div class="col-6 mb-3">
                              <label for="nameBasic" class="form-label">Alamat</label>
                              <input type="text" id="nameBasic" name="alamat" value="{{ $data->alamat }}" class="form-control" placeholder="Masukan Alamat Anda" required />
                            </div>
                          </div>
                          <div class="row g-2">
                            <div class="col-12 mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label">Maksud Kunjungan</label>
                              <textarea class="form-control" name="maksud_kunjungan" placeholder="Masukan maksud kunjungan" id="exampleFormControlTextarea1" rows="3">{{ $data->maksud_kunjungan }}</textarea>
                            </div>
                          </div>
                          
                          <div class="row g-2 mb-3">
                            <div class="col mb-3">
                                <label for="namabasic" class="form-label">TANGGAL</label>
                                <input type="date" id="namabasic" value="{{ $data->tanggal }}" name="tanggal" class="form-control" placeholder="Masukan Nama" required />
                            </div>
                            <div class="col mb-3">
                                <label for="emailBasic" class="form-label">Jabatan</label>
                                <input type="text" id="emailBasic" value="{{ $data->jabatan }}" name="jabatan" class="form-control" placeholder="Masukan Jabatan" required />
                              </div>
                          </div>
                    
                    <div class="col-6">
                        <a href="/buku-tamu" class="btn btn-info">Kembali</a>
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