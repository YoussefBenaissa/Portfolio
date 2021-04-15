<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>le get</title>
</head>

<body>
    <?php require_once "../view/ViewUser.php";
    require_once "../model/ModelUser.php";
    require_once "../view/ViewTemplate.php";
    ViewTemplate::menu();



    if (isset($_GET['id'])) {
        if (ModelUser::getUser($_GET['id'])) {
            ViewUser::modifForm($_GET['id']);
        } else {
            ViewTemplate::alert("L'utilisateur n'existe pas.", "danger", "ListeUser.php");
        }
    } else {
        if (isset($_POST['modif'])) {
            if (isset($_POST['id']) && ModelUser::getUser($_POST['id'])) {
                ModelUser::ModifProfil($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['adresse'], $_POST['photo'], $_POST['description']);
                ViewTemplate::alert("La modification a été faite avec succès.", "success", "ListeUsers.php");
            } else {
                ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeUsers.php");
            }
        } else {
            ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeUsers.php");
        }
    }
    ViewTemplate::footer();

    ?>



    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>