<?php include('database_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/liste_des_sondages.css">
    <title>liste des sondages</title>
</head>
<body>
    <header> <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="welcome.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
                    <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>> <a href="welcome.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
                    <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>> <a href="welcome.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
                    <li <?php if(@$_GET['q']==4) echo'class="active"'; ?>> <a href="admin.php?q=4"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;Créer son quizz</a></li>
                    <li <?php if(@$_GET['q']==5) echo'class="active"'; ?>> <a href="tchat.php?q=5"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Résultats/Tchat</a></li>
                    <li <?php if(@$_GET['q']==5) echo'class="active"'; ?>> <a href="index2.php?q=6"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Sondage</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">  </header>
    <main>
    <div id="titre"><h1>liste des sondages</h1></div>
   <?php  $sondage= $db -> query("SELECT * FROM sondage;");  ?> <!--selection de tous les élément de la table sondage-->
        <section id="tb1">
     <table id="tb"><!-- tableau d'affichage de la liste dessondages-->
         <thead><!--en tête du tableau-->
             <tr>
                 <th class="th">ID</th>
                 <th class="th" >PSEUDO DU CREATEUR</th>
                 <th class="th">TITRE DU SONDAGE</th>
                 <th class="th">QUESTION</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($sondage as $sondages) : ?><!--élément du tableau// boucle foreach pour parcourir tous les éléments du
                 tableau-->
             <tr>
            
                <td id="id"><?= $sondages["id"]; ?></td>
                <td><?= $sondages["pseudo"]; ?></td>
                <td ><a href="sondages_index.php?sondage=<?= $sondages["titre_sondage"]; ?>&amp;question=<?= $sondages["question"]; ?>&amp;choix1=<?= $sondages["choix1"]; ?>&amp;choix2=<?= $sondages["choix2"]; ?>&amp;choix3=<?= $sondages["choix3"]; ?>&amp;choix4=<?= $sondages["choix4"]; ?>&amp;choix5=<?= $sondages["choix5"]; ?>"><?= $sondages["titre_sondage"]; ?></a></td>
                <td><?= $sondages["question"]; ?></td>
             </tr>
             <?php endforeach; ?><!--Arrêt de la boucle foreach parce que j'ai utilisé sa syntaxe alternative qui s'écrit avec des 
             acolades-->
         </tbody>
     </table>
     </section>
    </main>
    <footer>
     <?php require "footer.php"?> <!-- bas de page-->
     </footer>
     <script type= "text/javascript" src="liste.js"></script>
</body>
</html>
   
