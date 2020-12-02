<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- TITRE -->
    <title>Mot de Passe Oublié</title>
    <!-- BOOSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <!-- FORMULAIRE MOT DE PASSE OUBLIE -->
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <!-- titre du formulaire -->
                    <h2 class="text-center">Mot de passe oublié</h2>
                    <!-- Indications -->
                    <p class="text-center">Veuillez entrer votre adresse mail</p>
                    <!-- Erreur -->
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <!-- saisi de l'email -->
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Entrez votre Email" required value="<?php echo $email ?>">
                    </div>
                    <!-- bouton pour continuer -->
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continuer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>