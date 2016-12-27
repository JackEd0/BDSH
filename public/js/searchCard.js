$(document).ready(function(){
    var bodyText = document.body.innerHTML.toString();
    if (bodyText.indexOf('Création') == -1) {
        $('#cardSearchTable').DataTable({
            ordering: true,
            searching: false,
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "/searchJSON",
                "data": function ( d ) {
                    d.searchType = $('#searchType').val();
                    d.quickSearchBox = $('#quickSearchBox').val();
                    d.searchBox1 = $('#searchBox1').val();
                    d.searchBox2 = $('#searchBox2').val();
                    d.searchBox3 = $('#searchBox3').val();
                    d.searchBox4 = $('#searchBox4').val();

                    d.searchField1 = $('#searchField1').val();
                    d.searchField2 = $('#searchField2').val();
                    d.searchField3 = $('#searchField3').val();
                    d.searchField4 = $('#searchField4').val();

                    d.searchCond2 = $('#searchCond2').val();
                    d.searchCond3 = $('#searchCond3').val();
                    d.searchCond4 = $('#searchCond4').val();
                    if ($('#checkWithPictures').is(":checked")) {
                        d.checkWithPictures = 'checked';
                    }
                    var categoriesArray = new Array();
                    for (var i = 0; i < 15; i++) {
                        if ($('#category'+i).is(":checked")) {
                            categoriesArray[i] = 'checked';
                        }
                        else {
                            categoriesArray[i] = ' ';
                        }
                    }
                    d.categories = categoriesArray;
                }
            },
            columns: [
                {"data": "card_type", "width": "25%"},
                {"data": "value", "width": "55%"},
                {"data": "buttons", "width": "20%"}
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
    } else {
        $('#cardSearchTable').DataTable({
            ordering: true,
            searching: false,
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "/searchJSON",
                "data": function ( d ) {
                    d.searchType = $('#searchType').val();
                    d.quickSearchBox = $('#quickSearchBox').val();
                    d.searchBox1 = $('#searchBox1').val();
                    d.searchBox2 = $('#searchBox2').val();
                    d.searchBox3 = $('#searchBox3').val();
                    d.searchBox4 = $('#searchBox4').val();

                    d.searchField1 = $('#searchField1').val();
                    d.searchField2 = $('#searchField2').val();
                    d.searchField3 = $('#searchField3').val();
                    d.searchField4 = $('#searchField4').val();

                    d.searchCond2 = $('#searchCond2').val();
                    d.searchCond3 = $('#searchCond3').val();
                    d.searchCond4 = $('#searchCond4').val();
                    if ($('#checkWithPictures').is(":checked")) {
                        d.checkWithPictures = 'checked';
                    }
                    var categoriesArray = new Array();
                    for (var i = 0; i < 15; i++) {
                        if ($('#category'+i).is(":checked")) {
                            categoriesArray[i] = 'checked';
                        }
                        else {
                            categoriesArray[i] = ' ';
                        }
                    }
                    d.categories = categoriesArray;
                }
            },
            columns: [
                {"data": "card_type", "width": "20%"},
                {"data": "value", "width": "50%"},
                {"data": "created_at", "width": "15%"},
                {"data": "buttons", "width": "15%"}
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
    }


    $('input.global_filter').on( 'keyup click', function () {

        filterGlobal();

    } );

    $('.search-panel #field1').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#searchField1').text(concept);
        $('.input-group #search_field1').val(param);
        $('.input-group #searchFieldName1').val(concept);
    });

    $('.search-panel #field2').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#searchField2').text(concept);
        $('.input-group #search_field2').val(param);
        $('.input-group #searchFieldName2').val(concept);
    });

    $('.search-panel #condition2').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#searchCond2').text(concept);
        $('.input-group #search_cond2').val(param);
    });

    $('.search-panel #field3').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#searchField3').text(concept);
        $('.input-group #search_field3').val(param);
        $('.input-group #searchFieldName3').val(concept);
    });

    $('.search-panel #condition3').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#searchCond3').text(concept);
        $('.input-group #search_cond3').val(param);
    });

    $('.search-panel #field4').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#searchField4').text(concept);
        $('.input-group #search_field4').val(param);
        $('.input-group #searchFieldName4').val(concept);
    });

    $('.search-panel #condition4').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#searchCond4').text(concept);
        $('.input-group #search_cond4').val(param);
    });
});

function hideThis(_state){
    var quickSearchDiv = document.getElementById('quickSearch');
    var advancedSearchDiv = document.getElementById('advancedSearch');
    var searchType = document.getElementById('searchType');

    if(_state == "open") {
        quickSearchDiv.style.display = "none";
        advancedSearchDiv.style.display = "block";
        searchType.value = "advanced";
    }
    else {
        quickSearchDiv.style.display = "block";
        advancedSearchDiv.style.display = "none";
        searchType.value = "quick";
    }
}

function filterGlobal () {

    $('#cardSearchTable').DataTable().search(

        $('#global_filter').val(),

        $('#global_regex').prop('checked'),

        $('#global_smart').prop('checked')

    ).draw();

}

