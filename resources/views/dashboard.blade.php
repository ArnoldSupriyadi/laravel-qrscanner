<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR SCAN</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container col-lg-6 py-5">
         {{-- Pesan --}}
            @if (session()->has('gagal'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('gagal') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        {{-- Pesan --}}

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                </tr>
                @foreach ($absens as $item)
                    <tr>
                        <td>{{ $item->id_siswa }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ date("d-m-Y", strtotime($item->tanggal)) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="row">
            <div class="col-md-6 text-center">
                <a href="{{ route('absenmasuk') }}" class="btn btn-primary">Check In</a>
            </div>
            <div class="col-md-6 text-center">
                <a href="#" class="btn btn-danger">Check Out</a>
            </div>
        </div>
    </div>
   
  </body>
</html>