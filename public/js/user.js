$('document').ready(function(){
    $('#editUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/users/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                $('#kodeUserEdit').val(detail.id);
                $('#userTitleEdit').val(detail.name);
                $('#usernameEdit').val(detail.username);
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/users/' + id;


        

    }); 
});