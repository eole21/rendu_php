<?php 
session_start();
require "database.php";
$email = "";
$name = "";
$errors = array();

//Lorsque l'utisation clique sur le bouton d'inscription
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    //On verifie si les mot de passe correspondent
    if($password !== $cpassword){
        $errors['password'] = "Les mot de passe ne correspondent pas!";
    }
    //On verifie si l'email n'est pas déjà enregistré
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Cet email est déjà enregistré!";
    }
    //Enregistrement des données dans la bdd
    if(count($errors) === 0){
        //cryptage
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        //creation d'un code random
        $code = rand(999999, 111111);
        //status initialisé à nom verifié par defaut
        $status = "notverified";
        //insertion dans la bdd
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        //Envoi du code de verification
        if($data_check){
            $subject = "Code de verification";
            $message = "Votre code de verification est $code";
            $sender = "From: tabstorex.fb@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Un code de verification a été envoyé à votre email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Echec d'envoi du code!";
            }
        }else{
            $errors['db-error'] = "Echec d'insertion des données dans la base de données !";
        }
    }

}
    //Lorsque l'utilisation clique sur le bouton de confirmation après avoir rentré le code de verification
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        //verfication du code entré
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            //changement du status dans la bdd
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: welcome.php');
                exit();
            }else{
                $errors['otp-error'] = "Echec !";
            }
        }else{
            $errors['otp-error'] = "Vous avez entré un code incorrect!";
        }
    }

    //Lorsque l'utilisateur clique sur le bouton de connexion
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header('location: welcome.php');
                }else{
                    $info = "Votre email est toujours en cours de verification - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Mot de passe ou mail incorrect!";
            }
        }else{
            $errors['email'] = "Vous n'etes pas membre ! Click on the bottom link to signup.";
        }
    }

    //Lorsque l'utilisateur clique bouton continuer dans le form de mot de passe oublié
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Code de Renitialisation de mot de passe";
                $message = "Votre code est $code";
                $sender = "From: tabstorex.fb@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "Un code a été envoyé otp dans votre boite mail - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Echec d'envoi du code!";
                }
            }else{
                $errors['db-error'] = "Un problème est survenue!";
            }
        }else{
            $errors['email'] = "Cet email n'existe pas!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Merci de creer un nouveau mot de passe jamais utilisé.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "Vous avez rentré un code incorrect";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Le mot de passe ne correspond pas!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Ton code a été changé. Vous pous vous reconnecter avec votre nouveau mot de passe.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Echec lors du changement de mot passe!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>