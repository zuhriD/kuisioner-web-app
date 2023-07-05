@extends('layouts.base')
@section('title')
    Result
@endsection

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>List Result</h1>
      </div>
      @if (session('success'))
    <div class="col-sm-12 mt-2">
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@elseif(session('error'))
    <div class="col-sm-12 mt-2">
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif

       


      {{-- buat tabel list project --}}
      <div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No Result</th>
              <th>Nama User</th>
              <th>Time</th>
              <th>Duration</th>
              <th>Mistakes</th>
              <th>Score</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($result as $item)
            <tr>
             <td>{{$item->id}}</td>
             <td>{{$item->user->name}}</td>
             <td>{{$item->time}}</td>
              <td>{{$item->duration}} Detik</td>
              <td>{{$item->mistakes}}</td>
             <td>{{$item->score}}</td>
              <td>
                <form action="{{ route('result.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')"><i class="fas fa-trash"></i></button>
                  </form>
              </td>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- /.container-fluid -->
  

<script src="{{ asset('js/result.js') }}"></script>
@endsection
