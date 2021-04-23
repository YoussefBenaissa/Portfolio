<?php
require_once "ViewTypeRef.php";
require_once "../model/ModelTypeRef.php";
require_once "../model/ModelReference.php";
class ViewReference
{
    public static function ajoutRef()
    {
        $typesRS = ModeleTypeRef::listeRef();
?>



        <div class="container">
            <form name="ajout_reference" id="ajout_reference" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">


                <select name="type_ref_id" id="type_ref_id" class="form-control">
                    <option value="" selected>Sélectionnez une reference</option>
                    <?php
                    foreach ($typesRS as $typeRS) {
                    ?>
                        <option value="<?php echo $typeRS['id'] ?>"><?php echo $typeRS['type_ref'] ?></option> <!-- la valeur qui sera transmise en post est la value donc ici cest l'id -->
                    <?php
                    }
                    ?>
                </select>
                <div class="form-group">
                    <input type="text" class="form-control" name="nom" id="formGroupExampleInput" placeholder="Nom" required>

                    <input type="text" class="form-control" name="techno" id="formGroupExampleInput" placeholder="Techno" required>
                    <input type="text" class="form-control" name="contributeurs" id="formGroupExampleInput" placeholder="Contributeurs" required>
                </div>
                <div class=" form-group">
                    <input type="url" name="lien" id="lien" class="form-control" aria-describedby="lien" placeholder="Lien" required>
                </div>
                <button type="submit" class="btn btn-primary" name="ajout">Ajouter</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </form>
        </div>

    <?php
    }
    public static function listeRef()
    {
        $users = ModelReference::listeReference();

    ?>
        <table class="table container bg-light border  border-dark mt-2 ">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Type_Ref_ID </th>
                    <th scope="col">Nom Reference</th>
                    <th scope="col">Techno</th>
                    <th scope="col">Contributeurs</th>
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
                        <td class="text-center"><?php echo $user['type_ref'] ?></td>
                        <td class="text-center"><?php echo $user['nom2'] ?></td>
                        <td class="text-center"><?php echo $user['techno'] ?></td>
                        <td class="text-center"><?php echo $user['contributeurs'] ?></td>
                        <td class="text-center"><?php echo $user['lien'] ?></td>
                        <td>
                            <div class="text-center ">
                                <a class="btn btn-success" href="ModifReference.php?id=<?php echo $user['reference_id'] ?>">Modifier </a>
                                <a class="btn btn-success mt-1" href="DeleteReference.php?id=<?php echo $user['reference_id'] ?>">Suprimer </a>
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
    public static function modifRef($id)
    {
        $typesRS = ModeleTypeRef::listeRef();
        $selectedRS = ModelReference::getReference($id);
    ?>
        <div class="container">
            <form name="modif_reference" id="modif_reference" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" name="id" name="id" value="<?php echo $id; ?>" />
                <select name="type_ref_id" class="form-control" required>
                    <?php
                    foreach ($typesRS as $typeRS) {
                    ?>
                        <option value="<?php echo $typeRS['id'] ?>" <?php echo $typeRS['id'] == $selectedRS['type_ref_id'] ? "selected" : "" ?>>
                            <?php echo $typeRS['type_ref'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <div class="form-group">
                    <input type="url" name="lien" id="lien" value="<?php echo $selectedRS['lien'] ?>" class="form-control" aria-describedby="lien" placeholder="Lien" required>
                </div>
                <div class="form-group">
                    <input type="text" name="techno" id="techno" value="<?php echo $selectedRS['techno'] ?>" class="form-control" aria-describedby="techno" placeholder="techno" required>
                </div>
                <div class="form-group">
                    <input type="text" name="contributeurs" id="lien" value="<?php echo $selectedRS['contributeurs'] ?>" class="form-control" aria-describedby="contributeurs" placeholder="contributeurs" required>
                </div>
                <div class="form-group">
                    <input type="text" name="nom" id="nom" value="<?php echo $selectedRS['nom'] ?>" class="form-control" aria-describedby="nom" placeholder="nom" required>
                </div>
                <button type="submit" class="btn btn-primary" name="modif">Modifier</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </form>
        </div>
<?php
    }
}
