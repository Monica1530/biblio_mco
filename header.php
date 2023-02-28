<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Header</title>

</head>

<body>
    <header>
        <nav id="menu">
            <div class="element_menu">
                <a href="index.php">Accueil</a>

                <select onchange="la(this.value)">
                    <option disabled selected>Selection</option>
                    <option value="afficherLivres.php">Afficher les livres</option>
                    <option value="insererLivre.php">Ajouter un livre</option>
                </select>
                <select onchange="lo(this.value)">
                    <option disabled selected>Fournisseurs</option>
                    <option value="listeFournisseur.php">Liste des fournisseurs</option>
                    <option value="insererFournisseur.php">Insérer un fournisseur</option>
                    <!-- <option value="insererLivre.php">Lister un fournisseur</option> -->
                </select>

                <form action="index.php" method="post">
                    <input type="submit" name="deconnexion" value="Déconnexion">
                </form>
                <script>
                    function la(src) {
                        window.location = src;
                    }
                </script>
                <script>
                    function lo(src) {
                        window.location = src;
                    }
                </script>
                <!--<a href="index.php">Livres</a>-->
            </div>
        </nav>
        <h3>
            <?php
            session_start();
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            echo "Bonjour " . $nom . " " . $prenom;
            ?>


            <!-- <div class="user-widget">
                 <::?php if (isset($_SESSION['deconnexion']) && $_SESSION['deconnexion'] !== null) : ?>
                    <a href="/logout.php">Se déconnecter</a>
                <::?php else : ?>
                    <a href="/login.php">Se connecter</a>
                <::?php endif; ?> 
            </div> -->


        </h3>
        <h2>Bienvenue sur le site de consulation de livres</h2>
    </header>
</body>

</html>