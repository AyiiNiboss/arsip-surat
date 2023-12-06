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
                                <td>Diterima</td>
                                <td>: {{ Carbon\Carbon::parse($data->tgl_diterima)->translatedFormat('d F Y'); }}</td>
                            </tr>
                            <tr>
                              <td style="width: 243px">Nomor index</td>
                              <td>: {{ $data->no_index }}</td>
                          </tr>
                            <tr>
                                <td>DIsposisi Ke</td>
                                <td>: {{ $data->bagianRelasi->nama_bagian }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal disposisi</td>
                                <td>: {{ Carbon\Carbon::parse($data->tgl_disposisi)->translatedFormat('d F Y'); }}</td>
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
            <div class="row mb-2">
                <div class="col-6">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th colspan="2"><strong>INFORMASI DETAIL SURAT</strong></th>
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
            <a href="/sm-arsip" class="btn btn-info">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
      
@endsection