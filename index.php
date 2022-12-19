<?php
include("assets/inc/headerFront.php");
?>
    <title>Portfolio</title>
<?php 
    include("assets/inc/headFront.php");
?>

    <main>
    
    <div class="container">
        <div class="row">
            <?php
            if(isset($_SESSION["message"])){
                echo '<div class="alert alert-sucess" role="alert">' .$_SESSION["message"] . "</div>";
                //on efface la clé message, un fois qu'elle a été affiche avec unset()
                unset($_SESSION["message"]);
            }
            ?>
        </div>
    </div>
        
    </main>

<?php
include("assets/inc/footerFront.php");

?>