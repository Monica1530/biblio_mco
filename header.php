<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header>
    <?php
            session_start();
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $role = $_SESSION['role'];

            echo "Bonjour " . $nom . " " . $prenom;
            // echo ' voici le role ' . $role;
            ?>

        <nav id="menu">
            <div class="element_menu">
                <a href="index.php">Accueil</a>

                <select onchange="la(this.value)">
                    <option disabled selected>Livres</option>
                    <option value="afficherLivres.php">Afficher les livres</option>
                    <?php if($role == 1):?>
                        <option value="insererLivre.php">Ajouter un livre</option>
                        <option value="updateBook.php">Modifier un livre</option>
                        <?php 
                    endif
                    ?>
                    </select>

                <select onchange="lo(this.value)">
                    <option disabled selected>Fournisseurs</option>
                    <option value="listeFournisseur.php">Liste des fournisseurs</option>
                        <?php if($role == 1):?>
                        <option value="insererFournisseur.php">Insérer un fournisseur</option>
                        <option value="afficheRaisonSociale.php">Raison sociale</option>
                        <option value="localite.php">Afficher par localité</option>
                        <option value="pays.php">Afficher par pays</option>
                        <?php
                        endif
                        ?>
                    </select>
                    <!-- <option value="insererFournisseur.php">Insérer un fournisseur</option>
                    <option value="afficheRaisonSociale.php">Raison Sociale</option>
                    <option value="localite.php">Localité</option>
                    <option value="pays.php">Pays</option> -->

        <!-- <option value="insererLivre.php">Lister un fournisseur</option> -->
                </select>

                <form class="index" action="index.php" method="post">
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