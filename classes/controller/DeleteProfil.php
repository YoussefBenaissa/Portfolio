<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>listeUser</title>
</head>

<body>
    <?php
    require_once "../view/ViewUser.php";
    require_once "../model/ModelUser.php";
    require_once "../view/ViewTemplate.php";


    if (isset($_GET['id'])) {
        if (/*existance user*/ModelUser::getUser($_GET['id'])) { // supression de l'utilisateur
            ModelUser::suppUser($_GET['id']);
            ViewTemplate::alert("L'utilsateur a été supprimé avec succès.", "success", "ListeUsers.php");
        } else {
            ViewTemplate::alert("L'utilisateur n'existe pas.", "danger", "ListeUsers.php");
        }
    } else {
        ViewTemplate::alert(" Aucune donnée n'a été transmise.", "danger", "ListeUsers.php");
    }


    ?>
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>