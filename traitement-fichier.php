<?php

include ('connexion.php');
include 'vendor/autoload.php';

if (isset($_FILES['file']['name'])) {

    $arr_file = explode('.', $_FILES['file']['name']);
    $extension = end($arr_file);

    if ('xlsx' == $extension) {

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

        $data = $spreadsheet->getActiveSheet()->toArray();

        for ($i = 1; $i < count($data); $i++) {

            $originalDate = $data[$i][45];
            $DateTime = DateTime::createFromFormat('d/m/Y', $originalDate);
            $newDate = $DateTime->format('Y-m-d');

            $insert_data = array(
                ':marque' => $data[$i][6],
                ':modele' => $data[$i][8],
                ':carburant' => $data[$i][11],
                ':date' => $newDate,
                ':fournisseur' => $data[$i][2]
            );
            $query = "insert into vehicule (marque, modele, carburant, dateArr, fournisseur) values(:marque, :modele, :carburant, :date, :fournisseur)";
            $statement = $connexion->prepare($query);
            $statement->execute($insert_data);
        }
        echo "<script type='text/javascript'>alert('Importation réussie');</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    } else {
        echo "<script type='text/javascript'>alert('Prise en charge de fichiers .xlsx uniquement');</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
} else {
    include('index.php');
}
?>