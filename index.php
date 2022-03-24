<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
// On récupère nos variables de session
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
?>
<html lang="fr">

<head>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="main.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobonplan - ARRIVAGE</title>
</head>

<body>

    <div class="topnav">
        <div id="nav-container">

            <img class="logo" src="https://communication.autobonplan.com/abp-home/img/Logo_Autobonplan.png" />

            <div class="login-container">
                <img class="user-icon" src="http://cdn.onlinewebfonts.com/svg/img_574534.png" />
                
                <?php echo '<p>Bienvenue, ' . $_SESSION['username'] . '!</p>' ?>  
                <a href="./fin-session.php">Se déconnecter</a>
            </div>

        </div>
    </div>

    <div id="content-wrap">
    </div>

</body>

</html>
<?php
}
else
{
include('login.php');
}