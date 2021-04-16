<?php
class ViewTemplate
{
    public static function alert($message, $type, $lien)
    {
?>
        <div class="alert alert-<?php echo $type; ?>" role="alert">
            <?php echo $message; ?>
            <br />Cliquez <a href="<?php echo $lien ?>"> ici</a> pour continuer la navigation.
        </div>
    <?php
    }
    public static function footer()
    {
    ?>
        <footer class="bg-light text-center text-lg-start">
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);"><span>Portfolio Team ©<?php echo date("Y"); ?> </span></div>

        </footer>

    <?php }
    public static function menu()
    {
    ?><nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <a class="navbar-brand" href="#">Portfolio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="creationuser.php">creation user</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listeusers.php">Liste User</a>
                    </li>



                </ul>

            </div>
        </nav>
    <?php }
    public static function menuSoc()
    {
    ?><nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <a class="navbar-brand" href="CreationTypeSoc.php">Portfolio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="CreationTypeSoc.php">Ajouter un reseau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListeSoc.php">Listes des reseaux</a>
                    </li>
                </ul>

            </div>
        </nav>
<?php }
}
