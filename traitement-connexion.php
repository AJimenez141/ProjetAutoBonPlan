<?php
//Identifiants saisis
$nomUtil = $_POST['username'];
$mdp = $_POST['password'];

include('connexion.php');

//Ouverture d'une connexion et préparation de la requête
$req = $connexion->prepare("select role from utilisateur where nomUtil = ? and mdp = ?");
//On exécute la recherche de l'utilisateur dans la bdd
$req->execute([$nomUtil, MD5($mdp)]);
//On compte le nombre de résultats
$nb = $req->rowCount();

if ($nb == 1) {
    //Si trouvé, on instancie une session et on enregistre les identifiants comme variables de session
    session_start();
    $_SESSION['username'] = $nomUtil;
    $_SESSION['password'] = $mdp;
    
    //Et on récupère le rôle de l'utilisateur...
    $role = $req->fetch();
    $_SESSION['role'] = $role['role'];
    
    //Avant de le rediriger vers la bonne page
    header('location: index.php');
} else {
    //Alerte d'utilisateur/mdp incorrect
    echo "<script type='text/javascript'>alert('Utilisateur inconnu ou mot de passe incorrect');</script>";
    echo '<meta http-equiv="refresh" content="0;URL=login.php">';
}
?>
