<?php include('database_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/creation.css">
    <title>creationde sondage</title>
</head>
<body>
    <header></header>
    <main>
    <Section id="formulaire">   <!--Formulaire d\'uplod d\'article -->
      <div class="formu">
      <form method=post  action="creation_de_sondage.php" >
      <h1>Créé votre sondage</h1> 
                        <div class = "a"><p><input type="text" name="pseudo" placeholder="Votre pseudo..."/></p></div>
                        <div class = "b"><P><input type="text" name="title" placeholder="Titre du sondage..."/></p></div>
                        <div class = "c"><p><input type="text" name="question" placeholder="Votre question..."/></p></div>
                        <div class = "r"><p><input type="text" name="reponse1" placeholder="Choix 1..."/></p></div>
                        <div class = "r"><p><input type="text" name="reponse2" placeholder="Choix 2..."/></p></div>
                        <div class = "r"><p><input type="text" name="reponse3" placeholder="Choix 3..."/></p></div>
                        <div class = "r"><p><input type="text" name="reponse4" placeholder="Choix 4..."/></p></div>
                        <div class = "r"><p><input type="text" name="reponse5" placeholder="Choix 5..."/></p></div>
                       
                        <div><button type="submit" id="validation" name="Envoyer">Envoyer</button> </div>    
                 </form>
              </div>
      </Section>   
    </main>
    <?php
    $db= mysqli_connect("localhost", "root", "root","exam");
    if (isset($_POST['Envoyer'])) { 
       $titre_sondage= $_POST['title']; 
       $pseudo= $_POST['pseudo'];        
       $reponse1= $_POST['reponse1']; 
       $reponse2= $_POST['reponse2']; 
       $reponse3= $_POST['reponse3']; 
       $reponse4= $_POST['reponse4']; 
       $reponse5= $_POST['reponse5']; 
       $question= $_POST['question']; 

       $sql = "INSERT INTO sondage ( pseudo, titre_sondage, question, choix1, choix2,choix3,choix4,choix5) VALUES ( '$pseudo', '$titre_sondage', '$question', '$reponse1', '$reponse2','$reponse3','$reponse4','$reponse5'); ";
   
       mysqli_query($db, $sql);
    }    
        
        ?>
</body>
</html>