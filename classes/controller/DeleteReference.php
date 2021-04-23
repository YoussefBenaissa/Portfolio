<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>test</title>
</head>

<body>
    <?php
    require_once "../view/ViewTemplate.php";
    require_once "../view/ViewReference.php";
    require_once "../model/ModelReference.php";
    ViewTemplate::menu();
    if (isset($_GET['id'])) {
        if (/*existance user*/ModelReference::getReference($_GET['id'])) { // supression de l'utilisateur
            ModelReference::suppRef($_GET['id']);
            ViewTemplate::alert("La reference a été supprimé avec succès.", "success", "ListeReference.php");
        } else {
            ViewTemplate::alert("Le reseau n'existe pas.", "danger", "ListeReference.php");
        }
    } else {
        ViewTemplate::alert(" Aucune donnée n'a été transmise.", "danger", "ListeReference.php");
    }



    viewTemplate::footer();




    ?>

    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>