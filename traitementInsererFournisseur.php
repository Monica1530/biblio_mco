<?php

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

    //echo $isbn, $titre, $theme, $nbPages, $format, $nomAuteur, $prenomAuteur, $editeur, $anneeEdition, $prix, $langue;
    //& j'insère les données du formulaire dans la base de donnée

try{
    // je récupère les données du formulaire inserer fournisseur
    $code = $_POST['number'];
    $raisonSociale = $_POST['raisonsociale'];
    $rue = $_POST['rue'];
    $codePostal = $_POST['codepostal'];
    $localite = $_POST['localite'];
    $pays = $_POST['pays'];
    $telephone = $_POST['telephone'];
    $url = $_POST['url'];
    $mail = $_POST['mail'];
    $reseau = $_POST['reseau'];


    $requete = $bd->prepare("INSERT INTO fournisseur (Code_fournisseur, Raison_sociale, Rue_fournisseur, 
    Code_postal, Localite, Pays, Tel_fournisseur, Url_fournisseur, Email_fournisseur, Reseau_fournisseur) VALUES (:codeFournisseur, :raisonSociale, :rueFournisseur, :codePostal, :localite, :pays, :telFournisseur, :urlFournisseur, :emailFournisseur, :reseauFournisseur)");

    $requete->bindValue(':codeFournisseur', $code);
    $requete->bindValue(':raisonSociale',$raisonSociale);
    $requete->bindValue(':rueFournisseur', $rue);
    $requete->bindValue(':codePostal', $codePostal);
    $requete->bindValue(':localite', $localite);
    $requete->bindValue(':pays', $pays);
    $requete->bindValue(':telFournisseur', $telephone);
    $requete->bindValue(':urlFournisseur', $url);
    $requete->bindValue(':emailFournisseur', $mail);
    $requete->bindValue(':reseauFournisseur', $reseau);
    
    $requete->execute();
}
// }
catch(PDOException $e){
//echo 'erreur';
//test
        die('<p> Erreur d insertion[' .$e->getCode().'] : ' .$e->getMessage().'</p>');
        }


        header("Location: accueil.php");

?>
