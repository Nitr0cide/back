

// Initialisation des évènements

$(document).ready( function() {
   // $("p[data-id]").on("click", loadHotel);
   $("p[data-id]").on("click", loadHotelJson);


});



function loadHotel() {
    // Role : demander au serveur le bloc HTML décrivant l'hotel cliqué (this), et l'afficher dans la section dédiée (.detail)

    var url="get_hotel.php?id=" + $(this).attr("data-id");
    $(".detail").load(url);

}


function loadHotelJson() {
    // Role : demander au serveur les données d'un hotel au format JSON

    var url="get_hotel_json.php?id=" + $(this).attr("data-id");
    $.ajax(url, {
        success: updateHotel
    });


}

function updateHotel(data) {
    // Rôle : traite la réponse à la requête Ajax de demande des données d'un hôtel
    // Data : données reçues

    //var hotel = JSON.parse(data);  // A faire si PHP ne crée pas l'en-tête pour indiquer le format de fichier envoyé
    var hotel = data;
    var htmlContenu = "<p><b>"+hotel.nom+"</b></p>";
    htmlContenu += "<p>Nombre de chambres : "+hotel.chambres+"<p>";
    htmlContenu += "<p>Prix : "+hotel.prix+" €<p>";

    $(".detail").html(htmlContenu);

}