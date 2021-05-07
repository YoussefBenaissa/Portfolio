<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>VoirProfil</title>
</head>

<body>
    <?php require_once "../view/ViewUser.php";
    require_once "../model/ModelUser.php";
    require_once "../view/ViewTemplate.php";
    ViewTemplate::menu();
    ?>

    <h1> Profil Utilisateur:</h1>






    <?php
    if (isset($_GET["id"])) {
        if (ModelUser::getUser($_GET["id"])) {
            ViewUser::infoUser($_GET["id"]);
        } else {
            ViewTemplate::alert("utilisateur n'exitepas", 'danger', 'ListeUsers.php');
        }
    } else {
        ViewTemplate::alert("utilisateur n'exitepas", 'danger', 'ListeUsers.php');
    }
    ViewTemplate::footer();
    ?>



    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>