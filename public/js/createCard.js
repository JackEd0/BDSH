/**
 * Created by matcaron on 2016-04-08.
 */

function fileSelected(fileInput) {
    var fileName = fileInput.files[0].name;
    var objectBaseName = fileName.substring(0, fileName.length - 4);;

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+objectBaseName+'Preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(fileInput.files[0]);
    }
    $('#cardDocumentDiv').html(jQuery('#cardDocumentDiv').html()+'<div id="'+objectBaseName+'Div" style="text-align: left; padding: 10px 0px 10px 0px; font-size: 16px;"><img id="'+objectBaseName+'Preview" src="" alt="your image" height="110" style="padding-right: 10px" >'+fileName+'<a style="float: right; padding-top: 45px; cursor: pointer;"" onclick="removeFile(\''+objectBaseName+'\')">Retirer</a></div>');
    var obj = JSON.parse( $("#inputFileNames").val());
    obj['fileNames'].push({"fileName":fileName});
    $("#inputFileNames").val(JSON.stringify(obj));
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
    jQuery('#cardAttributesDiv').html("");
    var cardTypeId = $( "#cardTypeSelect" ).val();
    var formContent = "";

    $.ajax({
        type: "GET",
        url : "/getCardTypeAttribute/"+cardTypeId.toString(),
        success : function(data){
            var data = JSON.parse(data)
            for (var i in data) {
                formContent += '<label for="' + data[i].id + '" class="control-label" style="float:left">' + data[i].name_fr + ' </label>' +
                    '<input type="text" name=' + data[i].id + ' id=' + data[i].id + ' class="form-control" ' +
                    'placeholder="' + data[i].name_fr + '"><br>'
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

