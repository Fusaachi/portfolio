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
                <h4 class="mb-5" >Bienvenue,<br> sur la liste des utilisateurs inscrits</h4>
            </div>
        </div>
        <table class="table text-center">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>

                <?php foreach($users as $user) {
            /*TODO: Pour chaque utilisateurs, créer une nouvelle ligne(tr) et afficher ses informations dans des lignes */
                ?>  
                    <tr>
                        <td><?php echo $user["id_user"] ?></td>
                        <td><?php echo $user["nom"] ?></td>
                        <td><?php echo $user["prenom"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td><?php  $user["role"] ;
                            if($user["role"] == 1){
                                echo "Administrateur";
                            } else {
                                echo "Utilisateur";
                            }
                        ?></td>
                        <td><a class="btn p-0 m-0" href="http://localhost/sitePhpProcedural/admin/updateUser.php?id_user=<?=  $user['id_user']?>"> Modifier</a> /
                            <a class="btn p-0 m-0 " href="http://localhost/sitePhpProcedural/admin/readUser.php?id_user=<?=  $user['id_user']?>">Détails</a> /
                            <a class="btn p-0 m-0" href="http://localhost/sitePhpProcedural/admin/deleteUser.php?id_user=<?=  $user['id_user']?>">Supprimer</a></td>

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