/**
 * Made par Jacques Edouard
 */

$(document).ready(function () {
    populateForm("cardTypeSelect");
});

/**
 * Vérifie si l'entré soumise est déja existante
 **/
function checkIfExist() {
    var nameFr = document.getElementById("inputNameFr").value;
    var nameEn = document.getElementById("inputNameEn").value;

    var bodyText = document.body.innerHTML.toString();
    if (nameFr != null && nameFr != "" && bodyText.indexOf(nameFr) != -1) {
        alert("L'attribut est déja présent dans la catégorie1");
    }
    else if (nameEn != null && nameEn != "" && bodyText.indexOf(nameEn) != -1) {
        alert("L'attribut est déja présent dans la catégorie");
    }
}

function populateForm(cardTypeId) {
    cardTypeId = document.getElementById(cardTypeId).value;

    var userTypeList = [];
    $("input[name='userTypeList']").each(function () {
        userTypeList.push($(this).val());
    });

    jQuery('#cardAttributesDiv').html("");
    var formContent = "";
    var confirmation = "if(!confirm('Attention, toutes les données de ce champ seront supprimées ! " +
        "Vous êtes sûr de vouloir continuer ?')) return false; ";

    $.ajax({
        type: "GET",
        url: "/getCardTypeAttribute/" + cardTypeId.toString(),
        success: function (data) {
            var data = JSON.parse(data);
            for (var i in data) {
                formContent += '<div class="row" id="divN' + i + '">' +
                    '<div class="col-md-3"><input id="nameFr' + data[i].id + '" class="form-control" placeholder="Nom en Français" name="nameFr' + data[i].id +
                    '" value="' + data[i].name_fr + '" type="text"></div>' +
                    '<div class="col-md-3"><input id="nameEn' + data[i].id + '" class="form-control" placeholder="Nom en Anglais" name="nameEn' + data[i].id +
                    '" value="' + data[i].name_en + '" type="text"></div>';
                if (data[i].hide_if_empty == 1) {
                    formContent += '<div class="col-md-1"><input id="hideIfEmpty' + data[i].id + '"  name="hideIfEmpty' +
                        data[i].id + '" value="' + data[i].hide_if_empty + '"checked type="checkbox"></div>';
                }
                else {
                    formContent += '<div class="col-md-1"><input id="hideIfEmpty' + data[i].id + '"  name="hideIfEmpty' +
                        data[i].id + '" value="' + data[i].hide_if_empty + '" type="checkbox"></div>';
                }

                formContent += '<div class="col-md-2"><select id="userPermitLevel' + data[i].id + '"  name="userPermitLevel' + data[i].id + '" class="form-control">';
                for (var j = 1; j <= userTypeList.length; j++) {
                    formContent += '<option value="' + j + '"';
                    if (data[i].user_permit_level == j)
                        formContent += ' selected';
                    formContent += '>' + userTypeList[j - 1] + '</option>';
                }
                formContent += '</select></div>' +
                    '<div class="col-md-3 btn-group"><a onclick="saveAttribute' + '(' + data[i].id + ',' + i + ')" class="btn btn-default" title="Sauvegarder"><span class="glyphicon glyphicon-floppy-disk"></span></a>' +
                    '<a class="btn btn-default" title="Supprimer" name="buttonRemove" ' +
                    'onclick="' + confirmation + '; deleteAttribute' + '(' + data[i].id + ',' + i + ')">' +
                    '<span class="glyphicon glyphicon-remove"></span></a>';
                formContent += '<a';
                if (i == 0) formContent += ' disabled';
                if (i > 0) formContent += ' onclick="orderAttribute' + '(' + data[i].id + ',-1,' + i + ')"';
                formContent += ' class="btn btn-default" title="Faire Monter" id="aUp' + i + '" >';
                formContent += '<span class="glyphicon  glyphicon-chevron-up"></span></a><a ';
                if (i < Object.keys(data).length - 1) formContent += 'onclick="orderAttribute' + '(' + data[i].id + ', 1,' + i + ')"';
                formContent += 'class="btn btn-default" title="Faire Descendre"id="aDown' + i + '" ';
                if (i == Object.keys(data).length - 1) formContent += ' disabled';
                formContent += '><span class="glyphicon  glyphicon-chevron-down"></span></a></div></div>' +
                    '<br id="brN' + i + '"/>';
            }
            jQuery('#cardAttributesDiv').html(formContent);
        },
        error: function () {
            jQuery('#cardAttributesDiv').html("Une erreur est survenue! Veuillez réessayer, si l'erreur persiste, contactez l'administrateur");
        }
    }, "html");
}

/**
 *
 * @param cardAttributeId
 * @param requestType: -1 pour monter, +1 pour descendre
 */
function orderAttribute(cardAttributeId, requestType, divId) {
    var cardTypeId = document.getElementById("cardTypeSelect").selectedIndex + 1;
    $.ajax({
        type: "GET",
        url: "/orderCardAttribute/" + cardAttributeId + "/" + requestType + "/" + cardTypeId,
        success: function () {
            populateForm("cardTypeSelect");
        },
        error: function () {
            jQuery('#cardAttributesDiv').html("Une erreur est survenue! Veuillez réessayer, si l'erreur persiste, contactez l'administrateur");
        }
    }, "html");
}

function saveAttribute(cardAttributeId, id) {
    var nameFr = document.getElementById("nameFr" + cardAttributeId).value;
    var nameEn = document.getElementById("nameEn" + cardAttributeId).value;
    if (document.getElementById("hideIfEmpty" + cardAttributeId).checked) var hideIfEmpty = 1; else var hideIfEmpty = 0;
    var userPermitLevel = document.getElementById("userPermitLevel" + cardAttributeId).selectedIndex + 1;
    var param = cardAttributeId + "/" + nameFr + "/" + nameEn + "/" + hideIfEmpty + "/" + userPermitLevel;
    var divId = "#divN" + id;
    $.ajax({
        type: "GET",
        url: "/editCardAttribute/" + param,
        success: function () {
            $(divId).slideUp(500).slideDown(1000);
        },
        error: function () {
            jQuery('#cardAttributesDiv').html("Une erreur est survenue! Veuillez réessayer, si l'erreur persiste, contactez l'administrateur");
        }
    }, "html");
}

function deleteAttribute(cardAttributeId, divId) {
    var cardTypeId = document.getElementById("cardTypeSelect").selectedIndex + 1;
    var bodyText = document.body.innerHTML.toString();
    $.ajax({
        type: "GET",
        url: "/deleteCardAttribute/" + cardAttributeId + "/" + cardTypeId,
        success: function () {
            var deletedDivId = "#divN" + divId;
            var deletedBrId = "#brN" + divId;
            $(deletedDivId).fadeOut();
            $(deletedBrId).fadeOut();
            var nextDivId = divId + 1;
            var previousDivId = divId - 1;
            $(deletedDivId).remove();
            $(deletedBrId).remove();
            var previousDiv = "aDown" + previousDivId;
            var nextDiv = "aUp" + nextDivId;
            if (bodyText.indexOf(previousDiv) == -1) {
                $("#" + nextDiv).prop('disabled', true).removeAttr("href").prop("onclick", null);
                document.getElementById(nextDiv).setAttribute("disabled", "");
            }
            else if (bodyText.indexOf(nextDiv) == -1) {
                $("#" + previousDiv).prop('disabled', true).removeAttr("href").prop("onclick", null);
                document.getElementById(previousDiv).setAttribute("disabled", "");
            }
        },
        error: function () {
            jQuery('#cardAttributesDiv').html("Une erreur est survenue! Veuillez réessayer, si l'erreur persiste, contactez l'administrateur");
        }
    }, "html");
}