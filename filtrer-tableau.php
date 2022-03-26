<?php

include('connexion.php');

if (isset($_POST["from_date"], $_POST["to_date"])) {

    $fromDate = $_POST['from_date'];
    $toDate = $_POST['to_date'];

    $output = '';

    //On exécute la requête avec, en paramètres, les dates saisies précédemment en tant que filtres
    $req = $connexion->prepare("SELECT * FROM vehicule WHERE DATE(dateArr) BETWEEN DATE(?) AND DATE(?) ORDER BY dateArr,marque ASC");
    $req->execute([$fromDate, $toDate]);

    //On compte le nombre de résultats
    $nb = $req->rowCount();
    //On construit notre tableau
    $output .= "  
           <table>
                    <tr>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Carburant</th>
                        <th>Date d'arrivage</th>
                        <th>Fournisseur</th>
                    </tr>  
      ";
    if ($nb > 0) {
        //Si trouvé, on va récupérer, pour chaque éléments, ses informations afin de les afficher dans le tableau
        foreach ($req as $data) {

            $originalDate = $data['dateArr'];
            $DateTime = DateTime::createFromFormat('Y-m-d', $originalDate);
            $newDate = $DateTime->format('d/m/Y');

            $output .= '  
                     <tr>  
                          <td>' . $data['marque'] . '</td>  
                          <td>' . $data['modele'] . '</td>  
                          <td>' . $data['carburant'] . '</td>  
                          <td>' . $newDate . '</td>  
                          <td>' . $data['fournisseur'] . '</td>  
                     </tr>  
                ';
        }
    } else {
        //Si on trouve aucun résultat, le tableau n'affichera pas de valeurs mais un message pour en avertir l'utilisateur
        $output .= '  
                <tr>  
                     <td colspan="5">Aucun arrivage prévu</td>  
                </tr>  
           ';
    }
    //On récupère notre tableau filtré
    $output .= '</table>';
    echo $output;
} else {
    include('index.php');
}
?>