<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Portfolio</title>
</head>

<body>

    <?php
    require_once "../view/ViewUser.php";
    require_once "../model/ModelUser.php";
    require_once "../view/ViewTemplate.php";
    require_once "../utils/Utils.php";

    ViewTemplate::menu();
    if (isset($_POST['ajout'])) {
        $donnees = [$_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['adresse'], $_POST['description']];
        $types = ["nom", "prenom", "email", "tel", "non", "non"];

        $data = Utils::valider($donnees, $types);

        if ($data) {
            $extensions = ["jpg", "jpeg", "png", "gif"];
            $upload = Utils::upload($extensions, $_FILES['photo']);
            if ($upload['uploadOk']) {
                $file_name = $upload['file_name'];
                ModelUser::EnvoieDonnee($data[0], $data[1], $data[2], $data[3], $data[4], $file_name, $data[5]);
                ViewTemplate::alert("Les données sont insérées avec succès", "success", "listeusers.php");
            } else {
                ViewTemplate::alert($upload['errors'], "danger", htmlspecialchars($_SERVER['PHP_SELF']));
            }
        } else {
            ViewUser::ajoutUser();
        }
    } else {
        ViewUser::ajoutUser();
    }







    ?>









    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
    <script src="../../js/ctrl.js"></script>
</body>

</html>