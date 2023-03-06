<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update book</title>
    <!--<form action="bdd.php" method="post">-->
</head>

<body>
<?php

// si elle existe
if (!empty($_GET['id'])) {
    // récupérer la valeur de la clé id dans l'url
    $id = $_GET['id'];

    // on se co à la db
    try {
        $bd = new PDO ('mysql:host=localhost;dbname=bdp5', 'root', ''); 
        $bd->query("SET NAMES 'utf8'");
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
        //On termine le script en affichant le code de l'erreur et le message
        die('<p> Echec de connexion. Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
        }
        //echo "Tout va bien";
    
    // Je récupère le livres de ma base de donnée avec l'Id que j'ai reçue
    try {
        $requete = $bd->prepare("SELECT * FROM livre WHERE Id = $id");
        $requete->execute();
        $book = $requete->fetch(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        die('<p> Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
        }
?>
       <?php include('header.php'); ?>
        <img src="image\livre.png">
 <form method="POST" action="traitementUpdate.php?id=<?=$id?>">

 
        <div class="formulaire">
            <fieldset>
                <h1>Modifier un livre</h1>
                <p>
                    <label for="number">ISBN </label>
                    <input type="integer" size="20" id="number" name="number" required value="<?php echo $book->ISBN  ?>">
                </p>
                <p>

                    <label for="titre">Titre</label>
                    <input type="text" size="20" id="titre" name="titre" required value="<?php echo $book->Titre  ?>">
                </p>
                <p>
                    <label for="theme">Theme </label>
                    <input type="text" size="20" id="theme" name="theme" value="<?php echo $book->Theme  ?>">
                </p>
                <p>
                    <label for="pages">Nb Pages </label>
                    <input type="integer" size="20" id="pages" name="pages" required value="<?php echo $book->Nb_pages ?>">
                </p>
                <p>
                    <label for="format">Format</label>
                    <input type="text" size="20" id="format" name="format" value="<?php echo $book->Format ?>">
                </p>
                <p>
                    <label for="nom">Nom auteur</label>
                    <input type="text" size="20" id="nom" name="nom" required value="<?php echo $book->NomAuteur ?>">
                </p>
                <p>
                    <label for="prenom">Prénom auteur</label>
                    <input type="text" size="20" id="prenom" name="prenom" required value="<?php echo $book->PrenomAuteur ?>">
                </p>
                <p>
                    <label for="editeur">Editeur</label>
                    <input type="text" size="20" id="editeur" name="editeur" required value="<?php echo $book->Editeur ?>">
                </p>
                <p>
                    <label for="annee">Année édition</label>
                    <input type="integer" size="20" id="annee" name="annee" required value="<?php echo $book->AnneeEdition ?>">
                </p>


                <p>
                    <label for="prix">Prix</label>
                    <input type="integer" size="20" id="prix" name="prix" value="<?php echo $book->Prix ?>">
                </p>
                <p>
                    <label for="langue">Langue</label>
                    <input type="text" size="20" id="langue" name="langue" value="<?php echo $book->Langue ?>">
                </p>

                
                <div class="button">
                    <label for="submit"></label>
                    <input type="submit" name="submit" value="Modifier">
                    <!-- <button type="submit">Ajouter</button>  -->
             
                </div>
                </fieldselt>
        </div>

    </form>
    <?php include('footer.php'); ?>
</body>

</html>
<?php
} else {
    header("Location: afficherLivres.php");
}


?>


   
   