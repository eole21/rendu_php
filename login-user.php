<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- TITRE -->
    <title>Connexion</title>
    <!-- BOOSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                <!--Titre du formulaire-->
                    <h2 class="text-center">CONNEXION</h2>
                    <!--indications du formulaire-->
                    <p class="text-center">Veuillez vous connecter avec votre email et mot de passe</p>
                    <!-- les erreurs -->
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
                    <!-- email -->
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" required value="<?php echo $email ?>">
                    </div>
                    <!-- mot de passe -->
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Mot de passe" required>
                    </div>
                    <!-- lien form mot de passe oublié -->
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Mot de passe oublié ?</a></div>
                    <!-- bouton de connexion -->
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Connexion">
                    </div>
                    <!-- lien pour s'inscrire -->
                    <div class="link login-link text-center">Pas encore membre ? <a href="signup-user.php">S'inscrire</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>