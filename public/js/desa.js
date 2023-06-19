$('document').ready(function(){
    $('#editDesaModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/desas/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                document.querySelector('#kecamatanEdit option[value="' + detail.kecamatan_id + '"]').selected = true;
                $('#kodeDesaEdit').val(detail.id);
                $('#desaTitleEdit').val(detail.name);
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/desas/' + id;


        

    }); 
});