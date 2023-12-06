@extends('layout.main')
@section('content')


<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card bg-info">
      <div class="d-flex align-items-center row">
        <div class="col-sm-12">
          <div class="card-body text-center align-middle">
            <h5 class="m-0 text-white">SISTEM INFORMASI ARSIP SURAT MASUK & SURAT KELUAR</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@auth('web')
  @if (Auth::user()->role != 2)
    <div class="row">
      <div class="col-lg-6 mb-4 order-0">
        <div class="card bg-warning">
          <div class="d-flex align-items-end row">
            <div class="col-sm-12">
              <div class="card-body text-white">
                <h5 class="card-title text-white">SURAT MASUK <span class="tf-icons bx bxs-archive-in" style="margin-bottom: 5px;"></span> </h5>
                <h1 class="text-white fw-bold">
                  {{ $data_sm }}
                </h1>
              </div>
              <div class="card-footer bg-dark text-center align-middle" style="padding: 0.5rem 1.5rem;">
                <a href="/surat-masuk-arsip" class="text-white">Selengkapnya <span class="tf-icons bx bx-right-arrow-circle" style="margin-bottom: 2px;"></span> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4 order-0">
        <div class="card bg-success">
          <div class="d-flex align-items-end row">
            <div class="col-sm-12">
              <div class="card-body text-white">
                <h5 class="card-title text-white">SURAT KELUAR <span class="tf-icons bx bxs-archive-out" style="margin-bottom: 5px;"></span> </h5>
                <h1 class="text-white fw-bold">
                  {{ $data_sk }}
                </h1>
              </div>
              <div class="card-footer bg-dark text-center align-middle" style="padding: 0.5rem 1.5rem;">
                <a href="/surat-keluar-arsip" class="text-white">Selengkapnya <span class="tf-icons bx bx-right-arrow-circle" style="margin-bottom: 2px;"></span> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="row">
      <div class="col-lg-6 mb-4 order-0">
        <div class="card bg-warning">
          <div class="d-flex align-items-end row">
            <div class="col-sm-12">
              <div class="card-body text-white">
                <h5 class="card-title text-white">SURAT MASUK <span class="tf-icons bx bxs-archive-in" style="margin-bottom: 5px;"></span> </h5>
                <h1 class="text-white fw-bold">
                  {{ $data_sm1 }}
                </h1>
              </div>
              <div class="card-footer bg-dark text-center align-middle" style="padding: 0.5rem 1.5rem;">
                <a href="/sm-sekretaris" class="text-white">Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4 order-0">
        <div class="card bg-success">
          <div class="d-flex align-items-end row">
            <div class="col-sm-12">
              <div class="card-body text-white">
                <h5 class="card-title text-white">SURAT KELUAR <span class="tf-icons bx bxs-archive-out" style="margin-bottom: 5px;"></span> </h5>
                <h1 class="text-white fw-bold">
                  {{ $data_sk1 }}
                </h1>
              </div>
              <div class="card-footer bg-dark text-center align-middle" style="padding: 0.5rem 1.5rem;">
                <a href="/surat-keluar" class="text-white">Selengkapnya <span class="tf-icons bx bx-right-arrow-circle" style="margin-bottom: 2px;"></span> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@endauth

@auth('bagian')
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body text-white">
              <h5 class="card-title text-dark">Visi</h5>
              <p class="text-dark">Terwujudnya tata Pemerintahan dan Pelayanan publik yang Profesional, Responsif, Inovatif, dan Kreatif menuju Masyarakat Kecamatan Empat Petulai Dangku yang Lebih Maju.
              </p>
              <h5 class="card-title text-dark mt-3">Misi</h5>
              <ul>
                <li class="text-dark">Meningkatkan keimanan dan ketakwaan kepada Ketuhanan yang Maha Esa.</li>
              </ul>
              <ul>
                <li class="text-dark">Mewujudkan tata kelola Pemerintahan yang baik, transparan.</li>
              </ul>
              <ul>
                <li class="text-dark">Meningkatkan sarana serta kualitas sumber daya Kantor Camat Empat Petulai Dangku dalam pelaksanaan pelayanan Kepada Masyarakat.
                </li>
              </ul>
              <ul>
                <li class="text-dark">Meningkatkan dan Partisipasi Masyarakat dalam Perencanaan dan Pelaksanaan Pembangunan.
                </li>
              </ul>
              <ul>
                <li class="text-dark">Meningkatkan Pemberdayaan Masyarakat dengan Pembinaan Penyelenggaraan Pemerintahan Desa yang baik.3
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endauth

<!-- / Content -->
@endsection
