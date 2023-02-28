<?php
// c'est fait 
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

    //& j'insère les données du formulaire dans la base de donnée
try {
     // Je récupère les données du formulaire
     $isbn = $_POST['number'];
     $titre = $_POST['titre'];
     $theme = $_POST['theme'];
     $nbPages = $_POST['pages'];
     $format = $_POST['format'];
     $nomAuteur = $_POST['nom'];
     $prenomAuteur = $_POST['prenom'];
     $editeur = $_POST['editeur'];
     $anneeEdition = $_POST['annee'];
     $prix = $_POST['prix'];
     $langue = $_POST['langue'];

    $requete = $bd->prepare("INSERT INTO livres(ISBN, Titre, Theme, Nb_pages, Format, NomAuteur, PrenomAuteur, Editeur, AnneeEdition, Prix, Langue)
    VALUES(:isbn,:titre,:theme,:nbpages,:format,:nomauteur,:prenomauteur,:editeur,:anneeedition,:prix,:langue)");
    
    $requete->bindValue(':isbn', $isbn);
    $requete->bindValue(':titre',$titre);
    $requete->bindValue(':theme', $theme);
    $requete->bindValue(':nbpages', $nbPages);
    $requete->bindValue(':format', $format);
    $requete->bindValue(':nomauteur', $nomAuteur);
    $requete->bindValue(':prenomauteur', $prenomAuteur);
    $requete->bindValue(':editeur', $editeur);
    $requete->bindValue(':anneeedition', $anneeEdition);
    $requete->bindValue(':prix', $prix);
    $requete->bindValue(':langue', $langue);
    
    $requete->execute();
}
catch(PDOException $e){
//echo 'erreur';
    die('<p> Erreur[' .$e->getCode().'] : ' .$e->getMessage().'</p>');
    }


    header("Location: accueil.php");




