$(document).ready(function () {

    /* Vérifier le contenu des champs communs à pro et perso*/
    function isInputEmpty(inputToCheck, divErrorMessage) {
        $(inputToCheck).blur(function () {
            if ($(inputToCheck).val() == "") {
                $(divErrorMessage).addClass('form-group has-error');
            }
            else {
                $(divErrorMessage).removeClass('form-group has-error');
            }
        });
    }

    /* Vérification des champs perso et pro */
    function isNameInputsEmpty(inputToCheck, divErrorMessage, ownerType) {
        $('#owner').change(function () {
            if ($('#owner').val() == ownerType) {
                $(inputToCheck).blur(function () {
                    if ($(inputToCheck).val() == "") {
                        $(divErrorMessage).addClass('form-group has-error');
                    }
                    else {
                        $(divErrorMessage).removeClass('form-group has-error');
                    }
                });
            }
        });
    }

    $('select[name="use"]').change(function () {
        var id = "choice_" + $(this).val();
        $('div.choices').hide();
        $('#' + id).show();
    });

    /* Afficher/Masquer les inputs selon le select */
    $('#owner').change(function () {
        if ($('#owner').val() == "nothing") {
            $('#enterprise').addClass("hidden");
            $('#lastname').addClass("hidden");
            $('#firstname').addClass("hidden");
            $('#divMail').addClass("hidden");
            $('#divAddress').addClass("hidden");
            $('#divCity').addClass("hidden");
            $('#divPostalCode').addClass("hidden");
            $('#divProvince').addClass("hidden");
            $('#divCountry').addClass("hidden");
            $('#divPhone').addClass("hidden");
        }
        else if (($('#owner').val() == "perso")) {
            $('#fieldsOwner').removeClass("hidden");
            $('#enterprise').addClass("hidden");
            $('#lastname').removeClass("hidden");
            $('#firstname').removeClass("hidden");
            $('#divMail').removeClass("hidden");
            $('#divAddress').removeClass("hidden");
            $('#divCity').removeClass("hidden");
            $('#divPostalCode').removeClass("hidden");
            $('#divProvince').removeClass("hidden");
            $('#divCountry').removeClass("hidden");
            $('#divPhone').removeClass("hidden");
        }
        else if (($('#owner').val() == "pro")) {
            $('#fieldsOwner').removeClass("hidden");
            $('#lastname').addClass("hidden");
            $('#firstname').addClass("hidden");
            $('#enterprise').removeClass("hidden");
            $('#divMail').removeClass("hidden");
            $('#divAddress').removeClass("hidden");
            $('#divCity').removeClass("hidden");
            $('#divPostalCode').removeClass("hidden");
            $('#divProvince').removeClass("hidden");
            $('#divCountry').removeClass("hidden");
            $('#divPhone').removeClass("hidden");
        }
    });

    /*  Afficher/masquer et modifie la value button submit "valider" selon l'acceptation de la licence  */
    $('#soumettre').attr('disabled', 'disabled');

    $('#validation').click(function () {
        if ($(this).prop("checked") == true) {
            $('#soumettre').removeAttr('disabled');
            var validation_ok = 'Soumettre';
            $('#soumettre').val(validation_ok);
        }
        else if ($(this).prop("checked") == false) {
            $('#soumettre').attr('disabled', 'disabled');
            var validation_refuse = 'Veuillez accepter la licence d\'utilisation';
            $('#soumettre').val(validation_refuse);
        }
    });

    /* Afficher/Masquer les champs avec checkbox "another" */
    $('#fields').addClass("hidden");

    $('#another').click(function () {
        if ($(this).prop("checked") == true) {
            $('#fields').removeClass('hidden');
        }

        else if ($(this).prop("checked") == false) {
            $('#fields').addClass('hidden');
        }
    });

    isInputEmpty('#address', '#divAddress');
    isInputEmpty('#city', '#divCity');
    isInputEmpty('#postalCode', '#divPostalCode');
    isInputEmpty('#province', '#divProvince');
    isInputEmpty('#country', '#divCountry');
    isInputEmpty('#phone', '#divPhone');

    /* Vérification input email */
    $('#mail').blur(function () {
        var $email = $('#mail');
        var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
        if ($email.val() == '' || !re.test($email.val())) {
            $('#divMail').addClass('form-group has-error');
        }
        else {
            $('#divMail').removeClass('form-group has-error');
        }
    });

    isNameInputsEmpty("#lName", "#lastname", "perso");
    isNameInputsEmpty('#fName', '#firstname', "perso");
    isNameInputsEmpty('#company', '#enterprise', "pro");

    /* Bloquer l'envoi du formulaire si les champs ne sont pas remplis */
    $('#soumettre').click(function () {
        var $email = $('#email');
        var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
        if ($('#owner').val() == "perso") {
            if ($('#lName').val() == "" || $('#fName').val() == "" || $('#mail').val() == "" || $('#address').val() == "" || $('#city').val() == "" || $('#postalCode').val() == "" || $('#province').val() == "" || $('#country').val() == "" || $('#phone').val() == "") {
                alert("Veuillez compléter tous les champs");
                return false;
            }
        }
        else if ($('#owner').val() == "pro") {
            if ($('#mail').val() == "" || $('#company').val() == "" || $('#address').val() == "" || $('#city').val() == "" || $('#postalCode').val() == "" || $('#province').val() == "" || $('#country').val() == "" || $('#phone').val() == "") {
                alert("Veuillez compléter tous les champs");
                return false;
            }
        }
        else if ($('#owner').val() == "nothing") {
            return true;
        }
    });
});

