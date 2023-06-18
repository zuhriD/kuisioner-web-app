@extends('layouts.base')
@section('title')
    Kabupaten
@endsection

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>List Kabupaten</h1>
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
          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addKabupatenModal">Add</a>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Kode Provinsi</th>
              <th>Kode Kabupaten</th>
              <th>Nama Kabupaten</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kabupaten as $item)
            <tr>
              <td>{{$item->provinsi->id}}</td>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editKabupatenModal" data-id="{{$item->id}}" >
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('kabupatens.destroy', $item->id) }}" method="POST" class="d-inline">
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
<div class="modal fade" id="addKabupatenModal" tabindex="-1" role="dialog" aria-labelledby="addKabupatenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKabupatenModalLabel">Add Kabupaten</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('kabupatens.store')}}" method="POST" class="row">
            @csrf
            <div class="col-md-12">
              {{-- make select input for provinsi --}}
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select class="form-control" id="provinsi" name="provinsi_id" required>
                  <option value="">-- Select Provinsi --</option>
                  @foreach ($provinsi as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
               </div>
              <div class="form-group">
                <label for="clientName">Kode Kabupaten</label>
                <input type="text" class="form-control" id="clientName" placeholder="Example: 35" name="kode_kabupaten" required>
              </div>
              <div class="form-group">
                <label for="kabupatenTitle">Nama Kabupaten</label>
                <input type="text" class="form-control" id="kabupatenTitle" placeholder="Example: Jawa Tengah" name="name" required>
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
<div class="modal fade" id="editKabupatenModal" tabindex="-1" role="dialog" aria-labelledby="editKabupatenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKabupatenModalLabel">Edit Kabupaten</h5>
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
                <label for="provinsi">Provinsi</label>
                <select class="form-control" id="provinsiEdit" name="provinsi_id" required>
                  <option value="">-- Select Provinsi --</option>
                  @foreach ($provinsi as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
               </div>
            <div class="form-group">
              <label for="clientName">Kode Kabupaten</label>
              <input type="text" class="form-control" id="kodeKabupatenEdit" placeholder="Example: 35" name="kode_kabupaten" required>
            </div>
            <div class="form-group">
              <label for="kabupatenTitle">Nama Kabupaten</label>
              <input type="text" class="form-control" id="kabupatenTitleEdit" placeholder="Example: Jawa Tengah" name="name" required>
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

<script src="{{ asset('js/kabupaten.js') }}"></script>
@endsection
