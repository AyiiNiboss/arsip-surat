@extends('layout.main')
@section('content')
<style>
.alert {
    display: flex;
    justify-content: center;
}
</style>
{{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> --}}
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Arsip / </span>Surat Masuk</h4>
<div class="row">
  <div class="col-lg-12 order-0">
    <div class="card">
        <h5 class="card-header">
            {{-- <button class="btn btn-icon btn-secondary" data-bs-toggle="modal" data-bs-target="#basicModal" title="Tambah Data"><span class="tf-icons bx bx-plus"></span></button> --}}
        </h5>
        {{-- Modal Tambah data --}}
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Arsip</th>
                <th>Nomor index</th>
                <th>Tanggal Diterima</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($data as $row)
              <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                  <td>{{ Carbon\Carbon::parse($row->tgl_arsip)->translatedFormat('d F Y');  }}</td>
                  <td>{{ $row->no_index }}</td>
                  <td>{{ Carbon\Carbon::parse($row->tgl_diterima)->translatedFormat('d F Y'); }}</td>
                  <td>{{ $row->pengirim }}</td>
                  <td>{{ $row->perihal }}</td>
                  <td class="text-center">
                    <a href="/sm-disposisi/{{ $row->id }}" class="btn btn-icon btn-danger" title="Detail"><span class="bx bxs-file-pdf me-1"></span></a>
                    <a href="/sm-arsip-detail/{{ $row->id }}" class="btn btn-icon btn-warning" title="Detail"><span class="bx bx-show-alt me-1"></span></a>
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