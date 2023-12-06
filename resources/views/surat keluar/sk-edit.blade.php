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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Surat / Surat Keluar /</span> Detail Surat Keluar</h4>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Detail Surat Keluar</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="mb-4 col-12 mb-0">
                @if ($data->catatan != Null)
                    <div class="alert alert-warning">
                    <h6 class="alert-heading fw-bold mb-1">Catatan Revisi Surat !!</h6>
                    <p class="mb-0">{{ $data->catatan }}</p>
                    </div>
                @endif
              </div>
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="fw-bold mb-0">INFORMASI UMUM </h5>
                    <p>lengkapi informasi pada surat Keluar</p>
                    <form action="/surat-keluar-edit-proses/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                         <div class="row g-2">
                           <div class="col-6 mb-1">
                             <label for="nameBasic" class="form-label">NOMOR SURAT</label>
                             <input type="text" id="nameBasic" name="no_surat" value="{{ $data->no_surat }}" class="form-control" placeholder="Masukan Nomor Surat" required />
                           </div>
                           <div class="col mb-1">
                             <label for="namabasic" class="form-label">TANGGAL SURAT</label>
                             <input type="date" id="namabasic" name="tgl_surat" value="{{ $data->tgl_surat }}" class="form-control" placeholder="Masukan Nama" required />
                           </div>
                         </div>
                         <div class="row g-2">
                           <div class="col-6 mb-1">
                             <label for="nameBasic" class="form-label">Kepada</label>
                             <input type="text" id="nameBasic" name="kepada" value="{{ $data->kepada }}" class="form-control" placeholder="Masukan Instansi Pengirim" required />
                           </div>
                           <div class="col mb-1">
                             <label for="emailBasic" class="form-label">PERIHAL SURAT</label>
                             <input type="text" id="emailBasic" name="perihal" value="{{ $data->perihal }}" class="form-control" placeholder="Masukan Perihal Surat" required />
                           </div>
                         </div>
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
                           <div class="col mb-1">
                               <label for="exampleFormControlSelect1" class="form-label">SIFAT</label>
                               <select class="form-select" name="sifat" id="exampleFormControlSelect1" aria-label="Default select example">
                                 <option value="{{ $data->sifat }}" {{ $data->sifat ? 'selected' : '' }} @disabled(true)>{{ $data->sifat }}</option>
                                 <option value="biasa">BIASA</option>
                                 <option option value="penting">PENTING</option>
                               </select>
                           </div>
                         </div>
                         <div class="row g-2">
                           <div class="col">
                             <div class="mb-3">
                               <label for="exampleFormControlTextarea1" class="form-label">ISI surat</label>
                               <textarea class="form-control" name="isi_surat" id="editor" value="{{ $data->isi_surat }}" rows="3" style="height: 200px;"></textarea>
                             </div>
                           </div>
                         </div>
                       </div>
                        <div class="col-6">
                            <a href="/surat-keluar" class="btn btn-info">Kembali</a>
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
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    editor.setData('{!! $data->isi_surat !!}');
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection