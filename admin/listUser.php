<?php
include("../assets/inc/headBack.php");
//Vérifions si l'utilisateur a le droit d'accéder à la page
if (!isset($_SESSION["isLog"], $_SESSION["role"], $_SESSION["prenom"]) || !$_SESSION["isLog"]  || $_SESSION["role"] != 1) {
    //L'utilisateur n'as pas le droit : redirigeons-le!
    $_SESSION["message"] = "Merci de vous connecter.";
    header("Location:../admin/index.php");
    exit;
}
require("../core/connexion.php");
$sql = "SELECT `id_user`, `nom`, `prenom`, `email`, `role`
        FROM `user`
        ";
$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
$users =mysqli_fetch_all($query, MYSQLI_ASSOC);



?>
<title>Liste des utilisateurs inscrit</title>
<?php
include("../assets/inc/headerBack.php");

?>
<main>

    <div class="container">
        <div class="row ">
            <div class="col-4 mt-5">
                <h4 class="mb-5" >Bienvenue,<br> sur la liste des utilisateurs inscrit</h4>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Role</th>

                <?php foreach($users as $user) {
            /*TODO: Pour chaque utilisateurs, créer une nouvelle ligne(tr) et afficher ses informations dans des */
                ?>  
                    <tr>
                        <th><?php echo $user["id_user"] ?></th>
                        <th><?php echo $user["nom"] ?></th>
                        <th><?php echo $user["prenom"] ?></th>
                        <th><?php echo $user["email"] ?></th>
                        <th><?php  $user["role"] ;
                            if($user["role"] == 1){
                                echo "Administrateur";
                            } else {
                                echo "Utilisateur";
                            }
                        ?></th>
                    </tr>
            <?php
           
        }
        ?>
            </tr>
        </table>
        <a href="/sitePhpProcedural/admin/createUser.php"class=" mt-2 mb-5 text-white" type="submit" name="new" >Ajouter un nouvel utilisateur</a>
    </div>
</main>

<?php
include("../assets/inc/footerBack.php");
?>