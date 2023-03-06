<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        background-color: #f5f5dc;
    }
</style>

<body>
    <form class="formConnex" method="POST" action="traitement.php">
        <form>
            <h1>Connexion</h1>
            <fieldset class="connex">
                <h2>Entrez vos identifiants pour vous connecter</h2>
                <p>
                    <label for="login">Login :</label>
                    <input type="text" size="" id="login" name="login" required>
                </p>
                <p>
                    <label for="pass">Mot de passe :</label>
                    <input type="password" size="" id="pass" name="pass" required>
                </p>
                <label for="role"></label>
<!-- 
                <select name="role" id="role_select" required>
                    <option value="">--Please choose an option--</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select> -->

                <div class="button">
                    <input type="submit" value="connexion"></input>
                </div>
                <div class="button">
                    <a href="inscription.php">S'inscrire</a>
                </div>
            </fieldset>
        </form>

</body>

</html>