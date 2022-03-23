<!DOCTYPE html>

<html lang="fr">

<head>
    <link rel="stylesheet" href="./login-style.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobonplan - Connexion</title>
</head>

<body>
    <div id="login-form-wrap">
        <img src="https://zoomcar.fr/ouestfranceauto/pro/boc_autobonplan_7775_1609246954.png">
        <form action="traitement-connexion.php" id="login-form" method="post">
            <p>
                <input type="text" id="username" name="username" placeholder="Utilisateur" required><i class="validation">
    </p>
    <p>
    <input type="password" id="password" name="password" placeholder="Mot de Passe" required><i class="validation">
    </p>
    <p>
    <input type="submit" value="Se connecter">
    </p>
  </form>
</div>
  
</body>
</html>