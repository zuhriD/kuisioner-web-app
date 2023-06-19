$('document').ready(function(){
    $('#editSLSModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/sls/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                document.querySelector('#desaEdit option[value="' + detail.desa_id + '"]').selected = true;
                $('#kodeSLSEdit').val(detail.id);
                $('#kodeSubEdit').val(detail.sub_sls);
                $('#slsTitleEdit').val(detail.name);
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/sls/' + id;


        

    }); 
});