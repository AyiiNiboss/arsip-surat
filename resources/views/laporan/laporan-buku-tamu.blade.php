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

    .nmr_srt {
        font-family: 'James Fajardo';
        font-weight: normal;
        font-size: 30px;
        vertical-align: middle;
        padding: 0 2px;
    }

    .name-school1 {
        font-size: 14pt;
        font-weight: bold;
        text-transform: uppercase;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        margin-bottom: -7px;
    }

    .name-school {
        font-size: 12pt;
        font-weight: bold;
        text-transform: uppercase;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        margin-bottom: -5px;
    }

    .alamat {
        font-size: 12pt;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        margin-top: -15px;
    }

    .alamat_1 {
        font-size: 11pt;
        margin-bottom: -28px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }

    .alamat2 {
        font-size: 9pt;
    }

    .isi {
        font-size: 13pt;
        margin-top: 10px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
        padding-left: 50px;
    }

    .isi_paragraf {
        font-size: 13pt;
        margin-top: 10px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
    }

    .ttd-kiri {
        font-size: 9pt;
        margin-left: 50px;
    }

    .ttd-kanan {
        font-size: 13pt;
        margin-left: 20px;
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
    }

    .detail {
        font-size: 10pt;
        font-weight: bold;
        padding-top: -15px;
        padding-bottom: -12px;
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
        font-weight: 300;
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
    }
    td {
        font-weight: 300;
    }
    h5 {
        font-size: 0.75rem;
        letter-spacing: 1px;
        font-weight: 600;
    }
    .content-table {
            width: 100%;
            background-color: #fff;
            border-radius: 5px;
            border: 2px;
        }
        .content-table td, .content-table th {
            border: none;
            padding: 15px;
        }
        .content-table th {
            background-color: #fbfdff;
            color: #000000;
            font-weight: bold;
            text-align: center;
        }
        .content-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td{
            text-align: center;
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
    <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="text-center my-3">
                    @if ($tanggal_a == '' || $tanggal_b == '')
                    Rekapan Data Arsip Buku Tamu
                    @else
                    Rekapan Data Arsip Buku Tamu dari tanggal {{ Carbon\Carbon::parse($tanggal_a)->translatedFormat('d F Y'); }} - {{ Carbon\Carbon::parse($tanggal_b)->translatedFormat('d F Y'); }}
                    @endif
                </h5>
                <table class="table content-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Maksud Kunjungan</th>
                            <th class="text-center">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                            <td>{{ Carbon\Carbon::parse($row->tanggal)->translatedFormat('d F Y'); }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->maksud_kunjungan }}</td>
                            <td class="text-center">{{ $row->jabatan }}</td>
                        </tr>
                        @endforeach
                        
                        <!-- Tambahkan baris-baris data sesuai dengan kebutuhan -->
                    </tbody>
                </table>
    </div>
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>