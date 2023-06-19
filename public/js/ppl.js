$('document').ready(function(){
    $('#editPPLModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/ppl/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                $('#kodePPLEdit').val(detail.id);
                $('#pplTitleEdit').val(detail.name);
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/ppl/' + id;


        

    }); 
});