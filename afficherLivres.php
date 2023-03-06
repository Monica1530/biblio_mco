<?php
include('header.php');

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
    // echo "<table border='1'>";
    //~ Pour afficher les données de la bdd dans un tableau 
    echo '<table border=1, class="styleTab" >';
    echo '<tr class="key">';
    echo '<td class="td">' . '<b>' .  'ISBN ' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' .  'Titre ' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' .  'Thème ' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' .  'Nombre Pages' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' .  'Format' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Auteur' . '</b>' . '</td>';
    // echo '<td class="td">' . '<b>' . 'Prénom auteur' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Editeur' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . "Année d'édition" . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Prix' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . 'Langue' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
    echo '</tr>';
    while($obj = $requete->fetch(PDO::FETCH_OBJ)){
        //~ Si l'utilisateur est un administrateur, afficher les deux dernières colonnes
        if ($_SESSION['role'] === 1) {
            //& $obj récuperé avec la fonction ci-dessus (ATTENTION l'array n'est pas SENSIBLE à la CASSE)
            //~ Les valeurs que j'affiche dans le tableau
            echo '<tr class="value">';
            echo '<td class="td">' . $obj->ISBN . "  " . '</td>';
            echo '<td class="td">' . $obj->Titre . "  " . '</td>';
            echo '<td class="td">' . $obj->Theme . " " . '</td>';
            echo '<td class="td">' . $obj->Nb_pages . " " . '</td>';
            echo '<td class="td">' . $obj->Format . " " . '</td>';
            echo '<td class="td">' . $obj->NomAuteur . " " . $obj->PrenomAuteur . " " . '</td>';
            // echo '<td class="td">' . $obj->prenomAuteur . " " . '</td>';
            echo '<td class="td">' . $obj->Editeur . " " . '</td>';
            echo '<td class="td">' . $obj->AnneeEdition . " " . '</td>';
            echo '<td class="td">' . $obj->Prix . " " . '</td>';
            echo '<td class="td">' . $obj->Langue . " " . '</td>';
            echo '<td><a href="updateBook.php?id=' . $obj->id . '"><i class="fa-solid fa-pen"></i></a></td>';
            // echo "<td style='text-align:center;'><a href='javascript:void(0)' onclick='confirmDelete(" . $obj->id . ")' '><i class='fa-solid fa-trash'></i></a></td>";
            echo '<td><a href="deleteBook.php?id=' . $obj->id . '"><i class="fa-solid fa-trash"></i></a></td>';
    } else {
                echo '<tr class="value">';
            echo '<td class="td">' . $obj->ISBN . "  " . '</td>';
            echo '<td class="td">' . $obj->Titre . "  " . '</td>';
            echo '<td class="td">' . $obj->Theme . " " . '</td>';
            echo '<td class="td">' . $obj->Nb_pages . " " . '</td>';
            echo '<td class="td">' . $obj->Format . " " . '</td>';
            echo '<td class="td">' . $obj->NomAuteur . " " . $obj->PrenomAuteur . " " . '</td>';
            // echo '<td class="td">' . $obj->prenomAuteur . " " . '</td>';
            echo '<td class="td">' . $obj->Editeur . " " . '</td>';
            echo '<td class="td">' . $obj->AnneeEdition . " " . '</td>';
            echo '<td class="td">' . $obj->Prix . " " . '</td>';
            echo '<td class="td">' . $obj->Langue . " " . '</td>';
            }
        //  echo '<tr>'. '<td>' . $obj->id . '</td>' .'<td>' . $obj->Titre . '</td><td>' . $obj->Theme .'</td> '. '<td>' . $obj->Nb_pages . '</td>' . '<td>' . $obj->Format . '<td>' . '<td>' . $obj->NomAuteur .'</td> '. '<td>' . $obj->PrenomAuteur . '</td>' .'<td>' . $obj->Editeur . '<td>' . '<td>' . $obj->AnneeEdition .'</td> '. '<td>' . $obj->Prix . '</td>'. '<td>'. $obj->Langue . '</td>' ."<td>" .  "<a href ='deleteBook.php?id=" . $obj->id . "'>Effacer</a><td>" . "<td><a href ='updateBook.php?id=".$obj->id."'>Modifier</a><td>" . '</tr>';
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
?>