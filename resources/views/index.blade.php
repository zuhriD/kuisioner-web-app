@extends('layouts.base')
@section('title')
    Home
@endsection
@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-12">
      <h1>Selamat Datang di Sistem Informasi Rapid Typing Test {{ Auth::user()->role_id }}</h1>
    </div>
    
  </div>
</div><!-- /.container-fluid -->
@endsection
@section('content')
@endsection