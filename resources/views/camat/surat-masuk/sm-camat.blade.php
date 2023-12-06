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
        </h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Diterima</th>
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
                    @if ($row->aktivitas == 4 )
                        <a href="/sm-disposisi/{{ $row->id }}" class="btn btn-icon btn-danger" title="Detail"><span class="bx bxs-file-pdf me-1"></span></a>
                        <a href="/sm-camat-detail/{{ $row->id }}" class="btn btn-icon btn-success" title="Surat disposisi"><span class="bx bx-show-alt me-1"></span></a>
                    @endif
                    @if($row->aktivitas == 3)
                        <a href="/sm-camat-ajukan/{{ $row->id }}" class="btn btn-icon btn-warning" title="Disposisi"><span class="bx bx-paper-plane me-1"></span></a>
                    @endif
                    @if ($row->aktivitas == 5)
                    <a href="/surat-masuk-detail/{{ $row->id }}" class="btn btn-icon btn-warning" title="Detail"><span class="bx bx-show-alt me-1"></span></a>
                    @endif
                    @if ( $row->aktivitas == 2 || $row->aktivitas == 1)
                        -
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