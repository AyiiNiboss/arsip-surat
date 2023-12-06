<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview Surat Keluar</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
  </head>
<style type="text/css">
    @page {
        margin-top: 1cm;
        margin-left: 1.5cm;
        margin-right: 1.5cm;
        margin-bottom: 0.1cm;
    }
    body {
      font-family: Arial, sans-serif;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border: 1px solid #2b2a2a;
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
    <table>
        <tr>
            <td style="text-align: center;font-weight:600">LEMBAR DISPOSISI</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: 50%">
                <table style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none;width: 30%">Surat dari</td>
                        <td style="border: none;">: {{ $data->pengirim }}</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;width: 30%"></td>
                        <td style="border: none;"></td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;">No. Surat</td>
                        <td style="border: none;">: {{ $data->no_surat }}</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;">Tgl. Surat</td>
                        <td style="border: none;">: {{ Carbon\Carbon::parse($data->tgl_surat)->translatedFormat('d F Y'); }}</td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%">
                <table style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none;width: 40%">Diterima Tgl</td>
                        <td style="border: none;">: {{ Carbon\Carbon::parse($data->tgl_diterima)->translatedFormat('d F Y'); }}</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;width: 30%"></td>
                        <td style="border: none;"></td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;width: 40%">No. Agenda</td>
                        <td style="border: none;">: {{ $data->no_index }}</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;">Sifat</td>
                        <td style="border: none;">: Penting</td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
    <table>
        <tr>
            <td>
                <table style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none;width: 80px">Perihal</td>
                        <td style="border: none;">: {{ $data->perihal }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: 50%">
                <table style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none;">Diteruskan kepada sdr. :</td>
                    </tr>
                    <tr>
                        <td style="border: none;">{{ $data->bagianRelasi->nama_bagian }}</td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%">
                <table style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none;">Dengan hormat harap :</td>
                    </tr>
                    <tr>
                        <td style="border: none;">- Proses lebih lanjut</td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
    <table>
        <tr>
            <td style="width: 50%">
                <table style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none;">Catatan :</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;"></td>
                    </tr>
                    <tr>
                        <td style="border: none;">{{ $data->catatan_camat }}</td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%">
                <table style="border: none;font-weight:600">
                    <tr style="border: none;">
                        <td style="border: none;text-align: center">CAMAT EMPAT PETULAI DANGKU</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;"><br></td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;text-align: center;">ARMAN SARIJAYA, SH</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;text-align: center">NIP. 19711023 200604 1 005</td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}
</body>
</html>