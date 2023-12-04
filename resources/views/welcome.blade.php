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
        {{-- scanner --}}
        <div class="card bg-white shadow rounded-3 p-3 border-0">

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

            <div class="scanner"></div>
            <video id="preview"></video>

            {{-- Form --}}
            <form action="{{ route('store') }}" method="post" id="form">
                @csrf
                {{-- <input type="hidden" name="id_siswa" id="id_siswa"> --}}
                <input type="text" name="lokasi" id="lokasi">
            </form>
        </div>
        {{-- scanner --}}

        {{-- <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                </tr>
                @foreach ($absen as $item)
                    <tr>
                        <td>{{ $item->id_siswa }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->tanggal }}</td>
                    </tr>
                @endforeach
            </table>
        </div> --}}
    </div>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
          console.log(content);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            console.error('No cameras found.');
          }
        }).catch(function (e) {
          console.error(e);
        });

        scanner.addListener('scan', function(c){
            document.getElementById('lokasi').value = c;
            document.getElementById('form').submit();
        });


      </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>