@extends('layouts.base')
<!DOCTYPE html>
<html>
<head>
	<title>Form Tabel</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		table, th, td {
			border: 1px solid black;
			padding: 8px;
		}
	</style>
</head>
<body>
	<table>
    <tr>
      <th colspan="4"><b>I. KETERANGAN TEMPAT</b></th>
    </tr>
    <tr>
      <td>Provinsi</td>
      <td>Jawa Timur (35)</td>
      <td>Nama Kepala Keluarga</td>
      <td>(Slamet Efendi)</td>
    </tr>
    <tr>
      <td>Kabupaten</td>
      <td>Banyuwangi (10)</td>
      <td>Nomor Urut Bangunan Tempat Tinggal</td>
      <td>(12)</td>
    </tr>
    <tr>
      <td>Kecamatan</td>
      <td>Banyuwangi (180)</td>
      <td>Nomor Urut Keluarga Hasil Verifikasi</td>
      <td>(14)</td>
    </tr>
    <tr>
      <td>Desa/Kelurahan</td>
      <td>Tamanbaru (018)</td>
      <td>Status Keluarga</td>
      <td>(3) - dikasih keterangan kolom (1) sangat miskin; (2) miskin; (3) tdk miskin</td>
    </tr>
    <tr>
      <td>Kode SLS/Non SLS</td>
      <td>(0002)</td>
      <td>Jumlah Anggota Keluarga</td>
        <td>(5)</td>
    </tr>
    <tr>
      <td>Kode Sub SLS</td>
      <td>(02)</td>
      <td>ID Landmark Wilkerstat</td>
      <td>(67B4PT)</td>
    </tr>
    <tr>
      <td>Nama SLS/Non SLS</td>
      <td>langsung muncul nama sls setelah milih kode sls dan kode sub sls -&gt; RT 002 RW 002</td>
      <td>Nomor Kartu Keluarga</td>
      <td>(3510161708000001)</td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>(Jalan Singosari No. 19, Tamanbaru)</td>
      <td>Kode Kartu Keluarga</td>
      <td>(1)</td>
    </tr>
  </table>
  
	<table style="margin-top: 10px">
    <tr>
      <th colspan="4"><b>II. KETERANGAN PETUGAS</b></th>
    </tr>
		<tr>
			<td>Tanggal Pendataan: (14) (05) (2022)</td>
			<td rowspan="2">Saya menyatakan telah melaksanakan pendataan sesuai dengan prosedur (1)</td>
		</tr>
		<tr>
      <td>Nama PPL: Yusuf Arifandi (02301)</td>
		</tr>
		<tr>
      <td>Tanggal Pemeriksaan: (17) (05) (2022)</td>
      <td rowspan="2">Saya menyatakan telah melaksanakan pemeriksaan sesuai dengan prosedur (1)</td>
		</tr>
		<tr>
			<td>Nama PML: Maulana Huda (0230)</td>
		</tr>
		<tr>
			<th colspan="4">Hasil Pendataan Keluarga (1)</th>
		</tr>
		<tr>
			<th colspan="4">Saya menyatakan bahwa informasi yang diberikan adalah benar, dan boleh dipergunakan untuk keperluan pemerintah (1)</th>
		</tr>
    <tr>
      <th colspan="4">
        Nomor Handphone Responden: (081218735550)
      </th>
    </tr>
	</table>

</body>
</html>
