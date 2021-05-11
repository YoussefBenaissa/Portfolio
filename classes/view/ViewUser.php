<?php
require_once "../model/ModelUser.php";
require_once "../utils/Utils.php";

class ViewUser
{
    public static function ajoutUser()
    {
        isset($_POST['ajout']) ? $formSubmit = true : $formSubmit = false;
?>
        <div class="container mt-2">
            <div class="text-center" id='erreurs'></div>
            <form name="ajout_user" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nom" id="nom" class="form-control" aria-describedby="nom" value="<?php echo $formSubmit ? $_POST['nom'] : '' ?>" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <input type="text" name="prenom" id="prenom" class="form-control" aria-describedby="prenom" value="<?php echo $formSubmit ? $_POST['prenom'] : '' ?>" placeholder="Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="mail" id="mail" class="form-control" aria-describedby="mail" value="<?php echo $formSubmit ? $_POST['mail'] : '' ?>" placeholder="Adresse mail" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="tel" id="tel" class="form-control" aria-describedby="tel" value="<?php echo $formSubmit ? $_POST['tel'] : '' ?>" placeholder="Tel" required>
                </div>
                <div class="form-group">
                    <input type="text" name="adresse" id="adresse" class="form-control" aria-describedby="adresse" value="<?php echo $formSubmit ? $_POST['adresse'] : '' ?>" placeholder="Adresse" required>
                </div>
                <div class="form-group">
                    <input type="file" name="photo" id="photo" accept="image/jpg,.jpeg,.gif,.png" aria-describedby="photo" placeholder="Photo" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" aria-describedby="description" required><?php echo $formSubmit ? $_POST['description'] : '' ?></textarea>
                </div>

                <button type="submit" id="submit" name="ajout" class="btn btn-primary">Ajouter</button>
                <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
            </form>
        </div>
    <?php
    }
    public static function listeUsers() // cette methode permet l'affichage de la liste des users
    {
        $users = ModelUser::listeUsers(); // on affecte a la variable $users tout le tableau qui est associatif et on utilise une for each pour le parcourir
    ?>
        <table class="table container bg-light border  border-dark mt-2 ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <th scope="row" id="ajax"> <?php echo $user['id'] ?></th>
                        <td><img class="rounded-circle" src="../../uploads/<?php echo $user['photo'] ?>" width="80" height="80"> </td>
                        <td><?php echo $user['nom'] ?></td>
                        <td><?php echo $user['prenom'] ?></td>
                        <td><?php echo $user['mail'] ?></td>
                        <td><?php echo $user['tel'] ?></td>
                        <td><?php echo $user['adresse'] ?></td>
                        <td><?php echo $user['description'] ?></td>
                        <td>
                            <div><a class="btn btn-success col-12 " href="VoirProfil.php?id=<?php echo $user['id'] ?>">Voir profil </a>

                                <button type="button" class="btn btn-success mt-1 col-12 modif-user" href="ModifProfil.php?id=<?php echo $user['id'] ?>" data-toggle="modal" data-target="#modalModif">
                                    Modifier profil
                                </button>

                                <button type="button" class="btn btn-success mt-1 col-12 supp-user" data-toggle="modal" id="<?php echo $user['id'] ?>" data-target="#modal">
                                    Supprimer
                                </button>
                            </div>
                        </td>

                    </tr>

                <?php
                }

                ?>


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
                        <a class="btn btn-success lien-supp" href="" name="Supprimer">Supprimer</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Modif-->
        <div class="modal fade modal-modif" id="modalModif" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ModifUser</h5>
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


    <?php
    }
    public static function infoUser($id)
    {
        $users2 = ModelUser::getUser($id);


    ?>
        <div class="col-5"></div>
        <div class="container mb-2 col-2">
            <div class=" card text-left" style="width: 18rem;">
                <div class="text-center"> <img class="rounded-circle" src="../../uploads/<?php echo $users2['photo'] ?>" width="150" height="150"></div>
                <div class="card-body">
                    <h5 class="card-title">Nom:<?php echo " " . $users2['nom'] ?></h5>
                    <p class="card-text"><b>Id:</b><?php echo " " . $users2['id'] ?></p>
                    <p class="card-text"><b>Prenom:</b><?php echo " " . $users2['prenom'] ?></p>
                    <p class="card-text"><b>Mail:</b><?php echo " " . $users2['mail'] ?></p>
                    <p class="card-text"><b>Tel:</b><?php echo " " . $users2['tel'] ?></p>
                    <p class="card-text"><b>adresse:</b><?php echo " " . $users2['adresse'] ?></p>
                    <p class="card-text"><b>Description:</b><?php echo " " . $users2['description'] ?></p>

                </div>
            </div>
        </div>
        <div class="col-5"></div>





    <?php
    }
    public static function modifForm($id)
    {
        $users3 = ModelUser::getUser($id);
        isset($_POST['modif']) ? $formSubmit = true : $formSubmit = false;
    ?>
        <div class="text-center" id='erreurs'></div>
        <div class="container mt-2">
            <img src="<?php echo  "../../uploads/" . $users3['photo'] ?>" width="70" />

            <form name="ajout_user" id='form2' method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $formSubmit ? $_POST['id'] : $users3['id'] ?>">
                <div class="form-group">
                    <input type="text" name="nom" id="nom2" class="form-control" aria-describedby="nom" placeholder="Nom" value="<?php echo $formSubmit ? $_POST['nom'] : $users3['nom'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" name="prenom" id="prenom2" class="form-control" aria-describedby="prenom" placeholder="Prénom" value="<?php echo $formSubmit ? $_POST['prenom'] : $users3['prenom'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="email" name="mail" id="mail2" class="form-control" aria-describedby="mail" placeholder="Adresse mail" value="<?php echo $formSubmit ? $_POST['mail'] : $users3['mail'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="tel" id="tel2" class="form-control" aria-describedby="tel" placeholder="Tel" value="<?php echo $formSubmit ? $_POST['tel'] : $users3['tel'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" name="adresse" id="adresse" class="form-control" aria-describedby="adresse" placeholder="Adresse" value="<?php echo $formSubmit ? $_POST['adresse'] : $users3['adresse'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="file" name="fichier" id="fichier" accept="image/*" aria-describedby="fichier" placeholder="fichier">
                </div>
                <input type="hidden" class="form-control" id="photo2" name="photo" value="<?php echo $formSubmit ? $_POST['photo'] : $users3['photo'] ?>" required>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" aria-describedby="description" required> <?php echo nl2br($users3['description']) ?></textarea>
                </div>

                <button type="submit" name="modif" id="modif" class="btn btn-primary">Modifier</button>
                <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
            </form>
        </div>

    <?php }
    public static function forminscription() // inscription connexion
    {
    ?>
        <form class="container text-center mt-5 " method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <h5> Connexion</h5>

            <div class="form-group">
                <input type="email" id="mail" class="fadeIn second" name="mail" placeholder="login">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">

            </div>
            <div><input type="submit" name="log-in" class="fadeIn fourth" value="Creer"></div>


        </form>
<?php }
}
