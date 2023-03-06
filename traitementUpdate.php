<?php
//echo "bonjour traitement";


 if (!empty($_GET['id'])) {
    $id = $_GET['id'];
   
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

//   try {
    // requete simple ci-dessous transformée en requête préparée plus bas
    //  $requete = $bd->prepare("UPDATE livres SET ISBN = '$isbn', Titre='$titre', Theme='$theme', Nb_Pages='$nbPages', Format='$format', NomAuteur='$nomAuteur', PrenomAuteur='$prenomAuteur', 
    //  Editeur='$editeur', AnneeEdition='$anneeEdition', Prix='$prix', Langue='$langue' WHERE Id = $id");
    //  $requete->execute();

    // Pour plus de sécurité, utiliser bindValue :

    $requete = $bd->prepare("UPDATE Livre SET ISBN=:isbn, Titre=:titre, Theme=:theme, Nb_Pages=:nbPages, Format=:format, NomAuteur=:nomAuteur, prenomAuteur=:prenomAuteur, 
    Editeur=:editeur, AnneeEdition=:anneeEdition, Prix=:prix, Langue=:langue WHERE Id=:id");
    $requete->bindValue(':isbn', $isbn);
    $requete->bindValue(':titre', $titre);
    $requete->bindValue(':theme', $theme);
    $requete->bindValue(':nbPages', $nbPages);
    $requete->bindValue(':format', $format);
    $requete->bindValue(':nomAuteur', $nomAuteur);
    $requete->bindValue(':prenomAuteur', $prenomAuteur);
    $requete->bindValue(':editeur', $editeur);
    $requete->bindValue(':anneeEdition', $anneeEdition);
    $requete->bindValue(':prix', $prix);
    $requete->bindValue(':langue', $langue);
    $requete->bindValue(':id', $id);

    $requete->execute();
}
header("Location: afficherLivres.php");

?>