<?php
// Cette page va vérifier sur la base de donnée si le login et le mdp exitent 

try {
    $bd = new PDO ('mysql:host=localhost;dbname=bdp5', 'root', ''); 
    $bd->query("SET NAMES 'utf8'");
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    //On termine le script en affichant le code de l'erreur et le message
    die('<p> Echec de connexion. Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
}
    // Je récupère les données du formulaire
    
    //$prenom = $_POST['prenom'];
    //$nom = $_POST['nom'];
    // je récupère les données du nom et prenom dans la base de donnée
    // $requete = "SELECT Nom, Prenom FROM users WHERE Identifiant = '$login' AND Mdp = '$mdp'";

try{
    $login = $_POST['login'];
    $mdp = $_POST['pass'];

    $requete = $bd->prepare("SELECT Nom, Prenom FROM user WHERE Identifiant=:identifiant AND Mdp=:mdp");

$requete->bindValue(':identifiant', $login);
$requete->bindValue(':mdp', $mdp);

$requete->execute();
// $result = mysqli_query($connex, $requete);


}
catch (PDOException $e) {
    //On termine le script en affichant le code de l'erreur et le message
    die('<p> Problème d identification. Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
}
    

    $obj = $requete->fetch(PDO::FETCH_OBJ);
        $nom = $obj->Nom ;
        $prenom = $obj->Prenom;
    

        session_start();
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
    

    
header('Location: accueil.php ');
