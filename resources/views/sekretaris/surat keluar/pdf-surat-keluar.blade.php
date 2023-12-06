<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview Surat Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
<style type="text/css">
    @page {
        margin-top: 1cm;
        margin-left: 1.5cm;
        margin-right: 1.5cm;
        margin-bottom: 0.1cm;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    table {
        font-family: Arial, Helvetica, sans-serif, arial, sans-serif;
        font-size: 14px;
        color: #333333;
        border-width: none;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        padding-bottom: 8px;
        padding-top: 8px;
        font-size: 0.75rem;
        letter-spacing: 1px;
        font-weight: 600;
    }

    td {
        text-align: left;
    }

    .hr_satu {
        border-width: 4px;
        color: black;
        margin-top: 0px;
    }

    .hr_dua {
        border-width: 1px;
        color: black;
        margin-top: -15px;
    }

    .container {
        position: relative;
    }

    .topright {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 18px;
        border-width: thin;
        padding: 5px;
    }

    .topright2 {
        position: absolute;
        top: 30px;
        right: 50px;
        font-size: 18px;
        border: 1px solid;
        padding: 5px;
        color: red;
    }
    .table td {
        font-size: 0.75rem;
        letter-spacing: 1px;
    }
    td {
        font-weight: 600;
    }
    h5 {
        font-size: 0.75rem;
        letter-spacing: 1px;
        font-weight: 600;
    }
    .table-bordered > :not(caption) > * {
    border-width: 1px 0;
    }
</style>

<body>
    <table>
        <tr>
            <td>
                <img src="{{ $image }}" alt="logo1" width="100%">
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col">
            <h5 align="right" style="margin-right: 40px;margin-top: 10px;">{{ Carbon\Carbon::parse($data->tgl_surat)->translatedFormat('d F Y');  }}</h5>
            <table class="table table-borderless" style="margin-left: 50px;">
                <tbody class="table-border-bottom-0">
                  <tr>
                      <td style="width: 80px">Nomor</td>
                      <td>: {{ $data->no_surat }}</td>
                  </tr>
                  <tr>
                      <td>Sifat</td>
                      <td>: {{ $data->sifat }}</td>
                  </tr>
                  <tr>
                      <td>Lampiran</td>
                      <td>: {{ $data->lampiran }}</td>
                  </tr>
                  <tr>
                      <td>Perihal</td>
                      <td>: {{ $data->perihal }}</td>
                  </tr>
                  
                </tbody>
              </table>
            <table class="table table-borderless" style="margin-left: 50px;">
                <tbody class="table-border-bottom-0">
                  <tr>
                      <td style="">Kepada Yth.</td>
                  </tr>
                  <tr>
                    <td>{{ $data->kepada }}</td>
                  </tr>
                </tbody>
              </table>
              <br><br>
            <table class="table table-borderless" style="margin-left: 50px;">
                <tbody class="table-border-bottom-0">
                  <tr>
                      <td style="width: 100%;">{!! $data->isi_surat !!}</td>
                  </tr>
                </tbody>
              </table>
              
        </div>
    </div>
    <br><br>
        </table>
        <table class="table table-borderless" style="margin-left: 50px;">
            <thead>
                <tr>
                    <th style="text-align: left"></th>
                    <th style="width: 40%">Palembang, {{ Carbon\Carbon::parse($data->tgl)->translatedFormat('d F Y'); }}</th>
                  </tr>
            </thead>
            <thead>
                <tr>
                    <th style="text-align: left"></th>
                    <th style="width: 40%">An CAMAT EMPAT PETULAI DANGKU</th>
                  </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            <tr>
                <td style=""></td>
                <td></td>
            </tr>
            <tr>
                <td style=""></td>
                <td> <img src="{{ $data->ttd }}" width="130" alt=""></td>
            </tr>
            <tr>
                <td style=""></td>
                <td>Arman Sarijaya, S.H</td>
            </tr>
            </tbody>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>