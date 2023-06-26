<!DOCTYPE html>
<html>
<head>
    <title>Halaman Kuisioner</title>
    <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    {{-- make logout button in right --}}
    <div class="float-right">
        <form id="logout-form" action="{{ route('auths.logout') }}" method="POST" >
            @csrf
            <button type="submit" class="btn btn-danger mt-2 mr-2">Logout</button>
        </form>
    </div>
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Kuisioner Telah Diisi</h5>
                {{-- tambahkan nilai score --}}
                <p class="card-text">Nilai Anda adalah {{$result->score}}.</p>
                <p class="card-text">Terima kasih atas partisipasi Anda dalam mengisi kuisioner.</p>
            </div>
        </div>
    </div>
{{-- Jquery --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>
</html>
