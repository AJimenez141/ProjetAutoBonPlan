<?php

include ('connexion.php');
include 'vendor/autoload.php';

if (isset($_FILES['file']['name'])) {

    $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES['file']['name']);

    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

    $data = $spreadsheet->getActiveSheet()->toArray();

    foreach ($data as $row) {
        $insert_data = array(
            ':marque' => $row[6],
            ':modele' => $row[8],
            ':carburant' => $row[11],
            ':date' => $row[45],
            ':fournisseur' => $row[2]
        );
        $query = "insert into vehicule (marque, modele, carburant, dateArr, fournisseur) values(:marque, :modele, :carburant, :date, :fournisseur)";
        $statement = $connexion->prepare($query);
        $statement->execute($insert_data);
    }
    echo "<script type='text/javascript'>alert('GG ça marche');</script>";
} else {
    echo "<script type='text/javascript'>alert('Pas de fichier');</script>";
}
?>