<?php
// à terminer, vérifier si laa connexion est sécurisée car j'ai mis la  conditionn en commentaire
try {
    $bd = new PDO ('mysql:host=localhost;dbname=bdp5', 'root', ''); 
    $bd->query("SET NAMES 'utf8'");
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    //On termine le script en affichant le code de l'erreur et le message
    die('<p> Echec de connexion. Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
}


try{
    // Je récupère les données du formulaire d'inscription
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ident = $_POST['ident'];
    $mdp = $_POST['pass'];
    $mpd2 = $_POST['pass2'];

    // je vérifie si les informations sont captées
    echo $nom . " " . $prenom . " " . $ident . " " . $mdp . " " . $mpd2;

    // if ($mdp == $mdp2) {
    //     echo "mot de pass identique";
    // } else {
    //     echo "Le mot de pass ne correspond pas";
    // }
    // j'insère les données du formulaire d'inscription dans la base de donnée 
    $requete = $bd->prepare("INSERT INTO user WHERE Nom:nom, Prenom:prenom, Identifiant:identifiant, Mdp:mdp");
        $requete->bindValue(':nom', $nom);
        $requete->bindValue(':prenom', $prenom);
        $requete->bindValue(':identifiant', $ident);
        $requete->bindValue(':mdp', $mdp);
      
}
catch (PDOException $e) {
    //On termine le script en affichant le code de l'erreur et le message
    die('<p> Echec de l inscription. Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
}

    //$donnees = mysqli_fetch_array($result);
    if (!$requete) {
        echo "Inscription impossible";
    } else {
        // echo "Inscription réussie";
        header("Location: index.php");
    }
   ?>
