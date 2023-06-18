$('document').ready(function(){
    $('#editProvinsiModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/provinsis/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                $('#kodeProvinsiEdit').val(detail.id);
                $('#provinsiTitleEdit').val(detail.name);
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/provinsis/' + id;


        

    }); 
});