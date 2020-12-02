<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code de Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
               <!-- TITRE FORMULAIRE -->
                <form action="reset-code.php" method="POST" autocomplete="off">
                   <!-- titre -->
                    <h2 class="text-center">Code de verification</h2>
                    <!-- affichage des messages erreurs ou succès -->
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- saisi du code de verification -->
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Entrez le code" required>
                    </div>
                    <!-- bouton -->
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-reset-otp" value="Valider">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>