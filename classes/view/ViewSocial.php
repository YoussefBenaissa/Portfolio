<?php
require_once "ViewTypeSoc.php";
require_once "../model/ModeltypeSoc.php";
require_once "../model/ModelSocial.php";
class ViewSocial
{
    public static function ajoutSocial()
    {
        $typesRS = ModeleTypeSoc::listeSoc();
?>
        <div class="container">
            <form name="ajout_social" id="ajout_social" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <select name="type_soc_id" id="type_soc_id" class="form-control">
                    <option value="" selected>Sélectionnez un type de réseau</option>
                    <?php
                    foreach ($typesRS as $typeRS) {
                    ?>
                        <option value="<?php echo $typeRS['id'] ?>"><?php echo $typeRS['type_soc'] ?></option> <!-- la valeur qui sera transmise en post est la value donc ici cest l'id -->
                    <?php
                    }
                    ?>
                </select>
                <div class=" form-group">
                    <input type="url" name="lien" id="lien" class="form-control" aria-describedby="lien" placeholder="Lien" required>
                </div>
                <button type="submit" class="btn btn-primary" name="ajout">Ajouter</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
        </div>

    <?php
    }
    public static function listeSocial()
    {
        $users = ModelSocial::listeSocial();
    ?>
        <table class="table container bg-light border  border-dark mt-2 ">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nom </th>
                    <th scope="col">Prenom</th>
                    <th scope="col">type du reseau</th>
                    <th scope="col">Lien</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <th class="text-center" scope="row"> <?php echo $user['user_id'] ?></th>
                        <td class="text-center"><?php echo $user['nom'] ?></td>
                        <td class="text-center"><?php echo $user['prenom'] ?></td>
                        <td class="text-center"><?php echo $user['type_soc'] ?></td>
                        <td class="text-center"><?php echo $user['lien'] ?></td>
                        <td>
                            <div class="text-center ">
                                <a class="btn btn-success  " href="ModifRS.php?id=<?php echo $user['social_id'] ?>">Modifier </a>
                                <a class="btn btn-success  " href="DeleteRS.php?id=<?php echo $user['social_id'] ?>">Suprimer </a>
                            </div>
                        </td>

                    </tr>
                <?php
                }

                ?>


            </tbody>
        </table>

    <?php
    }
    public static function modifRS($id)
    {
        $typesRS = ModeleTypeSoc::listeSoc();
        $selectedRS = ModelSocial::getSocById($id);
    ?>
        <div class="container">
            <form name="modif_social" id="modif_social" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" name="id" name="id" value="<?php echo $id; ?>" />
                <select name="type_soc_id" class="form-control" required>
                    <?php
                    foreach ($typesRS as $typeRS) {
                    ?>
                        <option value="<?php echo $typeRS['id'] ?>" <?php echo $typeRS['id'] == $selectedRS['type_soc_id'] ? "selected" : "" ?>>
                            <?php echo $typeRS['type_soc'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <div class="  form-group">
                    <input type="url" name="lien" id="lien" value="<?php echo $selectedRS['lien'] ?>" class="form-control" aria-describedby="lien" placeholder="Lien" required>
                </div>
                <button type="submit" class="btn btn-primary" name="modif">Modifier</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </form>
        </div>
<?php
    }
}
