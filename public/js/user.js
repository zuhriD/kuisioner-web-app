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


document.addEventListener('DOMContentLoaded', function() {
    const passwordField = document.getElementById('password');
    const toggleButton = document.querySelector('.password-toggle');

    toggleButton.addEventListener('click', function() {
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleButton.innerHTML = '<i class="fa fa-eye"></i>';
      } else {
        passwordField.type = 'password';
        toggleButton.innerHTML = '<i class="fa fa-eye-slash"></i>';
      }
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    const passwordField = document.getElementById('passwordEdit');
    const toggleButton = document.querySelector('.edit');

    toggleButton.addEventListener('click', function() {
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleButton.innerHTML = '<i class="fa fa-eye"></i>';
      } else {
        passwordField.type = 'password';
        toggleButton.innerHTML = '<i class="fa fa-eye-slash"></i>';
      }
    });
  });