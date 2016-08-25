$(document).ready(function(){
    $('#userTable').DataTable({
        ordering: true,
        searching: true,
        columnDefs: [
            { orderable: false, "targets": 5 },
            { searchable: false, "targets": 5}
        ],
        language: {
            processing:     "Traitement en cours...",
            search:         "Rechercher&nbsp;:",
            lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
            info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix:    "",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable:     "Aucune donnée disponible dans le tableau",
            paginate: {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
    $('#cardSearchTable').DataTable({
        ordering: true,
        searching: true,
        columnDefs: [
            { orderable: false, "targets": [1, 3] },
            { searchable: false, "targets": 2}
        ],
        language: {
            processing:     "Traitement en cours...",
            search:         "Rechercher&nbsp;:",
            lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
            info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix:    "",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable:     "Aucune donnée disponible dans le tableau",
            paginate: {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
});

$(document).ready(function(){
    showInactive();
});
function showInactive () {
    var checked = document.getElementById("inputShowInactiveUsers").checked;
    var Sstring = "Activer";
    if (checked) {
        $("tr:contains('" + Sstring + "')").fadeIn();
    }
    else {
        $("tr:contains('" + Sstring + "')").fadeOut();
    }
}

function showCategory (value) {
    switch (value) {
        case 1:
            var checked = document.getElementById("inputShowArchives").checked;
            var Sstring = "Archives";
            break;
        case 2:
            var checked = document.getElementById("inputShowAudiovisuels").checked;
            var Sstring = "Audiovisuels";
            break;
        default:
            var checked = document.getElementById("inputShowAll").checked;
            var Sstring = "";
            break;
    }
    if (checked) {
        $("tr:contains('')").fadeOut();
        $("tr:contains('" + Sstring + "')").fadeIn();
    }
    else {
        $("tr:contains('" + Sstring + "')").fadeOut();
    }
}