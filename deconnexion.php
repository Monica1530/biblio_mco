<?php
// if (isset($_POST["deconnexion"])) {
//     session_start();
//     session_unset();
//     session_destroy();
//     exit;
// }

    session_start();

    // Destruction de la session
    session_destroy();

// Redirection vers la page d'authentification
header("Location: index.html");
?>

