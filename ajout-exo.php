<?php

require('connexion.php');

if (isset($_POST['nom'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $genre = $_POST['genre'];
}

$requete = $bdd->prepare("INSERT INTO tbl_name (first_name, last_name, email, gender) VALUES (:nom, :prenom, :email, :genre)");
$requete->execute([
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'genre' => $genre
]);
header('location: index.php');