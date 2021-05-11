<?php
require_once "../model/ModelUser.php";
require_once "../utils/Utils.php";
class ViewLogin
{
    public static function connexion()
    {
?>
        <form class="container text-center mt-5 " id="formConnexion" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <h5> Connexion</h5>

            <div class="form-group">
                <input type="email" id="mail" class="fadeIn second" name="mail" placeholder="login">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">

            </div>
            <div><input type="submit" name="connexion" class="fadeIn fourth" value="Connexion"></div>


        </form>


<?php }
}
