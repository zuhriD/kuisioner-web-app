@extends('layouts.base')
@section('title')
    Keluarga
@endsection

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>List Keluarga</h1>
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
          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addKeluargaModal">Add</a>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Nama Kepala Keluarga</th>
              <th>No Urut Bangunan</th>
              <th>No Verifikasi</th>
              <th>Status</th>
              <th>Jumlah Anggota Keluarga</th>
              <th>ID Landmark</th>
              <th>NO KK</th>
              <th>Kode KK</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($keluarga as $item)
            <tr>
                <td>{{$item->nama_kepala_keluarga}}</td>
                <td>{{$item->no_urut_bangunan}}</td>
                <td>{{$item->no_urut_keluarga_verifikasi}}</td>
                <td>
                  @if ($item->status == 1)
                      <span>Sangat Miskin</span>
                  @elseif($item->status == 2)
                      <span>Miskin</span>
                  @elseif($item->status == 3)
                      <span>Tidak Miskin</span>
                  @endif
                </td>
                <td>{{$item->jml_anggota_keluarga}}</td>
                <td>{{$item->landmark}}</td>
                <td>{{$item->no_kk}}</td>
                <td>{{$item->kode_kk}}</td>
                <td>{{ $item->alamat }}</td>
              <td>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editKeluargaModal" data-id="{{$item->id}}" >
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('keluargas.destroy', $item->id) }}" method="POST" class="d-inline">
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
<div class="modal fade" id="addKeluargaModal" tabindex="-1" role="dialog" aria-labelledby="addKeluargaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKeluargaModalLabel">Add Keluarga</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('keluargas.store')}}" method="POST" class="row">
            @csrf
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                <input type="text" class="form-control" id="nama_kepala_keluarga" placeholder="Example: Yudi" name="nama_kepala_keluarga" maxlength="25" required>
              </div>
              <div class="form-group">
                <label for="no_urut_bangunan">No Urut Bangunan</label>
                <input type="text" class="form-control" id="no_urut_bangunan" placeholder="Example: 90" name="no_urut_bangunan" required>
              </div>
              <div class="form-group">
                <label for="no_verifikasi">No Urut Keluarga Verifikasi</label>
                <input type="text" class="form-control" id="no_verifikasi" placeholder="Example: 35" name="no_verifikasi" required>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                {{-- form type select --}}
                <select class="form-control" id="status" name="status" required>
                  <option value="1">Sangat Miskin</option>
                  <option value="2">Miskin</option>
                  <option value="3">Tidak Miskin</option>
                </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="jml_anggota_keluarga">Jumlah Anggota Keluarga</label>
                  <input type="text" class="form-control" id="jml_anggota_keluarga" placeholder="Example: 35" name="jml_anggota_keluarga" required>
                </div>
                <div class="form-group">
                  <label for="id_landmark">ID Landmark</label>
                  <input type="text" class="form-control" id="id_landmark" placeholder="Example: Jawa Tengah" name="id_landmark" required>
                </div>
                <div class="form-group">
                  <label for="no_kk">No KK</label>
                  <input type="text" class="form-control" id="no_kk" placeholder="Example: 35" name="no_kk" required>
                </div>
                <div class="form-group">
                  <label for="kode_kk">Kode KK</label>
                  <input type="text" class="form-control" id="kode_kk" placeholder="Example: Jawa Tengah" name="kode_kk" required>
                </div>
              </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
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
<div class="modal fade" id="editKeluargaModal" tabindex="-1" role="dialog" aria-labelledby="editKeluargaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKeluargaModalLabel">Edit Keluarga</h5>
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
              <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
              <input type="text" class="form-control" id="nama_kepala_keluargaEdit" placeholder="Example: Yudi" name="nama_kepala_keluarga" required>
            </div>
            <div class="form-group">
              <label for="no_urut_bangunan">No Urut Bangunan</label>
              <input type="text" class="form-control" id="no_urut_bangunanEdit" placeholder="Example: 90" name="no_urut_bangunan" required>
            </div>
            <div class="form-group">
              <label for="no_verifikasi">No Urut Keluarga Verifikasi</label>
              <input type="text" class="form-control" id="no_verifikasiEdit" placeholder="Example: 35" name="no_verifikasi" required>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              {{-- form type select --}}
              <select class="form-control" id="statusEdit" name="status" required>
                <option value="1">Sangat Miskin</option>
                <option value="2">Miskin</option>
                <option value="3">Tidak Miskin</option>
              </select>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label for="jml_anggota_keluarga">Jumlah Anggota Keluarga</label>
                <input type="text" class="form-control" id="jml_anggota_keluargaEdit" placeholder="Example: 35" name="jml_anggota_keluarga" required>
              </div>
              <div class="form-group">
                <label for="id_landmark">ID Landmark</label>
                <input type="text" class="form-control" id="id_landmarkEdit" placeholder="Example: Jawa Tengah" name="id_landmark" required>
              </div>
              <div class="form-group">
                <label for="no_kk">No KK</label>
                <input type="number" class="form-control" id="no_kkEdit" placeholder="Example: 35" name="no_kk" required>
              </div>
              <div class="form-group">
                <label for="kode_kk">Kode KK</label>
                <input type="number" class="form-control" id="kode_kkEdit" placeholder="Example: 3500" name="kode_kk" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamatEdit" rows="3" name="alamat" required></textarea>
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

<script src="{{ asset('js/keluarga.js') }}"></script>
@endsection
