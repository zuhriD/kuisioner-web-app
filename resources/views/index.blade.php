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
			border: 1px solid black;
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
	border: 1px solid black;
  border-radius: 0;
}

    
	</style>
</head>
<body>
	<div class="container">
    {{-- make title here --}}
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-center">Typing Test </h4>
      </div>
      <div class="col-md-9">
        <p>Rahasia</p>
      </div>
      <div class="col-md-3">
        <p>Kuisioner Ke- 1 dari <input type="text" class="form-control" value="3" style="width: 50px; display: inline-block;"> </p>
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
              <div class="form-inline">
                <div class="form-group mr-2">
                  <input type="text" class="form-control" value="Jawa Timur" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" value="35" >
                </div>
              </div>
            </td>
						<td>Nama Kepala Keluarga</td>
						<td><input type="text" class="form-control" value="(Slamet Efendi)"></td>
					</tr>
					<tr>
            <td>Kabupaten</td>
            <td>
              <div class="form-inline">
                <div class="form-group mr-2">
                  <input type="text" class="form-control" value="Banyuwangi" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" value="10" >
                </div>
              </div>
            </td>
            <td>Nomor Urut Bangunan Tempat Tinggal</td>
            <td><input type="text" class="form-control" value="(12)" ></td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td>
              <div class="form-inline">
                <div class="form-group mr-2">
                  <input type="text" class="form-control" value="Banyuwangi" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" value="180" >
                </div>
              </div>
            </td>
            <td>Nomor Urut Keluarga Hasil Verifikasi</td>
            <td><input type="text" class="form-control" value="(14)" ></td>
          </tr>
          <tr>
            <td>Desa/Kelurahan</td>
            <td>
              <div class="form-inline">
                <div class="form-group mr-2">
                  <input type="text" class="form-control" value="Tamanbaru" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" value="018" >
                </div>
              </div>
            </td>
            <td>Status Keluarga</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" value="3">
                <small class="form-text">
                  (1) Sangat Miskin<br>
                  (2) Miskin<br>
                  (3) Tidak Miskin
                </small>
              </div>
            </td>
          </tr>
          <tr>
            <td>Kode SLS/Non SLS</td>
            <td>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" value="(0002)">
                </div>
                <div class="col-md-4">
                  Kode Sub SLS 
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" value="(02)">
                </div>
              </div>
            </td>
            <td>Jumlah Anggota Keluarga</td>
            <td><input type="text" class="form-control" value="(5)" ></td>
          </tr>
          <tr>
            <td>Nama SLS/Non SLS</td>
            <td><input type="text" class="form-control" value="" ></td>
            <td>ID Landmark Wilkerstat</td>
            <td><input type="text" class="form-control" value="(67B4PT)" ></td>
           
          </tr>
          <tr>
            <td rowspan="2">Alamat</td>
            <td rowspan="2">
              {{-- buat textarea --}}
              <textarea name="" id="" cols="30" rows="5" class="form-control" style="border: 1px solid black">Jl. Raya Tamanbaru</textarea>
            </td>
            <td>Nomor Kartu Keluarga</td>
            <td> <input type="text" class="form-control" value="(3510161708000001)"></td>
          </tr>
          <tr>
            <td>Kode Kartu Keluarga</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" value="(1)">
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
                  <input type="text" class="form-control" placeholder="Tanggal">
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Bulan">
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Tahun">
                </div>
              </div>
            </td>
						<td rowspan="2">
              <div class="row">
                <div class="col-md-10">
                  Saya menyatakan telah melaksanakan pendataan sesuai dengan prosedur
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" placeholder="1">
                </div>
              </div>
            </td>
					</tr>
          <tr>
            <td>Nama PPL:</td>
            <td>
              <div class="form-inline">
                <div class="form-group mr-2">
                  <input type="text" class="form-control" value="Maulana Huda" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" value="0230" >
                </div>
              </div>
            </td>
          </tr>
					<tr>
						<td>Tgl Pemeriksaaan: </td>
            <td>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Tanggal">
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Bulan">
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Tahun">
                </div>
              </div>
            </td>
						<td rowspan="2">
              <div class="row">
                <div class="col-md-10">
                  Saya menyatakan telah melaksanakan pemeriksaan sesuai dengan prosedur
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" placeholder="1">
                </div>
              </div>
            </td>
					</tr>
					<tr>
            <td>Nama PML:</td>
            <td>
              <div class="form-inline">
                <div class="form-group">
                  <input type="text" class="form-control" value="Maulana Huda" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" value="0230" >
                </div>
              </div>
            </td>
          </tr>
					<tr>
            <td colspan="4" class="">
              <div class="row">
                <div class="col-md-6">
                  Hasil Pendataan Keluarga
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" placeholder="1">
                </div>
              </div>
            </td>
					</tr>
					<tr>
						<td colspan="4" class="text-center">
              <div class="row">
                <div class="col-md-6">
                  Saya menyatakan bahwa informasi yang diberikan adalah benar, dan boleh dipergunakan untuk keperluan pemerintah
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" placeholder="1">
                </div>
              </div>
            </td>
					</tr>
					<tr>
						<td colspan="4" class="text-center">
              <div class="row text-center">
                <div class="col-md-6">
                  Nomor Handphone Responden:
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="nomorHandphone" placeholder="Nomor Handphone">
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
          <button class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
