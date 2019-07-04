<?php
    interface Config
    {
        const DB_HOST = "localhost";
        const DB_USER = "root";
        const DB_PWD = "root";
        const DB_NAME = "loue_ta_salle";


        const DB_TABLE_SALLE = "salle";
        const DB_TABLE_DISPO = "dispo";
        const DB_TABLE_USER = "utilisateur";
        const DB_TABLE_LOC = "location";
        const DB_TABLE_SALEQ = "salle_has_equipement";
        const DB_TABLE_SALACC = "salle_has_accessibilite";
        const DB_TABLE_EQUIP = "equipement";
        const DB_TABLE_ADRESSE = "salle_adresse";
        const DB_TABLE_ACCESS = "accessibilite";
        const DB_TABLE_IMAGE = "images";
    }
