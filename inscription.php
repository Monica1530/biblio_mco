<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>

<body>

                <h1>Inscription</h1>
    <form class="formInscription" method="POST" action="traitementInscription.php" >
            <fieldset class="sInscrire">

            <h2>Entrez vos informations pour vous inscrire</h2>
            <p>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </p>
            <p>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </p>

            <p>
                <label for="ident">Identifiant :</label>
                <input type="text" id="ident" name="ident" required>
            </p>
            <p>
                <label for="pass">Mot de passe :</label>
                <input type="password" id="pass" name="pass" required>
            </p>
            <p>
                <label for="pass">Confirmation Mot de passe :</label>
                <input type="password" id="pass2" name="pass2" min-length=8 max-length=30 required>
            </p>
            <div class="button">
                <button type="submit">S'inscrire</button>
                <a href="index.php">Accueil</a>
            </div>
    </fieldset>
    </form>
    <!--pattern=".+@globex\.com" -->
</body>

</html>