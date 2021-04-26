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
        if (ModelReference::getReference($_GET['id'])) {
            ViewReference::modifReference($_GET['id']);
        } else {
            ViewTemplate::alert("La reference n'existe pas.", "danger", "ListeReference.php");
        }
    } else {
        if (isset($_POST['modif'])) {
            if (isset($_POST['id']) && ModelReference::getReference($_POST['id'])) {
                ModelReference::modifReference($_POST['id'], $_POST['type_ref_id'], $_POST['lien'], $_POST['nom'], $_POST['techno'], $_POST['contributeurs']);
                ViewTemplate::alert("La modification a été faite avec succès.", "success", "ListeReference.php");
            } else {
                ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeReference.php");
            }
        } else {
            ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeReference.php");
        }
    }


    viewTemplate::footer();




    ?>

    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>