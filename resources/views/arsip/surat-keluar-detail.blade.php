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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Arsip / Surat Keluar /</span> Detail Surat Keluar</h4>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Detail Surat Keluar</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="row mb-2">
                <div class="col-6">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th colspan="2">Informasi surat</th>
                          </tr>
                          <tr>
                            <th>Nomor surat</th>
                            <th>: {{ $data->no_surat }}</th>
                          </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            <tr>
                                <td>Sifat</td>
                                <td>: {{ $data->sifat }}</td>
                            </tr>
                            <tr>
                                <td>Lampiran</td>
                                <td>: {{ $data->lampiran }}</td>
                            </tr>
                            <tr>
                                <td>PERIHAL</td>
                                <td>: {{ $data->perihal }}</td>
                            </tr>
                            <tr>
                                <td>lampiran</td>
                                <td>: {{ $data->lampiran }}</td>
                            </tr>
                            <tr>
                                <td>TANGGAL SURAT</td>
                                <td>: {{ Carbon\Carbon::parse($data->tgl_surat)->translatedFormat('d F Y'); }}</td>
                            </tr>
                            <tr>
                                <td>Kepada</td>
                                <td>: {{ $data->kepada }}</td>
                            </tr>
                            <tr>
                                <td>file</td>
                                <td>: <a href="/sk-sekretaris-pdf/{{ $data->id }}" class="btn btn-sm btn-info">Preview Surat</a>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
                <div class="col-6">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                          <tr>
                            <th colspan="1" style="width: 100px;">Tanggal arsip</th>
                            <th>: {{ Carbon\Carbon::parse($data->tgl_arsip)->translatedFormat('d F Y'); }}</th>
                          </tr>
                          </thead>
                        </table>
                      </div>
                </div>
            </div>
            <div class="col-6">
              <a href="/surat-keluar-arsip" class="btn btn-info">Kembali</a>
            </div>
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