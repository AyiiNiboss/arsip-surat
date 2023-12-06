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
            <div class="row mb-4">
                <div class="col-6">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                          <tbody class="table-border-bottom-0">
                            <tr>
                                <td style="width: 243px">Diterima</td>
                                <td>: {{ Carbon\Carbon::parse($data->tgl_diterima)->translatedFormat('d F Y'); }}</td>
                            </tr>
                            <tr>
                                <td>Nomor index</td>
                                <td>: {{ $data->no_index }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
                <div class="col-6">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                          <tr>
                            <th colspan="1">STATUS SURAT 
                              @if ($data->aktivitas == 1)
                              <span class="badge bg-warning">Menunggu</span>
                              @elseif($data->aktivitas == 3)
                                <span class="badge bg-primary">Verifikasi Sekretaris</span>
                              @elseif($data->aktivitas == 4)
                                <span class="badge bg-info">Terdisposisi</span>
                              @elseif($data->aktivitas == 5)
                                <span class="badge bg-success">Arsip</span>
                              @else
                                <span class="badge bg-danger">Revisi Surat</span>
                              @endif
                            </th>
                          </tr>
                          </thead>
                        </table>
                      </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th colspan="2">INFORMASI DETAIL SURAT</th>
                          </tr>
                          <tr>
                            <th style="width: 243px">Nomor Surat</th>
                            <th>: {{ $data->no_surat }}</th>
                          </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            <tr>
                                <td>pengirim</td>
                                <td>: {{ $data->pengirim }}</td>
                            </tr>
                            <tr>
                                <td>PERIHAL</td>
                                <td>: {{ $data->perihal }}</td>
                            </tr>
                            <tr>
                                <td>TANGGAL SURAT</td>
                                <td>: {{ Carbon\Carbon::parse($data->tgl_surat)->translatedFormat('d F Y'); }}</td>
                            </tr>
                            <tr>
                                <td>lampiran</td>
                                <td>: {{ $data->lampiran }}</td>
                            </tr>
                            <tr>
                                <td>file</td>
                                @if ($data->file != '')
                                    <td>: <a href="/surat-masuk-download/{{ $data->id }}" class="btn btn-icon btn-info" title="Download"><span class="bx bx-cloud-download"></span></a></td>
                                @else
                                    <td>: &minus;</td>
                                @endif
                            </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
            </div>
            <form action="/sm-sekretaris-ajukan-proses/{{ $data->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row g-2 mb-1">
                <div class="col-6 mb-3">
                  <label for="dobBasic" class="form-label">TINDAKAN SELANJUTNYA</label>
                  <select class="form-select" name="aktivitas" id="exampleFormControlSelect1" aria-label="Default select example" onchange="toggleCatatanInput()">
                    <option selected disabled>--Silahlan Pilih--</option>
                    <option value="2">Koreksi Kembali</option>
                    <option value="3">Ajukan Ke Kepala</option>
                  </select>
                </div>
                <div class="col-6 mb-0" id="catatanInputDiv" style="display: none;">
                  <label for="catatan" class="form-label">CATATAN</label>
                  <input type="text" id="catatan" name="catatan" class="form-control" placeholder="Silahkan beri catatan disini" />
                </div>
              </div>
              <div class="col-6">
                <a href="/sm-sekretaris" class="btn btn-info">Kembali</a>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function toggleCatatanInput() {
      var selectElement = document.getElementById("exampleFormControlSelect1");
      var catatanInputDiv = document.getElementById("catatanInputDiv");
  
      if (selectElement.value === "2") {
        catatanInputDiv.style.display = "block";
      } else {
        catatanInputDiv.style.display = "none";
      }
    }
  </script>
@endsection