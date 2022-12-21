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
            <h4>Détails de l'utilisateur :  <?php echo $user["nom"] ?></h4>   
            <?php echo"Bienvenue sur le compte de l'utilisateur numéro ". $user["id_user"] . "<br>";
                echo"Nom : " . $user["nom"] . "<br>";
                echo"Prénom : " . $user["prenom"] . "<br>";
                echo"Email : " . $user["email"] . "<br>";
                $user["role"] ;
                if($user["role"] == 1){
                    echo "Rôle : Administrateur";
                } else {
                    echo "Rôle : Utilisateur";
                }
            ?> 
        </div>  
    </div>
</main>

<?php
    include("../assets/inc/footerBack.php")
?>