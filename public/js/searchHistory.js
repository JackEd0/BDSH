$(document).ready(function(){
    $('#searchHistory').DataTable({
        ordering: true,
        searching: true,
        iDisplayLength: 25,
        columnDefs: [
            { orderable: false, "targets": 3 },
            { searchable: false, "targets": [2,3]}
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

    $.fn.datepicker.dates['fr'] = {
        days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
        daysMin: ["D", "L", "Ma", "Me", "J", "V", "Sa"],
        months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aoùt", "Septembre", "Octobre", "Novembre", "Decembre"],
        monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoù", "Sep", "Oct", "Nov", "Dec"],
        today: "Aujourd'hui",
        clear: "Clear",
        format: "mm/dd/yyyy",
        titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
        weekStart: 1
    };

    $('#startDate, #endDate').datepicker({
        format: 'yyyy-mm-dd',
        language: 'fr'
    });
});

function sendForm (selector) {
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;
    if(selector == "delete"){
        if(!confirm('Vous êtes sûr de vouloir continuer ?')) return false;
        var url = "/searchDeleteHistory/" + startDate + "/" + endDate;
    }
    else if (selector == "view"){
        var url = "/searchViewHistory/" + startDate + "/" + endDate;
    }
    window.open(url, '_self');
}

