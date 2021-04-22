<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>DeleteSoc</title>
</head>

<body>
    <?php require_once "../model/ModelTypeRef.php";
    require_once "../view/ViewTypeRef.php";
    require_once "../view/ViewTemplate.php";
    ViewTemplate::menu();

    if (isset($_GET['id'])) {
        if (/*existance user*/ModeleTypeRef::getRef($_GET['id'])) { // supression de l'utilisateur
            ModeleTypeRef::suppTypeRef($_GET['id']);
            ViewTemplate::alert("Le type de Ref a été supprimé avec succès.", "success", "ListeTypeRef.php");
        } else {
            ViewTemplate::alert("Letype ref n'existe pas.", "danger", "ListeTypeRef.php");
        }
    } else {
        ViewTemplate::alert(" Aucune donnée n'a été transmise.", "danger", "ListeTypeRef.php");
    }
    viewTemplate::footer()



    ?>

    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>