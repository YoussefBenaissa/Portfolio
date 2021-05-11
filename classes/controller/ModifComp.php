<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>HTML</title>
</head>

<body>
    <?php
    require_once '../view/Viewtest.php';
    require_once '../view/ViewTemplate.php';
    require_once '../model/ModelTEST.php';


    if (isset($_GET['id'])) {
        if (ModelComp::afficheID($_GET['id'])) {
            ViewComp::modifComp($_GET['id']);
        } else {
            ViewTemplate::alert("La reference n'existe pas.", "danger", "ListeReference.php");
        }
    } else {
        if (isset($_POST['modifier'])) {
            if (isset($_POST['id']) && ModelComp::afficheID($_POST['id'])) {
                ModelComp::modifComp($_POST['id'], $_POST['nom'], $_POST['domaine'], $_POST['description'], $_POST['niveau']);
                ViewTemplate::alert("La modification a été faite avec succès.", "success", "ListeReference.php");
            } else {
                ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeReference.php");
            }
        } else {
            ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeReference.php");
        }
    }




    ?>



    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
    <script src="../../js/ctrl.js"></script>

</body>

</html>