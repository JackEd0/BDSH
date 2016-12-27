/**
 * Created by matcaron on 2016-04-08.
 */

function fileSelected(fileInput) {
    var fileName = fileInput.files[0].name;
    var objectBaseName = fileName.substring(0, fileName.length - 4);
    var fileCollection = fileName.substr(0, fileName.indexOf('_'));
    var cardCollection = $('#collectionSelect').find(":selected").text().split(" ")[0];
    var cardNumber = getFileCard(fileName);
    if(cardCollection == fileCollection){
        if(cardNumber == $("#cardNumber").val()) {
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + objectBaseName + 'Preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
            $('#cardDocumentDiv').html(jQuery('#cardDocumentDiv').html() + '<div id="' + objectBaseName + 'Div" style="text-align: left; padding: 10px 0px 10px 0px; font-size: 16px;"><img id="' + objectBaseName + 'Preview" src="" alt="your image" height="110" style="padding-right: 10px" >' + fileName + '<a style="float: right; padding-top: 45px; cursor: pointer;"" onclick="removeFile(\'' + objectBaseName + '\')">Retirer</a></div>');
            var obj = JSON.parse($("#inputFileNames").val());
            obj['fileNames'].push({"fileName": fileName});
            $("#inputFileNames").val(JSON.stringify(obj));
        } else {
            alert("Le numéro de fiche de votre fichier ne concorde pas avec celui de la fiche");
        }
    } else {
        alert("La collection de votre fichier ne concorde pas avec celle de la fiche");
    }
}

function removeFile(fileToRemove) {
    var obj = JSON.parse($("#inputFileNames").val())
    for (var i in obj.fileNames) {
        if(obj.fileNames[i].fileName == fileToRemove+".jpg") {
            obj.fileNames.splice(i,1);
        }
    }
    $("#inputFileNames").val(JSON.stringify(obj));

    $("#"+fileToRemove+"Div").remove();
}

function populateForm(cardTypeId) {
    var cardNumber = [];
    $("input[name='cardNumber']").each(function() {
        cardNumber.push($(this).val());
    });
    //Cacher ce champ pour les fiches de type archives et périodiques car elles n'ont pas de documents
    if(cardTypeId ==1 || cardTypeId == 6){
        $("#cardAddDocumentLink").hide();
    }
    else {
        $("#cardAddDocumentLink").show();
    }

    jQuery('#cardAttributesDiv').html("");
    var cardTypeId = $( "#cardTypeSelect" ).val();
    var formContent = "";

    if(cardTypeId == 2 || cardTypeId == 5 || cardTypeId == 7){
        $('#collectionSelect').parent().parent().removeClass('hidden');
    } else {
        $('#collectionSelect').val(0);
        $('#collectionSelect').parent().parent().addClass('hidden');
    }

    $.ajax({
        type: "GET",
        url : "./getCardTypeAttribute/"+cardTypeId.toString(), //./ pour répertoire relatif
        success : function(data){
            var data = JSON.parse(data)
            formContent += '<label for="cardNumber" class="control-label" style="float:left">' + "N° de fiche" + ' </label>' +
                '<input type="text" name="card_number" id="cardNumber" class="form-control" ' +
                'value="' + cardNumber[cardTypeId-1] + '" disabled><br>';
            for (var i in data) {
                formContent += '<label for="' + data[i].id + '" class="control-label" style="float:left">' + data[i].name_fr + ' </label>' +
                '<input type="text" name=' + data[i].id + ' id=' + data[i].id + ' class="form-control" ' +
                'placeholder="' + data[i].name_fr + '"><br>';
            }
            jQuery('#cardAttributesDiv').html(formContent);
        },
        error: function () {
            jQuery('#cardAttributesDiv').html("Une erreur est survenue! Veuillez réessayer, si l'erreur persiste, contactez l'administrateur");
        }
    },"html");
}

function calculateImageProportion(lenght,ratio) {
    return lenght/ratio;
}

function getFileCard(fileName){
    while(fileName.indexOf('_') != -1){
        fileName = fileName.substr(1);
    }
    return fileName.substr(0, fileName.indexOf("."));
}

// Event Handler

$( "#cardTypeSelect" ).change(function() {
    populateForm($( "#cardTypeSelect" ).val());
});
$( document ).ready(function() {
    populateForm($( "#cardTypeSelect" ).val());
});
$( "#cardAddDocumentLink" ).click(function() {
    $( "#choseFile" ).click();
});
$('#choseFile').change(function() {
    fileSelected(this);
});

