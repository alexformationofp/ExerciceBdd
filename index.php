<?php
    require('connexion.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="scss/style.css">
    <title>Base de données</title>
</head>

<body>
    <div class="container">
        <h1>Exercice base de données</h1>
    <h2>J'affiche tous les gens dont le nom est palmer</h2>
    <ul>
    <?php
        $req = $bdd->query('SELECT * FROM tbl_name WHERE last_name= "Palmer"');
        $resultats = $req->fetchAll();
        foreach($resultats as $resultat) :
        if ( $resultat['gender'] == 'Male' ){
            $genre ='né le';
            $titre = 'Monsieur ';
        }else{
            $genre = 'née le';
            $titre = 'Madame ';
        };
        echo '<li>'.$titre.$resultat['first_name'].' '.$resultat['last_name'].', '.$genre.' '.$resultat['birth_date'].'</li>'; 
        endforeach;?>
    </ul>
      
    <h2>J'affiche 20 femmes</h2>
    <ul class="listeFemmes">
        <?php
            $reqFemmes = $bdd->query('SELECT * FROM tbl_name WHERE gender = "Female" LIMIT 20');
            $reqFemmes = $reqFemmes->fetchAll();
            foreach($reqFemmes as $reqFemme) :            
            echo '<li>Madame '.$reqFemme['first_name'].' '.$reqFemme['last_name'].', née le '.$reqFemme['birth_date'].'<a href="modif.php?id='.$reqFemme['id'].'">Modifier</a></li>'; 
            endforeach;?>      
    </ul>

    <h2>J'affiche tous les états dont la lettre commence par N</h2>
    <ul>
        <?php
            $reqPays = $bdd->query('SELECT DISTINCT country_code FROM tbl_name WHERE country_code LIKE "N%"');
            $reqPays = $reqPays->fetchAll();
            foreach($reqPays as $resultPays) :
            echo '<li> '.$resultPays['country_code'].'</li>';
            endforeach;
        ?>
    </ul>
    
    <h2>J'affiche tous les emails qui contiennent google</h2>
    <ul>
        <?php
            $reqMail = $bdd->query('SELECT email FROM tbl_name WHERE email LIKE "%google%"');
            $reqMail = $reqMail->fetchAll();
            foreach($reqMail as $resultMail) :
            echo '<li>'.$resultMail['email'].'</li>';
            endforeach;
        ?>
    </ul>

    <h2>Répartition par Etat et le nombre d’enregistrement par état (croissant)</h2>
    <ul>
        <?php
            $repartition = $bdd->query('SELECT country_code, COUNT(*) FROM tbl_name GROUP BY country_code ORDER BY COUNT(*);');
            $repartition = $repartition->fetchAll();
            foreach($repartition as $resultRepartition) :
                echo '<li>'.$resultRepartition['country_code'].' nombre d\'inscrits : '.$resultRepartition['COUNT(*)'].'</li>';
            endforeach;
        ?>
    </ul>

    <h2>Insérer un utilisateur</h2>
    <form action="ajout-exo.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="">
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" id="">
        <label for="email">Email :</label>
        <input type="text" name="email" id="">
        <span>Sexe : </span>
        <input type="radio" name="genre" id="female" value="Female">
        <label for="female">F</label>
        <input type="radio" name="genre" id="male" value="Male">
        <label for="male">H</label>
        <input type="submit" value="Ajouter">
    </form>

    <h2>Modifier un utilisateur</h2>
    form>input:select

    <h2>Nombre de femmes et d'hommes</h2>
    <?php
        $genre = $bdd->query('SELECT gender,COUNT(*) FROM tbl_name GROUP BY gender;');
        $genre = $genre->fetchAll();
        foreach($genre as $resultGenre) :
            echo '<p> Number of '.$resultGenre['gender'].' : '.$resultGenre['COUNT(*)'].'</p>';
        endforeach;
    ?>

<h2>Affichons l'âge des gens</h2>
    <ul>
        <?php
        $date = $bdd->query('SELECT * FROM tbl_name ORDER BY gender LIMIT 20;');
        $date = $date->fetchAll();
        $sommeAge = 0;
        foreach($date as $resultDate) :
            if ( $resultDate['gender'] == 'Male' ){
                $titre = 'Monsieur ';
            }else{
                $titre = 'Madame ';
            };
            $recupDate = $resultDate['birth_date'];
            list($month, $day, $year) = explode('/', $recupDate);
            $age = date('Y') - intval($year);
            echo '<li>'.$titre.$resultDate['first_name'].' '.$resultDate['last_name'].' a '.$age.' ans.</li>';
            $sommeAge = $sommeAge + $age; 
        endforeach;
        echo '<br><p> Moyenne d\'age : '.round($sommeAge/count($date)).' ans.';

        ?>
    </ul>
    </div>
    
    



    
</body>

</html>