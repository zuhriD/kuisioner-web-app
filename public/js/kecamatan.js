$('document').ready(function(){
    $('#editKecamatanModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/kecamatans/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                document.querySelector('#kabupatenEdit option[value="' + detail.kabupaten_id + '"]').selected = true;
                $('#kodeKecamatanEdit').val(detail.id);
                $('#kecamatanTitleEdit').val(detail.name);
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/kecamatans/' + id;


        

    }); 
});