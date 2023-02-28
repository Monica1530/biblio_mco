<?php
include('header.php');
// c'est bon
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

// Je récupère les livres de ma base de donnée
try {
    $requete = $bd->prepare('SELECT * FROM livre');
    $requete->execute();
    echo "<table border='1'>";
    while($obj = $requete->fetch(PDO::FETCH_OBJ)){
        echo '<tr>'. '<td>' . $obj->id . '</td>' .'<td>' . $obj->Titre . '</td><td>' . $obj->Theme .'</td> '. '<td>' . $obj->Nb_pages . '</td>' . '<td>' . $obj->Format . '<td>' . '<td>' . $obj->NomAuteur .'</td> '. '<td>' . $obj->PrenomAuteur . '</td>' .'<td>' . $obj->Editeur . '<td>' . '<td>' . $obj->AnneeEdition .'</td> '. '<td>' . $obj->Prix . '</td>'. '<td>'. $obj->Langue . '</td>' ."<td>" .  "<a href ='deleteBook.php?id=" . $obj->id . "'>Effacer</a><td>" . "<td><a href ='updateBook.php?id=".$obj->id."'>Modifier</a><td>" . '</tr>';
}
    echo "</table>";
}
catch(PDOException $e){
    die('<p> Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
    }

// $requete = "SELECT * FROM livres";
// $result = mysqli_query($connex, $requete);
// $nb = mysqli_num_rows($result);

// affiche l'image 
echo '<img class"" src="image\livre.png">';

include('footer.php');
