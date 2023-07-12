<!DOCTYPE html>
<html>
<head>
	<title>Form Tabel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>

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
 <script src="{{ asset('js/code.jquery.com_jquery-3.6.0.min.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
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
              <form action="{{ route('result.store') }}" method="post" id="myform">
              @csrf
              <input type="hidden" id="durationInput" name="durationInput">
              <div class="row mt-1">
                <div class="col-md-10">
                  <p id="provinsi"></p>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <input type="number" class="form-control" name="provinsi_id" id="provinsi_id" onkeyup="isi_provinsi()" tabindex="1"  autocomplete="off">
                    </div>
                  </div>
              </div>              
            </td>
						<td>Nama Kepala Keluarga</td>
						<td><input type="text" class="form-control mt-1" name="kepala_keluarga" maxlength="25" tabindex="8"  autocomplete="off"></td>
					</tr>
					<tr>
            <td>Kabupaten</td>
            <td>
              <div class="row mt-1">
                <div class="col-md-10">
                  <p id="kabupaten"></p>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <input type="number" class="form-control" name="kabupaten_id" id="kabupaten_id" onkeyup="isi_kabupaten()" tabindex="2"  autocomplete="off">
                    </div>
                  </div>
              </div>              
            </td>
            <td>Nomor Urut Bangunan Tempat Tinggal</td>
            <td><input type="text" class="form-control mt-1" name="no_urut_bangunan" tabindex="9"   autocomplete="off"></td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td>
              <div class="row mt-1">
                <div class="col-md-10">
                  <p id="kecamatan"></p>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <input type="number" class="form-control" name="kecamatan_id" id="kecamatan_id" onkeyup="isi_kecamatan()" tabindex="3"  autocomplete="off">
                    </div>
                  </div>
              </div>              
            </td>
            <td>Nomor Urut Keluarga Hasil Verifikasi</td>
            <td><input type="number" class="form-control mt-1" name="no_urut_keluarga_verifikasi" tabindex="10"  autocomplete="off"></td>
          </tr>
          <tr>
            <td>Desa/Kelurahan</td>
            <td>
              <div class="row mt-1">
                <div class="col-md-10">
                  <p id="desa"></p>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <input type="number" class="form-control mt-1" name="desa_id" id="desa_id" onkeyup="isi_desa()" tabindex="4"  autocomplete="off">
                    </div>
                  </div>
              </div>              
            </td>
            <td>Status Keluarga</td>
            <td>
              <div class="form-group mt-1">
                <input type="number" class="form-control" name="status_keluarga" tabindex="11"  autocomplete="off">
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
              <div class="row mt-1">
                <div class="col-md-4">
                  <input type="number" class="form-control" name="kode_sls" id="kode_sls" tabindex="5"  autocomplete="off">
                </div>
                <div class="col-md-4">
                  Kode Sub SLS 
                </div>
                <div class="col-md-4">
                  <input type="number" class="form-control" name="kode_sub_sls" id="kode_sub_sls" onkeyup="isi_kode_sls()" tabindex="6"  autocomplete="off">
                </div>
              </div>
            </td>
            <td>Jumlah Anggota Keluarga</td>
            <td><input type="number" class="form-control mt-1" name="jml_anggota_keluarga" tabindex="12"  autocomplete="off"></td>
          </tr>
          <tr>
            <td>Nama SLS/Non SLS</td>
            <td><input type="text" class="form-control mt-1" name="nama_sls" id="nama_sls" readonly  autocomplete="off"></td>
            <td>ID Landmark Wilkerstat</td>
            <td><input type="text" class="form-control mt-1" name="landmark" tabindex="13"  autocomplete="off"></td>
           
          </tr>
          <tr>
            <td rowspan="2">Alamat</td>
            <td rowspan="2">
              {{-- buat textarea --}}
              <textarea name="" id="" cols="30" rows="5" class="form-control mt-1" name="alamat" tabindex="7"  autocomplete="off">
              </textarea>
            </td>
            <td>Nomor Kartu Keluarga</td>
            <td> <input type="number" class="form-control mt-1" name="no_kk" tabindex="14"   autocomplete="off"></td>
          </tr>
          <tr>
            <td>Kode Kartu Keluarga</td>
            <td>
              <div class="form-group mt-1">
                <input type="number" class="form-control" name="kode_kk" tabindex="15"  autocomplete="off">
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
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                  <label for="">Tanggal</label>
                  <input type="number" class="form-control" name="pendataan_tgl" tabindex="16"  autocomplete="off">
                </div>
                <div class="col-md-3">
                  <label for="">Bulan</label>
                  <input type="number" class="form-control" name="pendataan_bln" tabindex="17"  autocomplete="off">
                </div>
                <div class="col-md-3">
                  <label for="">Tahun</label>
                  <input type="number" class="form-control" name="pendataan_thn" tabindex="18"   autocomplete="off">
                </div>
              </div>
            </td>
						<td rowspan="2">
              <div class="row">
                <div class="col-md-10">
                  Saya menyatakan telah melaksanakan pendataan sesuai dengan prosedur
                </div>
                <div class="col-md-2">
                  <input type="number" class="form-control" name="prosedur_pendataan" tabindex="25"  autocomplete="off">
                </div>
              </div>
            </td>
					</tr>
          <tr>
            <td>Nama PPL:</td>
            <td>
              <div class="row mt-1">
                <div class="col-md-8">
                  <div class="form-group mr-5">
                    <input type="text" class="form-control" name="ppl_nama" id="ppl_nama" readonly   autocomplete="off">
                  </div>
                </div>
                <div class="col-md-1">
                  <label for="" class="mr-2">Kode</label>
                </div>
                <div class="col-md-3">
                 <div class="form-group">
                  <input type="number" class="form-control" name="kode_ppl" id="kode_ppl" onkeyup="isi_ppl()" tabindex="19"  autocomplete="off">
                 </div>
                </div>
              </div>
            </td>
          </tr>
					<tr>
						<td>Tgl Pemeriksaaan: </td>
            <td>
              <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                  <label for="">Tanggal</label>
                  <input type="number" class="form-control" name="pemeriksaan_tgl" tabindex="20"  autocomplete="off">
                </div>
                <div class="col-md-3">
                  <label for="">Bulan</label>
                  <input type="number" class="form-control" name="pemeriksaan_bln" tabindex="21"  autocomplete="off">
                </div>
                <div class="col-md-3">
                  <label for="">Tahun</label>
                  <input type="number" class="form-control" name="pemeriksaan_thn" tabindex="22"  autocomplete="off">
                </div>
              </div>
            </td>
						<td rowspan="2">
              <div class="row">
                <div class="col-md-10">
                  Saya menyatakan telah melaksanakan pemeriksaan sesuai dengan prosedur
                </div>
                <div class="col-md-2">
                  <input type="number" class="form-control" name="prosedur_pemeriksaan" tabindex="26"  autocomplete="off">
                </div>
              </div>
            </td>
					</tr>
					<tr>
            <td>Nama PML:</td>
            <td>
              <div class="row mt-1">
                <div class="col-md-8">
                  <div class="form-group mr-5">
                    <input type="text" class="form-control" name="pml_nama" id="pml_nama" readonly  autocomplete="off">
                  </div>
                </div>
                <div class="col-md-1">
                  <label for="" class="mr-2">Kode</label>
                </div>
                <div class="col-md-3">
                 <div class="form-group">
                  <input type="number" class="form-control" name="kode_pml" id="kode_pml" onkeyup="isi_pml()" tabindex="23"  autocomplete="off">
                 </div>
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
                  <input type="number" class="form-control" name="hasil_pendataan" tabindex="24"  autocomplete="off">
                 
                </div>
              </div>
            </td>
            <td colspan="2" class="text-center">
              <div class="row">
                <div class="col-md-10">
                  Saya menyatakan bahwa informasi yang diberikan adalah benar, dan boleh dipergunakan untuk keperluan pemerintah
                </div>
                <div class="col-md-2">
                  <input type="number" class="form-control" name="status_informasi" tabindex="27"  autocomplete="off">
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
                  <input type="number" class="form-control" id="nomorHandphone" name="no_hp" tabindex="28"  autocomplete="off">
                </div>
              </div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
    {{-- button submit in right --}}
  </form>
    <div class="row mb-2 mt-2">
      <div class="col-md-12">
        <div class="float-right">
          <button class="btn btn-success" onclick="kirimForm()" tabindex="29">Kirim</button>
        </div>
      </div>
    </div>
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="{{  asset('js/form.js') }}"></script>
</body>
</html>
