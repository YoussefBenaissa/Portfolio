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
    <?php require_once "../model/ModeltypeSoc.php";
    require_once "../view/ViewTypeSoc.php";
    require_once "../view/ViewTemplate.php";
    
    if (isset($_GET['id'])) {
        if (/*existance user*/ModeleTypeSoc::getSoc($_GET['id'])) { // supression de l'utilisateur
            ModeleTypeSoc::suppSoc($_GET['id']);
            ViewTemplate::alert("Le reseau a été supprimé avec succès.", "success", "ListeSoc.php");
        } else {
            ViewTemplate::alert("Le reseau n'existe pas.", "danger", "ListeSoc.php");
        }
    } else {
        ViewTemplate::alert(" Aucune donnée n'a été transmise.", "danger", "ListeSoc.php");
    }



    ?>

    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>