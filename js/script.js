$(document).ready(function () {
    $('#btn-suivant').click(function () {


    });
    $("#formAjout").validate({
        rules: {
            noCivique: {
                required: true
            },
            rue_room: {
                required: true
            },
            ville_room: {
                required: true
            },
            codePostal_room: {
                required: true
            },
            province_room: {
                required: true
            },
            pays_room: {
                required: true
            },
            titre: {
                required: true
            },
            description_room: {
                required: true
            },
            capaciteRoom: {
                required: true
            },
            superficieRoom: {
                required: true
            },
            prix_jour: {
                required: true
            }
        },
        messages: {
            noCivique: {
                required: "veuillez entrer le numero civique"
            },
            rue_room: {
                required: "veuillez entrer le nom de la rue"
            },
            ville_room: {
                required: "veuillez entrer le nom de la ville"
            },
            codePostal_room: {
                required: "veuillez entrer le code postal"
            },
            province_room: {
                required: "veuillez entrer le nom de la province"
            },
            pays_room: {
                required: "veuillez entrer le nom du pays"
            },
            titre: {
                required: "veuillez entrer le titre"
            },
            description_room: {
                required: "veuillez entrer une description"
            },
            capaciteRoom: {
                required: "veuillez entrer la capacite"
            },
            superficieRoom: {
                required: "veuillez entrer la superficie"
            },
            prix_jour: {
                required: "veuillez entrer le prix"
            }
        }
    });

});