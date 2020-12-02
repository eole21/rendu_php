<?php

    session_start();
    require 'db.php';
    //on regarde si c'est l'utilisateur un ou deux
    $query = $pdo->prepare("SELECT * FROM friends WHERE username_1 = username_1 OR username_2 = username_2");
    
    $query->execute([
        "username_1" => $_SESSION['user'],
        "username_2" => $_SESSION['user']
    ]);
        //on recupere les infos
    $data = $query->fetchAll();
    
    if($_SESSION['user']){

      $user_check[] = $_SESSION['user'];
    }
    ?>

<?php
 require 'db.php';
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:login.php");
                   }
                }
                else if($_SESSION['user'] !== ""){
                    $user = $_SESSION['user'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Page recherche amis</title>
    
</head>
<body>
    <header>
        
    <div id="content">
            
            <a href='index.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            
            
        </div>
    </header>




    <?php
  
 $lespseudos = $pdo->query('SELECT * FROM users ORDER BY id DESC ');
 if(isset($_GET['q']) AND !empty($_GET['q'])) {
   //on applique la fonction htmlspecialchars
   // pour éliminer toute attaque de type injection SQL et XSS
    $q = htmlspecialchars($_GET['q']);
    $lespseudos = $pdo->query('SELECT * FROM users WHERE username LIKE "%'.$q.'%" ORDER BY id DESC');
 }
 ?>
 <form autocomplete="off" method="GET" class="formSearch">
 <div class="autocomplete">
    <input type="search" name="q" placeholder="Recherche..." />
    </div>
    <input type="submit" value="Valider" />
 </form>
 <?php if($lespseudos->rowCount() > 0) { ?>
    <ul>
    <?php while($a = $lespseudos->fetch()) { ?>
       <li><?= $a['username']. " <a href='action.php?action=add&username=". $data[$i]['username']."'>Inviter en ami</a><br/>" ?></li>
    <?php } ?>
    </ul>
 <?php } else { ?>
 Aucun résultat pour: <?= $q ?>...
 <?php } ?>


     
     <article>

         <section class="gauche">
            <h2>Liste d'amis :</h2>

            <?php

for ($i=0; $i < sizeof($data); $i++){

    if($data[$i]['username_1'] == $_SESSION['user']){

        echo $data[$i]['username_2']. " <a href='action.php?action=delete&id=". $data[$i]['id']."'>Supprimer</a>";
        $user_check[] = $data[$i]['username_2'];

        if($data[$i]['is_pending'] == true)

            echo "(en attente d'être accepté)";
   }else{
            //a recu une demande mais pas accepté

         if($data[$i]['is_pending'] == false){

                echo $data[$i]['username_1']. " <a href='action.php?action=delete&id=". $data[$i]['id']."'>Supprimer</a>";
                $user_check[] = $data[$i]['username_1'];
            }
    }

    echo'<br />';
}


?>


            <h2>Demande en attente :</h2>

<?php

for ($i=0; $i < sizeof($data); $i++){

    if($data[$i]["is_pending"] == true && $data[$i]['username_2'] == $_SESSION['user']){

        echo $data[$i]['username_1']. " <a href='action.php?action=accept&id=". $data[$i]['id']."'>Accepter</a> <a href='action.php?action=delete&id=". $data[$i]['id']."'>Refuser</a>";
        $user_check[] = $data[$i]['username_1'];
    }
}
?>



         </section>

         <section class="droite">
            <h2>Mes amis actuellement connectés:</h2>


            <h2>Mes amis déconnectés:</h2>


         </section>
     </article>


    
</body>
</html>