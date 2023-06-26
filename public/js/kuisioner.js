$('document').ready(function(){
    $('#editKuisionerModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/kuisioners/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                document.querySelector('#provinsi_idEdit option[value="' + detail.provinsi_id + '"]').selected = true;
                document.querySelector('#kabupaten_idEdit option[value="' + detail.kabupaten_id + '"]').selected = true;
                document.querySelector('#kecamatan_idEdit option[value="' + detail.kecamatan_id + '"]').selected = true;
                document.querySelector('#desa_idEdit option[value="' + detail.desa_id + '"]').selected = true;
                document.querySelector('#sls_idEdit option[value="' + detail.sls_id + '"]').selected = true;
                document.querySelector('#keluarga_idEdit option[value="' + detail.keluarga_id + '"]').selected = true;
                document.querySelector('#ppl_idEdit option[value="' + detail.ppl_id + '"]').selected = true;
                document.querySelector('#pml_idEdit option[value="' + detail.pml_id + '"]').selected = true;
                document.querySelector('#status_pendataan_idEdit option[value="' + detail.status_pendataan + '"]').selected = true;
                $('#tanggal_pendataanEdit').val(detail.tanggal_pendataan);
                $('#tanggal_pemeriksaanEdit').val(detail.tanggal_pemeriksaan);
                $('#no_hpEdit').val(detail.no_hp);
                document.querySelector('#statusEdit option[value="' + detail.status + '"]').selected = true;
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/kuisioners/' + id;


        

    }); 
});