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

$code = $_POST['number'];
$raisonSociale = $_POST['raisonSociale'];
$rue = $_POST['rue'];
$codePostal = $_POST['codePostal'];
$localite = $_POST['localite'];
$pays = $_POST['pays'];
$telephone = $_POST['telephone'];
$url = $_POST['url'];
$email = $_POST['email'];
$reseau = $_POST['reseau'];


//   try {
    // requete simple ci-dessous transformée en requête préparée plus bas
    //  $requete = $bd->prepare("UPDATE livres SET code = '$code', raisonSociale='$raisonSociale', rue='$rue', Nb_Pages='$codePostal', localite='$localite', pays='$pays', telephone='$telephone', 
    //  url='$url', email='$email', reseau='$reseau', Langue='$langue' WHERE Id = $id");
    //  $requete->execute();

    // Pour plus de sécurité, utiliser bindValue :

    $requete = $bd->prepare("UPDATE fournisseur SET Code_fournisseur=:code, Raison_Sociale=:raisonSociale, Rue_fournisseur=:rue, Code_postal=:codePostal, Localite=:localite, Pays=:pays, Tel_fournisseur=:telephone, 
    Url_fournisseur=:url, Email_fournisseur=:email, Reseau_fournisseur=:reseau WHERE Id_fournisseur=:id");
    $requete->bindValue(':code', $code);
    $requete->bindValue(':raisonSociale', $raisonSociale);
    $requete->bindValue(':rue', $rue);
    $requete->bindValue(':codePostal', $codePostal);
    $requete->bindValue(':localite', $localite);
    $requete->bindValue(':pays', $pays);
    $requete->bindValue(':telephone', $telephone);
    $requete->bindValue(':url', $url);
    $requete->bindValue(':email', $email);
    $requete->bindValue(':reseau', $reseau);
    
    $requete->bindValue(':id', $id);

    $requete->execute();
}
header("Location: listeFournisseur.php");

?>