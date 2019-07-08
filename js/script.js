$(document).ready(function () {
    $('#datepicker').datepicker();
    $('#datepickerFin').datepicker();
    $('#reservation_form').validate({
        rules: {
            datepicker: {
                required: true
            },
            datepickerFin: {
                required: true
            }
        },
        messages: {
            datepicker: {
                required: "Veuillez entrer une date de debut."
            },
            datepickerFin: {
                required: "veuillez entrer une date de fin."
            }
        }
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
    $("#ajoutUser").validate({
        rules: {
            noCivique_user: {
                required: true
            },
            rue_user: {
                required: true
            },
            ville_user: {
                required: true
            },
            codePostal_user: {
                required: true
            },
            province_user: {
                required: true
            },
            pays_user: {
                required: true
            },
            create_email: {
                required: true
            },
            description_user: {
                required: true
            },
            create_username: {
                required: true
            },
            create_password: {
                required: true
            },
            create_prenom: {
                required: true
            },
            create_nom: {
                required: true
            }
        },
        messages: {
            noCivique_user: {
                required: "veuillez entrer le numero civique"
            },
            rue_user: {
                required: "veuillez entrer le nom de la rue"
            },
            ville_user: {
                required: "veuillez entrer le nom de la ville"
            },
            codePostal_user: {
                required: "veuillez entrer le code postal"
            },
            province_user: {
                required: "veuillez entrer le nom de la province"
            },
            pays_user: {
                required: "veuillez entrer le nom du pays"
            },
            create_email: {
                required: "veuillez entrer votre adresse email"
            },
            description_user: {
                required: "veuillez entrer une description"
            },
            create_username: {
                required: "veuillez entrer votre nom d'utilisateur"
            },
            create_password: {
                required: "veuillez entrer votre mot de passe"
            },
            create_prenom: {
                required: "veuillez entrer votre prenom"
            },
            create_nom: {
                required: "veuillez entrer votre nom"
            }
        }
    });


});