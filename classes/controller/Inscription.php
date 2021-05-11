<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>modifuser</title>
</head>

<body>
    <?php
    define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']); //ca definit une constante qui s'appelle ROOT_DIR et qui a la valeur  $_SERVER['DOCUMENT_ROOT'] &  $_SERVER['DOCUMENT_ROOT'] nous renvoie le chemin vers le dossier racine de notre projet 
    require_once ROOT_DIR . "/classes/view/ViewUser.php";
    require_once ROOT_DIR . "/classes/model/ModelUser.php";
    require_once ROOT_DIR . "/classes/view/ViewTemplate.php";
    require_once ROOT_DIR . "/classes/utils/Utils.php";

    ViewTemplate::menu();
    if (isset($_POST['log-in'])) {
        ModelUser::ajoutConnexion($_POST['mail'], password_hash($_POST['password'], PASSWORD_DEFAULT));
        ViewTemplate::alert("Creation reusie", "success", "Inscription.php");
    } else {
        ViewUser::forminscription();
    }

    ViewTemplate::footer();
    ?>



    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
    <script src="../../js/ctrl.js"></script>
</body>

</html>