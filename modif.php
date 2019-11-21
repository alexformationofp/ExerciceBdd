<?php
    require('connexion.php');
    $id = $_GET['id'];

    $modif = $bdd->prepare('SELECT * FROM tbl_name WHERE id = :id;');
    $modif->execute([
        'id' => $id
    ]);
    $results = $modif->fetchAll();
    foreach($results as $result) :?>
        <form action="modif2.php?id=<?php echo $id?>" method="post">
            <input type="text" name="nom" id="" value="<?php echo $result['last_name']?>">
            <input type="text" name="prenom" id="" value="<?php echo $result['first_name']?>">
            <input type="text" name="email" id="" value="<?php echo $result['email']?>">
            <input type="submit" value="Modifier">
        </form>
    <?php endforeach; 
    
    ?>



