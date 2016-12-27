$(document).ready(function () {
    // OWL CAROUSEL 1

    var owl = $("#cardDocumentDiv");

    owl.owlCarousel({
        items: 2,
        autoPlay: 5000,
        pagination: false,
        stopOnHover: true,
        itemsMobile: false
    });

    // Custom Navigation Events
    $(".next").click(function () {
        owl.trigger('owl.next');
    })
    $(".prev").click(function () {
        owl.trigger('owl.prev');
    })
});


$("#downloadImage").click(function () {
    var fileCollection = document.getElementById('fileCollection').value;
    var fileName = document.getElementById('fileName').value;
    var parameter = "Pour l'exposition de ...";
    var comment = prompt("Raison du téléchargement", parameter);
    if (comment != null) {
        $.ajax({
            type: "GET",
            url: "/recordDownload/" + comment.toString() + '/' + fileCollection + '/' + fileName.toString(),
            success: function (data) {
            },
            error: function () {
                alert("Une erreur est survenue! Veuillez réessayer, si l'erreur persiste, contactez l'administrateur");
            }
        }, "html");
    }
    else {
        return false;
    }
})

function addToBasket(filename) {
    var rootToImage = '/cookie/set/' + filename;
}
