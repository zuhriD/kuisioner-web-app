@extends('layouts.base')
@section('title')
    SLS
@endsection

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>List SLS</h1>
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
          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addSLSModal">Add</a>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>    
              <th>Kode Desa</th>
              <th>Kode SLS</th>
              <th>Kode Sub SLS</th>
              <th>Nama SLS</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sls as $item)
            <tr>
              <td>{{$item->desa->id}}</td>
              <td>{{$item->id}}</td>
              <td>{{$item->sub_sls}}</td>
              <td>{{$item->name}}</td>
              <td>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editSLSModal" data-id="{{$item->id}}" >
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('sls.destroy', $item->id) }}" method="POST" class="d-inline">
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
<div class="modal fade" id="addSLSModal" tabindex="-1" role="dialog" aria-labelledby="addSLSModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addSLSModalLabel">Add SLS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('sls.store')}}" method="POST" class="row">
            @csrf
            <div class="col-md-12">
              {{-- make select input for desa --}}
              <div class="form-group">
                <label for="desa">Desa</label>
                <select class="form-control" id="desa" name="desa_id" required>
                  <option value="">-- Select Desa --</option>
                  @foreach ($desa as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
               </div>
              <div class="form-group">
                <label for="clientName">Kode SLS</label>
                <input type="number" class="form-control" id="clientName" placeholder="Example: 35" name="kode_sls" required>
              </div>
              <div class="form-group">
                <label for="clientName">Kode Sub SLS</label>
                <input type="number" class="form-control" id="clientName" placeholder="Example: 35" name="kode_sub_sls" required>
              </div>
              <div class="form-group">
                <label for="slsTitle">Nama SLS</label>
                <input type="text" class="form-control" id="slsTitle" placeholder="Example: Jawa Tengah" name="name" required>
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
<div class="modal fade" id="editSLSModal" tabindex="-1" role="dialog" aria-labelledby="editSLSModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSLSModalLabel">Edit SLS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="row" id="editForm">
          @csrf
          @method('PUT')
          <div class="col-md-12">
            <div class="form-group">
                <label for="desa">Desa</label>
                <select class="form-control" id="desaEdit" name="desa_id" required>
                  <option value="">-- Select Desa --</option>
                  @foreach ($desa as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
               </div>
            <div class="form-group">
              <label for="clientName">Kode SLS</label>
              <input type="number" class="form-control" id="kodeSLSEdit" placeholder="Example: 35" name="kode_sls" required>
            </div>
            <div class="form-group">
                <label for="clientName">Kode Sub SLS</label>
                <input type="number" class="form-control" id="kodeSubEdit" placeholder="Example: 35" name="kode_sub_sls" required>
              </div>
            <div class="form-group">
              <label for="slsTitle">Nama SLS</label>
              <input type="text" class="form-control" id="slsTitleEdit" placeholder="Example: Jawa Tengah" name="name" required>
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

<script src="{{ asset('js/sls.js') }}"></script>
@endsection
