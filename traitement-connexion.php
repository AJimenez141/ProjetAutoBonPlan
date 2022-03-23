<?php
//Identifiants valides
$username_valide = "admin";
$password_valide = "admin";

//Variables assignées?
if (isset($_POST['username']) && isset($_POST['password'])) {

//Identifiants autorisés?
if ($username_valide == $_POST['username'] && $password_valide == $_POST['password']) {

//Si oui, on instancie une session et on enregistre les identifiants comme variables de session
session_start ();
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

//On redirige le visiteur vers la bonne page
header ('location: index.php');
}
else {
//Alerte d'utilisateur non reconnu
echo "<script type='text/javascript'>alert('Utilisateur non reconnu');</script>";
echo '<meta http-equiv="refresh" content="0;URL=login.php">';
}
}
?>
