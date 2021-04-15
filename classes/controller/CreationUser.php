<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Portfolio</title>
</head>

<body>

    <?php
    require_once "../view/ViewUser.php";
    require_once "../model/ModelUser.php";
    require_once "../view/ViewTemplate.php";
    ViewTemplate::menu();


    if (isset($_POST['ajout'])) { // ajout fait reférence au name du bouton valider 

        ModelUser::EnvoieDonnee($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['adresse'], $_POST['photo'], $_POST['description']);
        ViewTemplate::alert("creation reussie", "success", "ListeUsers.php");
    } else {
        ViewUser::ajoutUser();
    };








    ViewTemplate::footer();

    ?>









    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>