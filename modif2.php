<?php
    require('connexion.php');
    $id = $_GET['id'];

    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $envoi = $bdd->prepare('UPDATE tbl_name SET last_name = :nom, first_name = :prenom, email = :email WHERE id = :id;');
        $envoi->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'id' => $id
        ]);
        var_dump($nom);
    };

        header('location: index.php');