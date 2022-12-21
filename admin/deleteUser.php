<?php
include("../assets/inc/headBack.php");

//Vérifions si l'utilisateur a le droit d'accéder à la page
if (!isset($_SESSION["isLog"], $_SESSION["role"], $_SESSION["prenom"]) || !$_SESSION["isLog"]  || $_SESSION["role"] != 1) {
    //L'utilisateur n'as pas le droit : redirigeons-le!
    $_SESSION["message"] = "Merci de vous connecter.";
    header("Location:../admin/index.php");
    exit;
}
?>
<title>Supprimer les utilisateurs</title>
<?php
include("../assets/inc/headerBack.php");
// choix de l'id de l'utilisateur à afficher 
?>
<main>
    <div class="container text-center">
        <h2>Suppression de l'utilisateur</h2>
        <?php
        $id = $_GET["id_user"];
        require("../core/connexion.php");
        $sql = "SELECT `id_user`, `nom`, `prenom`, `email`, `role`
        FROM `user`
        WHERE `id_user` = $id
        ";
        $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
        $user = mysqli_fetch_assoc($query);
        ?>
        <h4>Attention vous êtes sur le point de supprimer l'user <?php echo $user["nom"] ." " . $user["prenom"] . " :( "?> </h4>
        <a type="button" class="btn bg-white mt-5"  href="../admin/listUser.php">Retour liste</a>
        <form action="../core/userController.php" method="POST">
            <input type="hidden" name="faire" value="delete-user">
            <input type="hidden" name="id" value="<?= $user["id_user"]?>">
            <button type="submit" class="btn bg-white mt-3">Supprimer</button>
        </form>
    </div>
</main>

<?php
include("../assets/inc/footerBack.php")
?>