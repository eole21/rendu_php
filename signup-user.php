<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <!-- BOOSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
            <!--FORMULAIRE INSCRIPTION -->
                <form action="signup-user.php" method="POST" autocomplete="">
                <!-- titre du formulaire -->
                    <h2 class="text-center">Inscription</h2>
                    <!-- indication du formulaire -->
                    <p class="text-center">Creer un compte</p>
                    <!-- Les erreurs -->
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Nom complet -->
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Nom complet" required value="<?php echo $name ?>">
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" required value="<?php echo $email ?>">
                    </div>
                    <!-- mot de passe -->
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Mot de Passe" required>
                    </div>
                    <!-- confirmation du mot de passe -->
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirmez le mot de passe" required>
                    </div>
                    <!-- bouton inscription -->
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="S'incrire">
                    </div>
                    <!-- lien connexion membre -->
                    <div class="link login-link text-center">Déjà membre ? <a href="login-user.php">Se connecter</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>