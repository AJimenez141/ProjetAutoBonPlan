<?php
    
define('USER', 'root');
define('MDP', '');
define('DSN', 'mysql:host=localhost;dbname=bdd_autobonplan');
try{
    $connexion = new PDO(DSN, USER, MDP);
    $connexion->query("SET CHARACTER SET utf8"); 
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage() . "<br />";
        $connexion = null;
    }
?>


