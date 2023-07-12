@extends('layouts.base')
@section('title')
    User
@endsection

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>List User</h1>
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
          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Add</a>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Kode User</th>
              <th>Nama User</th>
              <th>Username</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->username}}</td>
              <td>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editUserModal" data-id="{{$item->id}}" >
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="d-inline">
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
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('users.store')}}" method="POST" class="row">
            @csrf
            <div class="col-md-12">
              <div class="form-group">
                <label for="clientName">Kode User</label>
                <input type="number" class="form-control" id="clientName" placeholder="Example: 35" name="kode_user" required>
              </div>
              <div class="form-group">
                <label for="userTitle">Nama User</label>
                <input type="text" class="form-control" id="userTitle" placeholder="Example: Adi Huda" name="name" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Example: Yudi" name="username" required>
              </div>
              <div class="form-group password-wrapper">
                <label for="password">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" placeholder="16 Digit NIK" name="password" maxlength="16" minlength="16" required>
                  <div class="input-group-append">
                    <span class="input-group-text password-toggle">
                      <i class="fa fa-eye-slash"></i>
                    </span>
                  </div>
                </div>
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
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
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
              <label for="clientName">Kode User</label>
              <input type="number" class="form-control" id="kodeUserEdit" placeholder="Example: 35" name="kode_user" required>
            </div>
            <div class="form-group">
              <label for="userTitle">Nama User</label>
              <input type="text" class="form-control" id="userTitleEdit" placeholder="Example: Jawa Tengah" name="name" required>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="usernameEdit" placeholder="Example: Yudi" name="username" required>
            </div>
            <div class="form-group password-wrapper">
              <label for="password">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="passwordEdit" placeholder="16 Digit NIK" name="password" maxlength="16" minlength="16" required>
                <div class="input-group-append">
                  <span class="input-group-text password-toggle edit">
                    <i class="fa fa-eye-slash"></i>
                  </span>
                </div>
              </div>
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

<script src="{{ asset('js/user.js') }}"></script>
@endsection
