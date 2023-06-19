@extends('layouts.base')
@section('title')
    Kuisioner
@endsection

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>List Kuisioner</h1>
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
        <div class="d-flex justify-content-between mt-2">
          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addKuisionerModal">Add</a>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Kode Kuisioner</th>
              <th>Nama Kuisioner</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kuisioner as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editKuisionerModal" data-id="{{$item->id}}" >
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('kuisioners.destroy', $item->id) }}" method="POST" class="d-inline">
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
  
  {{-- Modal Add --}}
<div class="modal fade" id="addKuisionerModal" tabindex="-1" role="dialog" aria-labelledby="addKuisionerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKuisionerModalLabel">Add Kuisioner</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('kuisioners.store')}}" method="POST" class="row">
            @csrf
            <div class="col-md-12">
              <div class="form-group">
                <label for="clientName">Kode Kuisioner</label>
                <input type="text" class="form-control" id="clientName" placeholder="Example: 35" name="kode_kuisioner" required>
              </div>
              <div class="form-group">
                <label for="kuisionerTitle">Nama Kuisioner</label>
                <input type="text" class="form-control" id="kuisionerTitle" placeholder="Example: Jawa Tengah" name="name" required>
              </div>
            </div>
            <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>        
      </div>
    </div>
  </div>

  
  {{-- Modal edit --}}
<div class="modal fade" id="editKuisionerModal" tabindex="-1" role="dialog" aria-labelledby="editKuisionerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKuisionerModalLabel">Edit Kuisioner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="row" id="editForm">
          @csrf
          @method('PUT')
          <div class="col-md-6">
            <div class="form-group">
              <label for="clientName">Kode Kuisioner</label>
              <input type="text" class="form-control" id="kodeKuisionerEdit" placeholder="Example: 35" name="kode_kuisioner" required>
            </div>
            <div class="form-group">
              <label for="kuisionerTitle">Nama Kuisioner</label>
              <input type="text" class="form-control" id="kuisionerTitleEdit" placeholder="Example: Jawa Tengah" name="name" required>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>        
    </div>
  </div>
</div>

<script src="{{ asset('js/kuisioner.js') }}"></script>
@endsection
