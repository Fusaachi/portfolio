<?php
    include("../assets/inc/headBack.php");

    //Vérifions si l'utilisateur a le droit d'accéder à la page
if  (!isset($_SESSION["isLog"],$_SESSION["role"],$_SESSION["prenom"]) || !$_SESSION["isLog"]  || $_SESSION["role"]!= 1){
    //L'utilisateur n'as pas le droit : redirigeons-le!
    $_SESSION["message"] = "Merci de vous connecter.";
    header("Location:../admin/index.php");
    exit;
}
?>
<title>Modifier les utilisateurs</title>
<?php
    include("../assets/inc/headerBack.php");
    // choix de l'id de l'utilisateur à afficher 
$id = $_GET["id_user"];
require("../core/connexion.php");
$sql = " SELECT `id_user`, `nom`, `prenom`, `email`, `role`
        FROM user
        WHERE id_user = $id";
$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
$user = mysqli_fetch_assoc($query);
/*TODO :
    1) Afficher les informations de l'utilisateur sur la page
    2) Afficher un utilisateur en fonction de son id quand on clique dessus depuis la liste des utilisateurs (listUsers.php)
            Indices : paramètre GET Dans l'url*/
?>
<main>
    <div class="container">
        <div class="text-center mt-5 mb-5">
            <h4 class="mt-5">Modifier l'utilisateur</h4>
            <!-- gestion de l'affichage des messages -->
            <div class="row">
                <?php
                if(isset($_SESSION["message"])):
                    echo '<div class="alert alert-danger" >' . $_SESSION["message"]  . '</div';
                    // on efface la clé message, une fois qu'elle a été affichée avec unset()
                    unset($_SESSION["message"]);
                endif;
                ?>
            </div>
            <div class="container">            
                <form method="POST"  action="../core/userController.php" class="text-start">
                    <input type="hidden" name ="faire" value="update">

                    <input type="hidden" name="id" value="<?= $user["id_user"]; ?>">

                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" class="form-control mb-2" value="<?= $user["nom"]; ?>">

                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" class="form-control mb-2" value="<?= $user["prenom"]; ?>">

                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" class="form-control mb-2" value="<?= $user["email"]; ?>">

                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" class="form-control mb-2">

                    <label for="role">Role :</label>
                    <select name="role" id="role" class="mb-3 form-control">
                        <option value="2" <?php if($user["role"] == 2){
                            echo "selected";} 
                            ?>>Utilisateur</option>
                        <option value="1" <?php if($user["role"] == 1){
                            echo "selected";} 
                            ?>>Administrateur</option>
                    </select>
                    <input type="submit" class="btn bg-white">
                </form>
            </div>
        </div>  
    </div>
</main>

<?php
    include("../assets/inc/footerBack.php")
?>