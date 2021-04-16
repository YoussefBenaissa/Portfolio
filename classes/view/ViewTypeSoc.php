<?php
require_once "../model/ModeltypeSoc.php";
class ViewTypeSoc
{
    public static function ajoutSoc()
    { ?>
        <form class="container mt-2" name="ajout_soc" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="form-group">

                <input type="text" class="form-control" name="type_soc" id="formGroupExampleInput" placeholder="Nom du reseau social">
            </div>
            <button type="submit" name="ajouter" class="btn btn-danger">Ajouter</button>
            <button type="reset" name="reiniatiliser" class="btn btn-danger">Annuler</button>

        </form>

    <?php }
    public static function listeUsers() // cette methode permet l'affichage de la liste des users
    {
        $users = ModeleTypeSoc::listeSoc(); // on affecte a la variable $users tout le tableau qui est associatif et on utilise une for each pour le parcourir
    ?>
        <table class="table container bg-light border  border-dark mt-2 ">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nom du reseau social </th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $user['id'] ?></th>
                        <td><?php echo $user['type_soc'] ?></td>
                        <td>
                            <div><a class="btn btn-success col-3 " href="VoirTypeSoc.php?id=<?php echo $user['id'] ?>">Voir type_soc </a>
                                <a class="btn btn-success  col-3" href="ModifTypeSoc.php?id=<?php echo $user['id'] ?>">Modifier le reseau </a>
                                <a class="btn btn-success  col-3" name="Suprimer" href="DeleteSoc.php?id=<?php echo $user['id'] ?>">Suprimer le reseau </a>
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
    public static function infoSoc($id)
    {
        $users2 = ModeleTypeSoc::getSoc($id)


    ?>

        <p><?php echo $users2['type_soc'] ?></p>





    <?php
    }
    public static function modifSoc($id)
    {

        $users = ModeleTypeSoc::getSoc($id);
    ?>
        <form class="container mt-2" name="ajout_soc" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $users['id'] ?>">

                <input type="text" class="form-control" name="type_soc" id="formGroupExampleInput" value="<?php echo $users['type_soc'] ?>">
            </div>
            <button type="submit" name="modif" class="btn btn-primary">Modifier</button>
            <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
        </form>

<?php }
}
