$('document').ready(function(){
    $('#editKeluargaModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/keluargas/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;
               $('#nama_kepala_keluargaEdit').val(detail.nama_kepala_keluarga);
                $('#no_urut_bangunanEdit').val(detail.no_urut_bangunan);
                $('#no_verifikasiEdit').val(detail.no_urut_keluarga_verifikasi);
                document.querySelector('#statusEdit option[value="' + detail.status + '"]').selected = true;
                $('#jml_anggota_keluargaEdit').val(detail.jml_anggota_keluarga);
                $('#id_landmarkEdit').val(detail.landmark);
                $('#no_kkEdit').val(detail.no_kk);
                $('#kode_kkEdit').val(detail.kode_kk);
                $('#alamatEdit').val(detail.alamat);
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/keluargas/' + id;


        

    }); 
});