<?php
// On démarre la session
session_start();

include('connexion.php');
// On récupère nos variables de session
if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['role'])) {
    ?>
    <html lang="fr">

        <head>
            <!-- Custom CSS -->
            <link rel="stylesheet" type="text/css" href="main.css">

            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Autobonplan - Arrivage</title>

            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
            <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  


        </head>

        <body>

            <div class="topnav">

                <img class="logo" src="https://communication.autobonplan.com/abp-home/img/Logo_Autobonplan.png" />

                <div class="user-info">
                    <div class="login-container">
                        <img class="user-icon" src="http://cdn.onlinewebfonts.com/svg/img_574534.png" />
                        <?php echo '<p>Bienvenue, ' . $_SESSION['username'] . '!</p>' ?>
                    </div>
                    <div class="disconnect">
                        <a href="./fin-session.php">Se déconnecter</a>
                    </div>
                </div>


            </div>
            <div id="content-wrap">

                <div id="date-filter">

                    <p>A partir du</p>
                    <input type="text" name="from_date" id="from_date" class="form-control"/>


                    <p>Jusqu'au</p>
                    <input type="text" name="to_date" id="to_date" class="form-control"/>

                    <input type="button" name="filter" id="filter" value="Filtrer" class="btn btn-info"/>
                </div>

                <div id="order_table">
                    <table>
                        <tr>
                            <th>Marque</th>
                            <th>Modèle</th>
                            <th>Carburant</th>
                            <th>Date d'arrivage</th>
                            <th>Fournisseur</th>
                        </tr>

                        <?php
                        $req = 'SELECT * FROM vehicule ORDER BY dateArr,marque ASC';
                        $listeElements = $connexion->query($req);
                        $nb = $listeElements->rowCount();

                        if ($nb > 0) {

                            foreach ($listeElements as $data) {

                                $originalDate = $data['dateArr'];
                                $DateTime = DateTime::createFromFormat('Y-m-d', $originalDate);
                                $newDate = $DateTime->format('d/m/Y');
                                ?>
                                <tr>
                                    <td><?php echo $data['marque']; ?></td>
                                    <td><?php echo $data['modele']; ?></td>
                                    <td><?php echo $data['carburant']; ?></td>
                                    <td><?php echo $newDate; ?></td>
                                    <td><?php echo $data['fournisseur']; ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>  
                                <td colspan="5">Aucun arrivage prévu</td>  
                            </tr> 
                        <?php }
                        ?>

                    </table>
                </div>

                <?php
                //Si l'utilisateur connecté a le rôle d'admin, on affiche la saisie d'import de nouveau fichier
                if ($_SESSION['role'] == 'admin') {
                    ?>
                    <form method="post" enctype="multipart/form-data" action="traitement-fichier.php" name="import">
                        <input type="file" name="file" required>
                        <p><button type="submit" name="submit">Importer</button></p>
                    </form>
                    <?php
                }
                ?>

            </div>

        </body>

    </html>
    <script>
        $(document).ready(function () {
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });
            $(function () {
                //On rend les 2 champs "selectionnables" à l'aide du calendrier
                $("#from_date").datepicker();
                $("#to_date").datepicker();
            });
            $('#filter').click(function () {
                //On enregistre les dates saisies pour les envoyer à la page suivante avec POST
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if (from_date !== '' && to_date !== '')
                {
                    $.ajax({
                        url: "filtrer-tableau.php",
                        method: "POST",
                        data: {from_date: from_date, to_date: to_date},
                        success: function (data)
                        {
                            $('#order_table').html(data);
                        }
                    });
                } else
                {
                    //Alerte si un des 2 champs non saisi
                    alert("Veuillez choisir une date");
                }
            });
        });
    </script>

    <?php
} else {
    //Si il n'y a pas de variables de session, l'utilisateur doit se connecter
    include('login.php');
}
?>
