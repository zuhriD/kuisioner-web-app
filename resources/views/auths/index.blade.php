@extends('auths.base')
@section('title')
    Login
    
@endsection

@section('content')
<!-- /.login-logo -->
<div class="card card-outline card-primary">
  <div class="card-header text-center">
    <a href="" class="h1"><b>Rapid Typing Test</b> Petugas Entri</a>
  </div>
  <div class="card-body">
    <p class="login-box-msg">Sign in to start your session</p>
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
    </div>
    @elseif($sudah_isi != null)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $sudah_isi }}
    </div>
    @endif

    <div class="alert alert-info">
      <p><strong>Informasi !!!</strong></p>
      <ul>
        <li>Waktu akan dimulai setelah masuk lembar kuesioner.</li>
        <li>Ketik sesuai kuesioner yang diberikan, termasuk besar kecilnya huruf.</li>
        <li>Nilai akan keluar setelah menekan tombol kirim.</li>
      </ul>
    </div>

    <form action="{{ route('auths.login') }}" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Username Dengan nama" name="username" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password Dengan NIK" name="password" maxlength="16" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.card-body -->
</div>
  <!-- /.card -->
@endsection