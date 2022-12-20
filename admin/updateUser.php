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
<title>Modification des utilisateurs</title>
<?php
    include("../assets/inc/headerBack.php");
    // choix de l'id de l'utilisateur à afficher 
$id = 1;
require("../core/connexion.php");
$sql = " SELECT `id_user`, `nom`, `prenom`, `email`, `role`
        FROM user
        WHERE id_user = $id";
$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
$user = mysqli_fetch_assoc($query);
echo"<pre>";
    var_dump($user);
echo"</pre>"
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5 mb-5">
                <h4>Bienvenue <?=$_SESSION["prenom"]?> sur le back-office</h4>
            </div>
        </div>

            <div class="text-center">
                <form action="../core/userController.php" method="post">
                    <input type="hidden" name="faire" value="log-out">
                    <button class="btn bg-black text-white fw-bold"type="submit" name="soumettre">Se déconnecter</button>
                </form>
        </div>
    </div> 
</main>

<?php
    include("../assets/inc/footerBack.php")
?>