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

<title>Console d'administration</title>
<?php
include("../assets/inc/headerBack.php");
?>
<main>
    <!-- gestion de l'affichage des messages -->
    <div class="row">
        <?php
        if (isset($_SESSION["message"])) :
            echo '<div class="alert alert-success" >' . $_SESSION["message"]  . '</div';
            // on efface la clé message, une fois qu'elle a été affichée avec unset()
            unset($_SESSION["message"]);
        endif;
        ?>
    </div>
    <div class="container">
        <div class="text-center ">
            <h1>Bienvenue sur le back-office,<br> <?= $_SESSION["prenom"] ?> </h1>
        </div>
    </div>
</main>
<div>
    <?php
    include("../assets/inc/footerBack.php")
    ?>
</div>