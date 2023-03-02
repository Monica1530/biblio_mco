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
  
?>
<form action="pays.php" method="post">
        <fieldset class="fieldset">
            <legend><b>Recherche d'un fournisseur par son pays</b></legend>
            <label for="Pays">Pays du fournisseur : </label>
            <select id="Pays" name="Pays" onchange="validerSelection()">
                <option value="">Sélectionnez un pays</option>
                <?php
                $request = "SELECT DISTINCT Pays FROM fournisseur";
                $result = $bd->query($request);
                while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $donnees->Pays . '">' . $donnees->Pays . '</option>';
                } ?>
            </select>
            <input type="submit">
        </fieldset>
    </form>
    <?php

    if (isset($_POST['Pays'])) {
        // Si la connexion fonctionne
        $search = $_POST['Pays'];
        // Récupérer la valeur de recherche à partir de la méthode POST
        $search = $_POST['Pays'];
// Préparer la requête SQL pour sélectionner tous les enregistrements de la table "fornisseur" qui correspondent à la recherche
        $request = "SELECT * FROM fournisseur WHERE Pays LIKE :Pays";
        // Préparer la requête SQL avec PDO
        $result = $bd->prepare($request);
        // Ajouter des caractères génériques à la valeur de recherche pour rechercher des enregistrements avec des valeurs partielles qui correspondent
        $raisonSoc = "%" . $_POST['Pays'] . "%";
        // Lier la valeur de recherche à la requête SQL préparée
        $result->bindParam(':Pays', $raisonSoc, PDO::PARAM_STR);
        // Exécuter la requête SQL préparée pour sélectionner les enregistrements qui correspondent à la recherche
        $result->execute();

        //~ Pour affiche les données de la bdd dans un tableau
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
while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
            //& $donnees recuperé avec la fonction ci dessus (ATTENTION array pas SENSIBLE a la CASSE)
            //~ Les valeurs que j'affiche dans le tableau
            echo '<tr class="value">';
            echo '<td class="td">' . $donnees->Code_fournisseur . "  " . '</td>';
            echo '<td class="td">' . $donnees->Raison_sociale . "  " . '</td>';
            echo '<td class="td">' . $donnees->Rue_fournisseur . " " . '</td>';
            echo '<td class="td">' . $donnees->Code_postal . " " . '</td>';
            echo '<td class="td">' . $donnees->Localite . " " . '</td>';
            echo '<td class="td">' . $donnees->Pays . " " . '</td>';
            echo '<td class="td">' . $donnees->Tel_fournisseur . " " . '</td>';
            echo '<td class="td">' . $donnees->Url_fournisseur . " " . '</td>';
            echo '<td class="td">' . $donnees->Email_fournisseur . " " . '</td>';
            echo '<td class="td">' . $donnees->Reseau_fournisseur . " " . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>