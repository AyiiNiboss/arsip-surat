@extends('layout.main')
@section('content')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
            .kbw-signature { width: 100%; height: 200px;}
            #sig canvas{

                width: 100% !important;

                height: auto;
            }
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
          <h5 class="card-header">Validasi Surat Keluar</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="row mb-4">
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
            <form action="/sk-camat-ttd/{{ $data->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row g-2 mb-1">
                <div class="col-6 mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Tanda Tangan</label>
                        <div id="sig" ></div>
                          <textarea id="signature64" class="form-control" name="ttds" style="display: none"></textarea>
                </div>
               </div>
                <div class="col-6">
                    <a href="/surat-keluar" class="btn btn-info">Kembali</a>
                    <button id="clear" class="btn btn-warning">Clear Signature</button>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});

    $('#clear').click(function(e) {

        e.preventDefault();

        sig.signature('clear');

        $("#signature64").val('');

    });

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