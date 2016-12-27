$(document).ready(function () {

    $('#email').blur(function () {
        var $email = $('#email');
        var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
        if ($email.val() == '' || !re.test($email.val())) {
            $('#divEmail').addClass('form-group has-error');
        }
        else {
            $('#divEmail').removeClass('form-group has-error');
        }
    });

    $('#soumettre').click(function () {
        var $email = $('#email');
        var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
        if (!re.test($email.val()) || $('#email').val() == "") {
            alert('Veuillez entrer une adresse valide');
            return false;
        }
    });
});


