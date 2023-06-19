$('document').ready(function(){
    $('#editPMLModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/pml/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                $('#kodePMLEdit').val(detail.id);
                $('#pmlTitleEdit').val(detail.name);
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/pml/' + id;


        

    }); 
});