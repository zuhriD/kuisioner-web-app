<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Result::all();
        return view('homes.result.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function showResult()
    {
        $result = Result::where('user_id', Auth::user()->id)->first();
        return view('homes.afterkuisioner', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provinsi_id = $request->input('provinsi_id');
        $kabupaten_id = $request->input('kabupaten_id');
        $kecamatan_id = $request->input('kecamatan_id');
        $desa_id = $request->input('desa_id');
        $kepala_keluarga = $request->input('kepala_keluarga');
        $no_urut_bangunan = $request->input('no_urut_bangunan');
        $no_urut_keluarga_verifikasi = $request->input('no_urut_keluarga_verifikasi');
        $status_keluarga = $request->input('status_keluarga');
        $kode_sls = $request->input('kode_sls');
        $kode_sub_sls = $request->input('kode_sub_sls');
        $jml_anggota_keluarga = $request->input('jml_anggota_keluarga');
        $nama_sls = $request->input('nama_sls');
        $landmark = $request->input('landmark');
        $alamat = $request->input('alamat');
        $no_kk = $request->input('no_kk');
        $kode_kk = $request->input('kode_kk');
        $pendataan_tgl = $request->input('pendataan_tgl');
        $pendataan_bln = $request->input('pendataan_bln');
        $pendataan_thn = $request->input('pendataan_thn');
        $pemeriksaan_tgl = $request->input('pemeriksaan_tgl');
        $pemeriksaan_bln = $request->input('pemeriksaan_bln');
        $pemeriksaan_thn = $request->input('pemeriksaan_thn');
        $prosedur_pendataan = $request->input('prosedur_pendataan');
        $prosedur_pemeriksaan = $request->input('prosedur_pemeriksaan');
        $ppl_nama = $request->input('ppl_nama');
        $pml_nama = $request->input('pml_nama');
        $kode_ppl = $request->input('kode_ppl');
        $kode_pml = $request->input('kode_pml');
        $hasil_pendataan = $request->input('hasil_pendataan');
        $status_informasi = $request->input('status_informasi');
        $no_hp = $request->input('no_hp');
        $durationInput = $request->input('durationInput');

        // Penilaian Waktu
        // Ubah durasi menjadi detik
        $durationInSeconds = strtotime($durationInput) - strtotime('00:00:00');

        if ($durationInSeconds < 45) {
            $speed = "fast";
        } elseif ($durationInSeconds >= 45 && $durationInSeconds <= 60) {
            $speed = "Medium";
        } else {
            $speed = "slow";
        }

        // Membandingkan dengan data kuisioner
        $kuisioner = Kuisioner::with(
            'provinsi',
            'kabupaten',
            'kecamatan',
            'desa',
            'keluarga',
            'sls',
            'keluarga',
            'ppl',
            'pml'
        )->where('status', 'aktif')->first();



        // Penilaian Akurasi
        // Hitung jumlah huruf error atau salah
        $errorCount = 0;
        $errorCount += ($provinsi_id !== null && $provinsi_id !== strval($kuisioner->provinsi->id)) ? strlen($provinsi_id) : ($provinsi_id === null ? strlen($kuisioner->provinsi->id) : 0);
        $errorCount += ($kabupaten_id !== null && $kabupaten_id !== strval($kuisioner->kabupaten->id)) ? strlen($kabupaten_id) : ($kabupaten_id === null ? strlen($kuisioner->kabupaten->id) : 0);
        $errorCount += ($kecamatan_id !== null && $kecamatan_id !== strval($kuisioner->kecamatan->id)) ? strlen($kecamatan_id) : ($kecamatan_id === null ? strlen($kuisioner->kecamatan->id) : 0);
        $errorCount += ($desa_id !== null && $desa_id !== strval($kuisioner->desa->id)) ? strlen($desa_id) : ($desa_id === null ? strlen($kuisioner->desa->id) : 0);
        $errorCount += ($kepala_keluarga !== null && $kepala_keluarga !== strval($kuisioner->keluarga->nama_kepala_keluarga)) ? strlen($kepala_keluarga) : ($kepala_keluarga === null ? strlen($kuisioner->keluarga->nama_kepala_keluarga) : 0);
        $errorCount += ($no_urut_bangunan !== null && $no_urut_bangunan !== strval($kuisioner->keluarga->no_urut_bangunan)) ? strlen($no_urut_bangunan) : ($no_urut_bangunan === null ? strlen($kuisioner->keluarga->no_urut_bangunan) : 0);
        $errorCount += ($no_urut_keluarga_verifikasi !== null && $no_urut_keluarga_verifikasi !== strval($kuisioner->keluarga->no_urut_keluarga_verifikasi)) ? strlen($no_urut_keluarga_verifikasi) : ($no_urut_keluarga_verifikasi === null ? strlen($kuisioner->keluarga->no_urut_keluarga_verifikasi) : 0);
        $errorCount += ($status_keluarga !== null && $status_keluarga !== strval($kuisioner->keluarga->status)) ? strlen($status_keluarga) : ($status_keluarga === null ? strlen($kuisioner->keluarga->status) : 0);
        $errorCount += ($kode_sls !== null && $kode_sls !== strval($kuisioner->sls->id)) ? strlen($kode_sls) : ($kode_sls === null ? strlen($kuisioner->sls->id) : 0);
        $errorCount += ($kode_sub_sls !== null && $kode_sub_sls !== strval($kuisioner->sls->sub_sls)) ? strlen($kode_sub_sls) : ($kode_sub_sls === null ? strlen($kuisioner->sls->sub_sls) : 0);
        $errorCount += ($jml_anggota_keluarga !== null && $jml_anggota_keluarga !== strval($kuisioner->keluarga->jml_anggota_keluarga)) ? strlen($jml_anggota_keluarga) : ($jml_anggota_keluarga === null ? strlen($kuisioner->keluarga->jml_anggota_keluarga) : 0);
        $errorCount += ($nama_sls !== null && $nama_sls !== strval($kuisioner->sls->name)) ? strlen($nama_sls) : ($nama_sls === null ? strlen($kuisioner->sls->name) : 0);
        $errorCount += ($landmark !== null && $landmark !== strval($kuisioner->keluarga->landmark)) ? strlen($landmark) : ($landmark === null ? strlen($kuisioner->keluarga->landmark) : 0);
        $errorCount += ($alamat !== null && $alamat !== $kuisioner->keluarga->alamat) ? strlen($alamat) : ($alamat === null ? strlen($kuisioner->keluarga->alamat) : 0);
        $errorCount += ($no_kk !== null && $no_kk !== strval($kuisioner->keluarga->no_kk)) ? strlen($no_kk) : ($no_kk === null ? strlen($kuisioner->keluarga->no_kk) : 0);
        $errorCount += ($kode_kk !== null && $kode_kk !== strval($kuisioner->keluarga->kode_kk)) ? strlen($kode_kk) : ($kode_kk === null ? strlen($kuisioner->keluarga->kode_kk) : 0);
        $errorCount += ($pendataan_tgl !== null && $pendataan_tgl !== strval(date("d", strtotime($kuisioner->tanggal_pendataan)))) ? strlen($pendataan_tgl) : ($pendataan_tgl === null ? strlen(date("d", strtotime($kuisioner->tanggal_pendataan))) : 0);
        $errorCount += ($pendataan_bln !== null && $pendataan_bln !== strval(date("m", strtotime($kuisioner->tanggal_pendataan)))) ? strlen($pendataan_bln) : ($pendataan_bln === null ? strlen(date("m", strtotime($kuisioner->tanggal_pendataan))) : 0);
        $errorCount += ($pendataan_thn !== null && $pendataan_thn !== strval(date("Y", strtotime($kuisioner->tanggal_pendataan)))) ? strlen($pendataan_thn) : ($pendataan_thn === null ? strlen(date("Y", strtotime($kuisioner->tanggal_pendataan))) : 0);
        $errorCount += ($pemeriksaan_tgl !== null && $pemeriksaan_tgl !== strval(date("d", strtotime($kuisioner->tanggal_pemeriksaan)))) ? strlen($pemeriksaan_tgl) : ($pemeriksaan_tgl === null ? strlen(date("d", strtotime($kuisioner->tanggal_pemeriksaan))) : 0);
        $errorCount += ($pemeriksaan_bln !== null && $pemeriksaan_bln !== strval(date("m", strtotime($kuisioner->tanggal_pemeriksaan)))) ? strlen($pemeriksaan_bln) : ($pemeriksaan_bln === null ? strlen(date("m", strtotime($kuisioner->tanggal_pemeriksaan))) : 0);
        $errorCount += ($pemeriksaan_thn !== null && $pemeriksaan_thn !== strval(date("Y", strtotime($kuisioner->tanggal_pemeriksaan)))) ? strlen($pemeriksaan_thn) : ($pemeriksaan_thn === null ? strlen(date("Y", strtotime($kuisioner->tanggal_pemeriksaan))) : 0);
        $errorCount += ($ppl_nama !== null && $ppl_nama !== strval($kuisioner->ppl->name)) ? strlen($ppl_nama) : ($ppl_nama === null ? strlen($kuisioner->ppl->name) : 0);
        $errorCount += ($pml_nama !== null && $pml_nama !== strval($kuisioner->pml->name)) ? strlen($pml_nama) : ($pml_nama === null ? strlen($kuisioner->pml->name) : 0);
        $errorCount += ($kode_ppl !== null && $kode_ppl !== strval($kuisioner->ppl->id)) ? strlen($kode_ppl) : ($kode_ppl === null ? strlen($kuisioner->ppl->id) : 0);
        $errorCount += ($kode_pml !== null && $kode_pml !== strval($kuisioner->pml->id)) ? strlen($kode_pml) : ($kode_pml === null ? strlen($kuisioner->pml->id) : 0);
        $errorCount += ($no_hp !== null && $no_hp !== strval($kuisioner->no_hp)) ? strlen($no_hp) : ($no_hp === null ? strlen($kuisioner->no_hp) : 0);
        $errorCount += ($prosedur_pendataan !== '1') ? 1 : 0;
        $errorCount += ($prosedur_pemeriksaan !== '1') ? 1 : 0;
        $errorCount += ($hasil_pendataan !== $kuisioner->status_pendataan) ? strlen($kuisioner->status_pendataan) : 0;
        $errorCount += ($status_informasi !== '1') ? 1 : 0;
        




        // Hitung total jumlah huruf
        $totalCount = 0;
        $totalCount += strlen($kuisioner->provinsi->id);
        $totalCount += strlen($kuisioner->kabupaten->id);
        $totalCount += strlen($kuisioner->kecamatan->id);
        $totalCount += strlen($kuisioner->desa->id);
        $totalCount += strlen($kuisioner->keluarga->nama_kepala_keluarga);
        $totalCount += strlen($kuisioner->keluarga->no_urut_bangunan);
        $totalCount += strlen($kuisioner->keluarga->no_urut_keluarga_verifikasi);
        $totalCount += strlen($kuisioner->keluarga->status);
        $totalCount += strlen($kuisioner->sls->id);
        $totalCount += strlen($kuisioner->sls->sub_sls);
        $totalCount += strlen($kuisioner->keluarga->jml_anggota_keluarga);
        $totalCount += strlen($kuisioner->sls->name);
        $totalCount += strlen($kuisioner->keluarga->landmark);
        $totalCount += strlen($kuisioner->keluarga->alamat);
        $totalCount += strlen($kuisioner->keluarga->no_kk);
        $totalCount += strlen($kuisioner->keluarga->kode_kk);
        $totalCount += strlen(date("d", strtotime($kuisioner->tanggal_pendataan)));
        $totalCount += strlen(date("m", strtotime($kuisioner->tanggal_pendataan)));
        $totalCount += strlen(date("Y", strtotime($kuisioner->tanggal_pendataan)));
        $totalCount += strlen(date("d", strtotime($kuisioner->tanggal_pemeriksaan)));
        $totalCount += strlen(date("m", strtotime($kuisioner->tanggal_pemeriksaan)));
        $totalCount += strlen(date("Y", strtotime($kuisioner->tanggal_pemeriksaan)));
        $totalCount += strlen($kuisioner->ppl->name);
        $totalCount += strlen($kuisioner->pml->name);
        $totalCount += strlen($kuisioner->ppl->id);
        $totalCount += strlen($kuisioner->pml->id);
        $totalCount += strlen($kuisioner->status_pendataan);
        $totalCount += 1;
        $totalCount += 1;
        $totalCount += 1;
        $totalCount += strlen($kuisioner->no_hp);

        
       
        // Hitung persentase akurasi
        $accuracy = 100 - ($errorCount * 100) / $totalCount;

        if ($speed != null ) {
            Result::create([
                'user_id' => Auth::user()->id,
                'time' => $speed,
                'duration' => $durationInSeconds,
                'mistakes' => $errorCount,
                'score' => $accuracy,
            ]);

            return redirect()->route('homeUser');
        }

        return redirect()->route('homeUser')->with('error', 'Gagal Save Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kuisioner = Kuisioner::findOrfail($id);
        $kuisioner->delete();
        return redirect()->route('result.index')->with('success', 'Data Berhasil Dihapus');
    }
}
