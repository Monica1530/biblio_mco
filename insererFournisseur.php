<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insérer un fournisseur</title>
    <!--<form action="bdd.php" method="post">-->
</head>

<body>

    <?php include('header.php'); ?>
    <img src="image\livre.png">
    <div class="formulaire">
        <fieldset>

            <h1>Ajouter un fournisseur</h1>
            <form method="POST" action="traitementInsererFournisseur.php">
                <p>
                    <label for="number">Code : </label>
                    <input type="integer" size="20" id="number" name="number" required>
                </p>
                <p>

                    <label for="raisonsociale">Raison sociale</label>
                    <input type="text" size="20" id="raisonsociale" name="raisonsociale" required>
                </p>
                <p>
                    <label for="rue">Rue </label>
                    <input type="text" size="20" id="rue" name="rue">
                </p>
                <p>
                    <label for="codepostal">Code postal </label>
                    <input type="integer" size="20" id="codepostal" name="codepostal" required>
                </p>
                <p>
                    <label for="localite">Localité</label>
                    <input type="text" size="20" id="localite" name="localite">
                </p>
                <p>
                    <label for="pays">Pays</label>
                    <input type="text" size="20" id="pays" name="pays" required>
                </p>
                <p>
                    <label for="telephone">Téléphone</label>
                    <input type="tel" size="20" id="telephone" name="telephone" required>
                </p>
                <p>
                    <label for="url">URL</label>
                    <input type="url" size="20" id="url" name="url" required>
                </p>
                <p>
                    <label for="mail">E-mail</label>
                    <input type="email" size="20" id="mail" name="mail" required>
                </p>
                <p>
                    <label for="fax">Fax</label>
                    <input type="tel" size="20" id="fax" name="fax">
                </p>
                
                <div class="button">
                    <input type="submit" value="Inserer">
                </div>
            </form>
            </fieldselt>



    </div>

    <?php include('footer.php'); ?>
</body>

</html>