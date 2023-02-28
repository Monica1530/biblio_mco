<?php
// c'est OK
// connexion à la base de données correct et sécurisée avec try et catch
try {
    $bd = new PDO ('mysql:host=localhost;dbname=bdp5', 'root', ''); 
    $bd->query("SET NAMES 'utf8'");
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    //On termine le script en affichant le code de l'erreur et le message
    die('<p> Echec de connexion. Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
    }
    echo "Tout va bien";
    
// Je récupère l'id du livre
    $id = $_GET['id'];

    try {
        $requete = $bd->prepare('DELETE FROM livre WHERE id = ?');
        $requete->execute(array($id));
    } catch(PDOException $e) {
        die('<p> Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
    }

   header('Location: afficherLivres.php');
    
