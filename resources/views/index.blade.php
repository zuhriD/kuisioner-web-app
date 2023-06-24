<!DOCTYPE html>
<html>
<head>
	<title>Form Tabel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
    
		.logout-button {
			position: fixed;
			top: 10px;
			right: 10px;
			z-index: 9999;
		}
    .table-bordered {
			border: 1px solid black;
		}

		.table-bordered th,
		.table-bordered td {
			padding-top: 0.1rem;
      padding-bottom: 0.1rem;
      font-size: 12px;
      font-weight: bold;
		}
    .table-bordered tr {
			border-bottom: 1px solid black;
			padding-top: 0.25rem;
      padding-bottom: 0.25rem;
		}
    .form-control {
     padding: 0.25rem 0.5rem;
     font-size: 12px;
    }
    .small, small {
    font-size: 100%;
    font-weight: 400;
}
input.form-control {
  border-radius: 0;
}
/* style btn */
.btn-success {
  background-color: black;
  border-color: black;
}
.btn-success:hover {
  background-color: black;
}

    
	</style>
  {{-- Jquery --}}
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <!-- Tombol Logout -->
	<form id="logout-form" action="{{ route('auths.logout') }}" method="POST" id="myForm">
    @csrf
    <button type="submit" class="btn btn-danger logout-button">Logout</button>
</form>
	<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-center">Typing Test </h4>
      </div>
      <div class="col-md-9">
        <p>Rahasia</p>
      </div>
      <div class="col-md-3">
        <p>Kuisioner Ke- 1 dari <input type="text" class="form-control" value="3" style="width: 50px; display: inline-block;" readonly> </p>
      </div>
    </div>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="bg-warning text-black">
					<tr>
						<th colspan="4" class="text-center"><b>I. KETERANGAN TEMPAT</b></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Provinsi</td>
            <td>
              <form action="{{ route('result.store') }}" method="post">
              @csrf
              <input type="hidden" id="durationInput" name="durationInput">
              <div class="row">
                <div class="col-md-10">
                  <p id="provinsi"></p>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" class="form-control" name="provinsi_id" id="provinsi_id" onkeyup="isi_provinsi()">
                    </div>
                  </div>
              </div>              
            </td>
						<td>Nama Kepala Keluarga</td>
						<td><input type="text" class="form-control" name="kepala_keluarga" ></td>
					</tr>
					<tr>
            <td>Kabupaten</td>
            <td>
              <div class="row">
                <div class="col-md-10">
                  <p id="kabupaten"></p>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" class="form-control" name="kabupaten_id" id="kabupaten_id" onkeyup="isi_kabupaten()">
                    </div>
                  </div>
              </div>              
            </td>
            <td>Nomor Urut Bangunan Tempat Tinggal</td>
            <td><input type="text" class="form-control" name="no_urut_bangunan" ></td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td>
              <div class="row">
                <div class="col-md-10">
                  <p id="kecamatan"></p>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" class="form-control" name="kecamatan_id" id="kecamatan_id" onkeyup="isi_kecamatan()">
                    </div>
                  </div>
              </div>              
            </td>
            <td>Nomor Urut Keluarga Hasil Verifikasi</td>
            <td><input type="text" class="form-control" name="no_urut_keluarga_verifikasi" ></td>
          </tr>
          <tr>
            <td>Desa/Kelurahan</td>
            <td>
              <div class="row">
                <div class="col-md-10">
                  <p id="desa"></p>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" class="form-control" name="desa_id" id="desa_id" onkeyup="isi_desa()">
                    </div>
                  </div>
              </div>              
            </td>
            <td>Status Keluarga</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="status_keluarga">
                <small class="form-text">
                  1. Sangat Miskin<br>
                  2. Miskin<br>
                  3. Tidak Miskin
                </small>
              </div>
            </td>
          </tr>
          <tr>
            <td>Kode SLS/Non SLS</td>
            <td>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" name="kode_sls" id="kode_sls" >
                </div>
                <div class="col-md-4">
                  Kode Sub SLS 
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="kode_sub_sls" id="kode_sub_sls" onkeyup="isi_kode_sls()">
                </div>
              </div>
            </td>
            <td>Jumlah Anggota Keluarga</td>
            <td><input type="text" class="form-control" name="jml_anggota_keluarga" ></td>
          </tr>
          <tr>
            <td>Nama SLS/Non SLS</td>
            <td><input type="text" class="form-control" name="nama_sls" id="nama_sls" readonly></td>
            <td>ID Landmark Wilkerstat</td>
            <td><input type="text" class="form-control" name="landmark"></td>
           
          </tr>
          <tr>
            <td rowspan="2">Alamat</td>
            <td rowspan="2">
              {{-- buat textarea --}}
              <textarea name="" id="" cols="30" rows="5" class="form-control" name="alamat">
              </textarea>
            </td>
            <td>Nomor Kartu Keluarga</td>
            <td> <input type="text" class="form-control" name="no_kk" ></td>
          </tr>
          <tr>
            <td>Kode Kartu Keluarga</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="kode_kk">
                <small class="form-text">
                  0. KK Sesuai<br>
                  1. Keluarga Induk<br>
                  2. Keluarga Pecahan
                </small>
              </div>
            </td>
          </tr>
				</tbody>
			</table>
		</div>

		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="bg-warning text-black">
					<tr>
						<th colspan="4" class="text-center"><b>II. KETERANGAN PETUGAS</b></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Tgl Pendataan: </td>
            <td>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" name="pendataan_tgl" >
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="pendataan_bln" >
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="pendataan_thn" >
                </div>
              </div>
            </td>
						<td rowspan="2">
              <div class="row">
                <div class="col-md-10">
                  Saya menyatakan telah melaksanakan pendataan sesuai dengan prosedur
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" name="prosedur_pendataan">
                </div>
              </div>
            </td>
					</tr>
          <tr>
            <td>Nama PPL:</td>
            <td>
              <div class="form-inline">
                <div class="form-group mr-5">
                  <input type="text" class="form-control" name="ppl_nama" id="ppl_nama" readonly>
                </div>
                <div class="form-group">
                  <label for="" class="mr-2">Kode</label>
                  <input type="text" class="form-control" name="kode_ppl" id="kode_ppl" onkeyup="isi_ppl()">
                </div>
              </div>
            </td>
          </tr>
					<tr>
						<td>Tgl Pemeriksaaan: </td>
            <td>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" name="pemeriksaan_tgl" >
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="pemeriksaan_bln" >
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="pemeriksaan_thn" >
                </div>
              </div>
            </td>
						<td rowspan="2">
              <div class="row">
                <div class="col-md-10">
                  Saya menyatakan telah melaksanakan pemeriksaan sesuai dengan prosedur
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" name="prosedur_pemeriksaan">
                </div>
              </div>
            </td>
					</tr>
					<tr>
            <td>Nama PML:</td>
            <td>
              <div class="form-inline">
                <div class="form-group mr-5">
                  <input type="text" class="form-control"  name="pml_nama" id="pml_nama" readonly>
                </div>
                <div class="form-group">
                  <label for="" class="mr-2">Kode</label>
                  <input type="text" class="form-control" name="kode_pml" id="kode_pml" onkeyup="isi_pml()">
                </div>
              </div>
            </td>
          </tr>
					<tr>
            <td colspan="2" rowspan="4" class="">
              <div class="row">
                <div class="col-md-8">
                  Hasil Pendataan Keluarga
                  <small class="form-text">
                    1. Terisi lengkap<br>
                    2. Terisi tidak lengkap<br>
                    3. Tidak ada responden yang dapat memberi jawaban sampai akhir masa pendataan<br>
                    4. Responden menolak<br>
                    5. Keluarga pindah/bangunan sensus sudah tidak ada
                  </small>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" name="hasil_pendataan">
                 
                </div>
              </div>
            </td>
            <td colspan="2" class="text-center">
              <div class="row">
                <div class="col-md-10">
                  Saya menyatakan bahwa informasi yang diberikan adalah benar, dan boleh dipergunakan untuk keperluan pemerintah
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" name="status_informasi">
                </div>
              </div>
            </td>
					</tr>
					<tr>
						<td colspan="2" class="text-center">
              <div class="row text-center">
                <div class="col-md-8">
                  Nomor Handphone Responden:
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="nomorHandphone" name="no_hp">
                </div>
              </div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
    {{-- button submit in right --}}
    <div class="row mb-2 mt-2">
      <div class="col-md-12">
        <div class="float-right">
          <button class="btn btn-success">Kirim</button>
        </div>
        </form>
      </div>
    </div>
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="{{  asset('js/form.js') }}"></script>
</body>
</html>
