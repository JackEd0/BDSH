$(document).ready(function () {

    /* Vérifier si les champs sont complétés */
    function inputCheckFees(inputToCheck, divErrorMessage) {
        $(inputToCheck).blur(function () {
            if ($(inputToCheck).val() == "") {
                $(divErrorMessage).addClass('form-group has-error');
            }
            else {
                $(divErrorMessage).removeClass('form-group has-error');
            }
        });
    }

    inputCheckFees('#tvq', '#divTvq');
    inputCheckFees('#tps', '#divTps');
    inputCheckFees('#admin', '#divAdmin');
    inputCheckFees('#private_use', '#divPrivate');
    inputCheckFees('#public_use', '#divPublic');

    $('#soumettre').click(function () {
        if ($('#tvq').val() == "" || $('#tps').val() == "" || $('#admin').val() == "" || $('#private_use').val() == "" || $('#public_use').val() == "") {
            alert("Veuillez remplir tous les champs");
            return false;
        }
    });
});

