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
              <th>Nama Provinsi</th>
              <th>Nama Kabupaten</th>
              <th>Nama Kecamatan</th>
              <th>Nama Desa</th>
              <th>Nama SLS</th>
              <th>Kode Keluarga</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kuisioner as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->provinsi->name}}</td>
              <td>{{$item->kabupaten->name}}</td>
              <td>{{$item->kecamatan->name}}</td>
              <td>{{$item->desa->name}}</td>
              <td>{{$item->sls->name}}</td>
              <td>{{$item->keluarga->kode_kk}}</td>
              <td>
              @if ($item->status == 'aktif')
                  <span class="badge badge-success">Aktif</span>
              @else
                  <span class="badge badge-danger">Tidak Aktif</span>
              @endif
              <td>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editKuisionerModal" data-id="{{$item->id}}" >
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('kuisioners.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')"><i class="fas fa-trash"></i></button>
                  </form>

                  {{-- make view action --}}
                  <a href="{{route('kuisioners.show', $item->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
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
            <div class="col-md-6">
              <div class="form-group">
                <label for="clientName">Provinsi</label>
                <select name="provinsi_id" id="provinsi_id" class="form-control" required>
                  <option value="">-- Pilih Provinsi --</option>
                  @foreach ($provinsi as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="clientName">Kabupaten</label>
                <select name="kabupaten_id" id="kabupaten_id" class="form-control" required>
                  <option value="">-- Pilih Kabupaten --</option>
                  @foreach ($kabupaten as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="clientName">Kecaamatan</label>
                <select name="kecamatan_id" id="kecamatan_id" class="form-control" required>
                  <option value="">-- Pilih Kecamatan --</option>
                  @foreach ($kecamatan as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="clientName">Desa</label>
                <select name="desa_id" id="desa_id" class="form-control" required>
                  <option value="">-- Pilih Desa --</option>
                  @foreach ($desa as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="clientName">SLS</label>
                <select name="sls_id" id="sls_id" class="form-control" required>
                  <option value="">-- Pilih SLS --</option>
                  @foreach ($sls as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="clientName">Keluarga</label>
                <select name="keluarga_id" id="keluarga_id" class="form-control" required>
                  <option value="">-- Pilih Keluarga --</option>
                  @foreach ($keluarga as $item)
                    <option value="{{$item->id}}">{{$item->kode_kk}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="clientName">PPL</label>
                <select name="ppl_id" id="ppl_id" class="form-control" required>
                  <option value="">-- Pilih PPL --</option>
                  @foreach ($ppl as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="clientName">PML</label>
                <select name="pml_id" id="pml_id" class="form-control" required>
                  <option value="">-- Pilih PML --</option>
                  @foreach ($pml as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="clientName">Status Pendataan</label>
                <select name="status_pendataan_id" id="status_pendataan_id" class="form-control" required>
                  <option value="">-- Pilih Status Pendataan --</option>
                  <option value="1">Terisi Lengkap</option>
                  <option value="2">Terisi Tidak Lengkap</option>
                  <option value="3">Tidak Ada Responden yang dapat memberi jawaban sampai akhir masa pendataan</option>
                  <option value="4">Responden Menolak</option>
                  <option value="5">Keluarga Pindah/bangunan sensus sudah tidak ada</option>
                </select>
              </div>
              <div class="form-group">
                <label for="clientName">Tanggal Pendataan</label>
                <input type="date" name="tanggal_pendataan" id="tanggal_pendataan" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="clientName">Tanggal Pemeriksaaan</label>
                <input type="date" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="clientName">No HP</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="No HP" required>
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
              <label for="clientName">Provinsi</label>
              <select name="provinsi_id" id="provinsi_idEdit" class="form-control" required>
                <option value="">-- Pilih Provinsi --</option>
                @foreach ($provinsi as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="clientName">Kabupaten</label>
              <select name="kabupaten_id" id="kabupaten_idEdit" class="form-control" required>
                <option value="">-- Pilih Kabupaten --</option>
                @foreach ($kabupaten as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="clientName">Kecaamatan</label>
              <select name="kecamatan_id" id="kecamatan_idEdit" class="form-control" required>
                <option value="">-- Pilih Kecamatan --</option>
                @foreach ($kecamatan as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="clientName">Desa</label>
              <select name="desa_id" id="desa_idEdit" class="form-control" required>
                <option value="">-- Pilih Desa --</option>
                @foreach ($desa as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="clientName">SLS</label>
              <select name="sls_id" id="sls_idEdit" class="form-control" required>
                <option value="">-- Pilih SLS --</option>
                @foreach ($sls as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="clientName">Keluarga</label>
              <select name="keluarga_id" id="keluarga_idEdit" class="form-control" required>
                <option value="">-- Pilih Keluarga --</option>
                @foreach ($keluarga as $item)
                  <option value="{{$item->id}}">{{$item->kode_kk}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="clientName">PPL</label>
              <select name="ppl_id" id="ppl_idEdit" class="form-control" required>
                <option value="">-- Pilih PPL --</option>
                @foreach ($ppl as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="clientName">PML</label>
              <select name="pml_id" id="pml_idEdit" class="form-control" required>
                <option value="">-- Pilih PML --</option>
                @foreach ($pml as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="clientName">Status Pendataan</label>
              <select name="status_pendataan" id="status_pendataan_idEdit" class="form-control" required>
                <option value="">-- Pilih Status Pendataan --</option>
                <option value="1">Terisi Lengkap</option>
                <option value="2">Terisi Tidak Lengkap</option>
                <option value="3">Tidak Ada Responden yang dapat memberi jawaban sampai akhir masa pendataan</option>
                <option value="4">Responden Menolak</option>
                <option value="5">Keluarga Pindah/bangunan sensus sudah tidak ada</option>
              </select>
            </div>
            <div class="form-group">
              <label for="clientName">Tanggal Pendataan</label>
              <input type="date" name="tanggal_pendataan" id="tanggal_pendataanEdit" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="clientName">Tanggal Pemeriksaaan</label>
              <input type="date" name="tanggal_pemeriksaan" id="tanggal_pemeriksaanEdit" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="clientName">No HP</label>
              <input type="number" name="no_hp" id="no_hpEdit" class="form-control" placeholder="No HP" required>
            </div>
           
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" id="statusEdit" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Non Aktif</option>
              </select>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-success">Save</button>
          </div>
        </form>
      </div>        
    </div>
  </div>
</div>

<script src="{{ asset('js/kuisioner.js') }}"></script>
@endsection
