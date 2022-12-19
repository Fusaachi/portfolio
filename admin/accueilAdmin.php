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
<title>Console d'administration</title>
<?php
    include("../assets/inc/headerBack.php");
    echo"<pre>";
        var_dump($_SESSION);
    echo"</pre>";
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <h4>Bienvenue <?=$_SESSION["prenom"]?> sur le back-office</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <form action="../core/userController.php" method="post">
                    <input type="hidden" name="faire" value="log-out">
                    <button class="btn bg-black text-white fw-bold"type="submit" name="soumettre">Se déconnecter</button>
                </form>
            </div>
        </div>
    </div> 
</main>

<?php
    include("../assets/inc/footerBack.php")
?>