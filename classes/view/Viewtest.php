<?php
require_once "../model/ModelTEST.php";
class ViewComp
{
    public static function ajoutComp()
    { ?>
        <div class="container">
            <form name="ajout_Comp" id="ajout_Comp" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class=" form-Comp">
                    <input type="text" name="nom" id="nom" class="form-control" aria-describedby="nom" placeholder="Nom">
                </div>
                <div class=" form-group">
                    <input type="text" name="domaine" id="domaine" class="form-control" aria-describedby="domaine" placeholder="Domaine">
                </div>
                <textarea class="form-control" name="Description" id="Description" rows="3"></textarea><br>
                <div class=" form-group">
                    <input type="text" name="niveau" id="niveau" class="form-control" aria-describedby="niveau" placeholder="Niveau">
                </div>
                <button type="submit" class="btn btn-primary mb-3" name="ajout">Ajouter</button>
                <button type="reset" class="btn btn-danger mb-3">Annuler</button>
            </form>
        </div>
    <?php   }
    public static function listeComp()
    {
        $comps = ModelComp::afficheComp(); ?>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#ID User</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Domaine</th>
                    <th scope="col">Description</th>
                    <th scope="col">Niveau</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comps as $comp) {   ?>
                    <tr>
                        <td><?php echo $comp['id'] ?></td>
                        <td><?php echo $comp['nom'] ?></td>
                        <td><?php echo $comp['domaine'] ?></td>
                        <td><?php echo $comp['description'] ?></td>
                        <td><?php echo $comp['niveau'] ?></td>
                        <td>
                            <a class="btn btn-primary" name="voir" href="VoirComp.php?id=<?php echo $comp['id'] ?>" role="button">Compétence</a>
                            <button type="button" class="btn btn-success mt-1 modif-comp" href="ModifComp.php?id=<?php echo $comp['id'] ?>" data-toggle="modal" data-target="#modalModifcomp">
                                Modifier profil
                            </button>
                            <button type="button" class="btn btn-success mt-1  supp-comp" data-toggle="modal" id="<?php echo $comp['id'] ?>" data-target="#modal">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                <?php             }             ?>
            </tbody>
        </table>
        <!-- Modal Suppression-->
        <div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Etes vous sur de vouloir suprimer cette utilisateur ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger annuler" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-success btn-supp" href="" name="Supprimer">Supprimer</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Modif-->
        <div class="modal fade modal-modif" id="modalModifcomp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ModifComp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">


                    </div>
                    <div class="modal-footer">


                    </div>
                </div>
            </div>
        </div>
    <?php   }
    public static function modifComp($id)
    {
        $selectedComp = ModelComp::afficheID($id); //var_dump($selectComp); // on memorice la fuction dans le var 
    ?>
        <div class="container mt-3">
            <form name="modif_comp" id="modif_comp" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" id="id" name="id" value="<?php echo $selectedComp['id'] ?>" />
                <div class=" form-group mt-3">
                    <input type="text" name="nom" id="nom" value="<?php echo $selectedComp['nom'] ?>" class="form-control" aria-describedby="nom" placeholder="Nom" required>
                </div>
                <div class=" form-group">
                    <input type="text" name="domaine" id="domaine" value="<?php echo $selectedComp['domaine'] ?>" class="form-control" aria-describedby="domaine" placeholder="Domaine" required>
                </div>
                <textarea class="form-control" name="description" id="description" rows="3"><?php echo $selectedComp['description'] ?></textarea><br>
                <div class=" form-group">
                    <input type="text" name="niveau" id="niveau" value="<?php echo $selectedComp['niveau'] ?>" class="form-control" aria-describedby="lien" placeholder="Lien">
                </div>
                <button type="submit" class="btn btn-outline-success mb-3" id="modifier" name="modifier">Modifier</button>
                <button type="reset" name="annuler" class="btn btn-outline-danger ml-2 mb-3 annuler">Annuler</button>
            </form>
        </div>
    <?php    }
    public static function afficheComp($id)
    {

    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nom</th>
                    <th scope="col">domaine</th>
                    <th scope="col">description</th>
                    <th scope="col">Niveau</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $comp = ModelComp::afficheID($id); ?>
                <tr>
                    <td><?= $comp['id']; ?></td>
                    <td><?= $comp['nom']; ?></td>
                    <td><?= $comp['domaine']; ?></td>
                    <td><?= $comp['description']; ?></td>
                    <td><?= $comp['niveau']; ?></td>
                    <td>
                        <a class="btn btn-primary" name="retour" href="ListeComp.php" role="button">Retour</a>

                    </td>

                </tr>
            </tbody>
        </table>
<?php
    }
}
