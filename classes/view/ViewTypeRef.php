<?php
require_once "../model/ModelTypeRef.php";
class ViewTypeRef
{
    public static function ajoutRef()
    { ?>
        <form class="container mt-2" name="ajout_ref" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="form-group">

                <input type="text" class="form-control" name="type_ref" id="formGroupExampleInput" placeholder="Nom de la reference" required>
            </div>
            <div class="form-group">

                <input type="text" class="form-control" name="support" id="formGroupExampleInput" placeholder="Nom du support" required>
            </div>
            <button type="submit" name="ajouter" class="btn btn-danger">Ajouter</button>
            <button type="reset" name="reiniatiliser" class="btn btn-danger">Annuler</button>

        </form>

    <?php }
    public static function listeRef() // cette methode permet l'affichage de la liste des users
    {
        $users = ModeleTypeRef::listeRef(); // on affecte a la variable $users tout le tableau qui est associatif et on utilise une for each pour le parcourir
    ?>
        <table class="table container bg-light border  border-dark mt-2 ">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Type de Ref </th>
                    <th scope="col">Support</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <th class="text-center" scope="row"> <?php echo $user['id'] ?></th>
                        <td class="text-center"><?php echo $user['type_ref'] ?></td>
                        <td class="text-center"><?php echo $user['support'] ?></td>
                        <td>
                            <div class=" text-center">
                                <a class="btn btn-success col-3 " href="">Modifier </a>
                                <a class="btn btn-success  col-3" name="">Suprimer </a>
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
}
