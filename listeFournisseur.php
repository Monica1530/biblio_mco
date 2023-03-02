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

// Je récupère la liste des fournisseurs de ma base de donnée fournisseur
try {
    $requete = $bd->prepare('SELECT * FROM fournisseur');
    $requete->execute();
    echo '<table border=1, class="styleTab" >';
    echo '<tr class="key">';
    echo '<td class="td">' . '<b>' . 'Code Fournisseur' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Raison Sociale' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Adresse Fournisseur' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Code Postal' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Localite' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Pays' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Téléphone' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Site internet' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Mail' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Reseau' . '</b>' . '</td>';
    echo '</tr>';


    // echo "<table border='1', class='styleTab' >";
    echo '<tr class="key">';
    while($obj = $requete->fetch(PDO::FETCH_OBJ)){
        echo '<tr class="value">';
            echo '<td class="td">' . $obj->Code_fournisseur . "  " . '</td>';
            echo '<td class="td">' . $obj->Raison_sociale . "  " . '</td>';
            echo '<td class="td">' . $obj->Rue_fournisseur . " " . '</td>';
            echo '<td class="td">' . $obj->Code_postal . " " . '</td>';
            echo '<td class="td">' . $obj->Localite . " " . '</td>';
            echo '<td class="td">' . $obj->Pays . " " . '</td>';
            // echo '<td class="td">' . $obj->prenomAuteur . " " . '</td>';
            echo '<td class="td">' . $obj->Tel_fournisseur . " " . '</td>';
            echo '<td class="td">' . $obj->Url_fournisseur . " " . '</td>';
            echo '<td class="td">' . $obj->Email_fournisseur . " " . '</td>';
            echo '<td class="td">' . $obj->Reseau_fournisseur . " " . '</td>';
        // echo '<tr>'. '<td>' . $obj->Id_fournisseur . '</td>' .'<td>' . $obj->Code_fournisseur . '</td><td>' . $obj->Raison_sociale .'</td> '. '<td>' . $obj->Rue_fournisseur .
        //  '</td>' . '<td>' . $obj->Code_postal . '</td>' . '<td>' . $obj->Localite .'</td> '. '<td>' . $obj->Pays . '</td>' .'<td>' . $obj->Tel_fournisseur . '</td>' . '<td>' .
        //   $obj->Url_fournisseur .'</td> '. '<td>' . $obj->Email_fournisseur . '</td>'. '<td>'. $obj->Reseau_fournisseur . '</td>' ."<td>" .  "<a href ='insererFournisseur.php?id=" .
        //    "'>Inserer</a></td>" . '</tr>';
}
    echo "</table>";
   
}
catch(PDOException $e){
    die('<p> Erreur[' .$e->getCode () .'] : ' . $e->getMessage ().'</p>');
    }
//"<td><a href ='updateBook.php?id=".$obj->Id."'>Modifier</a><td>" .
// $requete = "SELECT * FROM livres";
// $result = mysqli_query($connex, $requete);
// $nb = mysqli_num_rows($result);

// affiche l'image 
echo '<img class"" src="image\livre.png">';

include('footer.php');
