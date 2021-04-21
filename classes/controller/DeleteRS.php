<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>DeleteRS</title>
</head>

<body>
    <?php
    require_once "../model/ModelSocial.php";
    require_once "../view/ViewSocial.php";
    require_once "../view/ViewTemplate.php";
    ViewTemplate::menu();

    if (isset($_GET['id'])) {
        if (/*existance user*/ModelSocial::getSocById($_GET['id'])) { // supression de l'utilisateur
            ModelSocial::suppRs($_GET['id']);
            ViewTemplate::alert("Le réseau social a été supprimé avec succès.", "success", "ListeRS.php");
        } else {
            ViewTemplate::alert("Le réseau social n'existe pas", "danger", "ListeRS.php");
        }
    } else {
        ViewTemplate::alert("Aucune donnée n'a été transmise. ", "danger", "ListeRS.php");
    }
    ViewTemplate::footer();
    ?>
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>