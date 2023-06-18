$('document').ready(function(){
    $('#editKabupatenModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/kabupatens/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                document.querySelector('#provinsiEdit option[value="' + detail.provinsi_id + '"]').selected = true;
                $('#kodeKabupatenEdit').val(detail.id);
                $('#kabupatenTitleEdit').val(detail.name);
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/kabupatens/' + id;


        

    }); 
});