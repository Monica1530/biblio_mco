<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update fournisseur</title>
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
        
        $requete = $bd->prepare("SELECT * FROM fournisseur WHERE Id_fournisseur = $id");
        $requete->execute();
        $obj = $requete->fetch(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        die('<p> Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
        }
?>
       <?php include('header.php'); ?>
        <img src="image\livre.png">
        <div class="formulaire">
        <form method="POST" action="traitementUpdateFournisseur.php?id=<?=$id?>">
                    <h1>Modifier un fournisseur</h1>
            <fieldset>
                <p>
                    <label for="number">Code </label>
                    <input type="integer" size="20" id="number" name="number" required value="<?php echo $obj->Code_fournisseur  ?>">
                </p>
                <p>

                    <label for="raisonSociale">Raison Sociale</label>
                    <input type="text" size="20" id="raisonSociale" name="raisonSociale" required value="<?php echo $obj->Raison_sociale  ?>">
                </p>
                <p>
                    <label for="rue">rue </label>
                    <input type="text" size="20" id="rue" name="rue" value="<?php echo $obj->Rue_fournisseur  ?>">
                </p>
                <p>
                    <label for="codePostal">Code postal </label>
                    <input type="integer" size="20" id="codePostal" name="codePostal" required value="<?php echo $obj->Code_postal ?>">
                </p>
                <p>
                    <label for="localite">Localité</label>
                    <input type="text" size="20" id="localite" name="localite" value="<?php echo $obj->Localite ?>">
                </p>
                <p>
                    <label for="pays">Pays</label>
                    <input type="text" size="20" id="pays" name="pays" required value="<?php echo $obj->Pays ?>">
                </p>
                <p>
                    <label for="telephone">Téléphone</label>
                    <input type="tel" size="20" id="telephone" name="telephone" required value="<?php echo $obj->Tel_fournisseur ?>">
                </p>
                <p>
                    <label for="url">URL</label>
                    <input type="text" size="20" id="url" name="url" required value="<?php echo $obj->Url_fournisseur ?>">
                </p>
                <p>
                    <label for="email">E-mail</label>
                    <input type="integer" size="20" id="email" name="email" required value="<?php echo $obj->Email_fournisseur ?>">
                </p>
                <p>
                    <label for="reseau">Réseau</label>
                    <input type="integer" size="20" id="reseau" name="reseau" value="<?php echo $obj->Reseau_fournisseur ?>">
                </p>
                
                
                    <div class="button">
                        <label for="submit"></label>
                        <input type="submit" name="submit" value="Modifier">
                        <!-- <button type="submit">Ajouter</button>  -->
                    </div>
                </fieldselt>
            </form>
        </div>                                             
    <?php include('footer.php'); ?>
</body>

</html>
<?php
} else {
    header("Location: listeFournisseur.php");
}


?>
