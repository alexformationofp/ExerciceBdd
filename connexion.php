<?php
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    $bdd = new PDO('mysql:host=localhost;dbname=csv_db;charset=utf8', 'root', '',$options);
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=csv_db;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };

