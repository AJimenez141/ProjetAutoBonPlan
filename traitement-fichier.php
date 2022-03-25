<?php

include ('connexion.php');
include 'vendor/autoload.php';

if (isset($_FILES['file']['name'])) {

    $arr_file = explode('.', $_FILES['file']['name']);
    $extension = end($arr_file);
    
    //On verifie que l'extension du fichier est compatible
    if ('xlsx' == $extension) {
        //On créer un reader de fichier xlsx
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        //Le reader charge le fichier 
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
        //On récupère le contenu du fichier dans un array
        $data = $spreadsheet->getActiveSheet()->toArray();

        //Pour chaque élément de l'array
        for ($i = 1; $i < count($data); $i++) {
            //On formate la date correctement pour l'insérer dans la bdd en tant que DATE
            $originalDate = $data[$i][45];
            $DateTime = DateTime::createFromFormat('d/m/Y', $originalDate);
            $newDate = $DateTime->format('Y-m-d');
            //On créer l'array avec toutes les informations nécessaires à l'insertion
            $insert_data = array(
                ':marque' => $data[$i][6],
                ':modele' => $data[$i][8],
                ':carburant' => $data[$i][11],
                ':date' => $newDate,
                ':fournisseur' => $data[$i][2]
            );
            //Ouverture d'une connexion et préparation de la requête
            $statement = $connexion->prepare("insert into vehicule (marque, modele, carburant, dateArr, fournisseur) values(:marque, :modele, :carburant, :date, :fournisseur)");
            //On éxecute la requête d'insertion avec l'array en paramètre
            $statement->execute($insert_data);
        }
        //On signale à l'utilisateur que l'importation a fonctionné et on le renvoie à la page principale
        echo "<script type='text/javascript'>alert('Importation réussie');</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    } else {
        //On signale à l'utilisateur que seuls les fichiers xlsx sont pris en charge
        echo "<script type='text/javascript'>alert('Prise en charge de fichiers .xlsx uniquement');</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
} else {
    include('index.php');
}
?>