<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Login</title>
</head>

<body>
    <?php
    define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']); //ca definit une constante qui s'appelle ROOT_DIR et qui a la valeur  $_SERVER['DOCUMENT_ROOT'] &  $_SERVER['DOCUMENT_ROOT'] nous renvoie le chemin vers le dossier racine de notre projet 
    require_once ROOT_DIR . "/classes/view/ViewLogin.php";
    require_once ROOT_DIR . "/classes/model/ModelUser.php";
    require_once ROOT_DIR . "/classes/view/ViewTemplate.php";
    require_once ROOT_DIR . "/classes/utils/Utils.php";

    ViewTemplate::menu();
    if (isset($_POST["connexion"])) {
        $table = ModelUser::getEmail($_POST['mail']);
        var_dump($table);
        
        if (isset($table["mail"])) {
            
            if (password_verify($_POST["password"], $table["pass"])) {
                ViewTemplate::alert("Connexion effectuée", "success", "Accueil.php");
            } else {
                ViewTemplate::alert("Connexion impossible", "danger", "Accueil.php");
            }
        } else {
            ViewTemplate::alert("Connexion Impossible", "danger", "Accueil.php");
        }
    } else {
        ViewLogin::connexion();
    }

    ViewTemplate::footer();
    ?>



    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
    <script src="../../js/ctrl.js"></script>
</body>

</html>