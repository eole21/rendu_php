<?php

session_start();
require "db.php";

$act = $_GET['action'];
//ce code permet de supprimer la relation entre deux personnes
if(isset($act) && ($act=="delete")){
//on supprime une colonne qui correspond à l'id de l'élément 
    $supprimeid = $pdo->prepare("DELETE FROM `friends` WHERE `id` = ".$_GET['id']);
    $supprimeid->execute([
        ':id'=>$_GET['id'],
    ]);
        header('Location:index.php');
       }
//cette ligne permet d'ajouter la relation entre deux personnes 
            if(isset($act) && ($act=="add")){
        //on ajoute une ligne pour créer une relation entre deux personnes
            $addid = $pdo->prepare("INSERT INTO friends (id, username_1, username_2, is_pending) VALUES (:id,:username_1,:username_2, :is_pending)");
            
            //username_1 devient le nom de la personne qui est connectée
            //username_2 devient le nom de la personne qu'on a ajouté
            //is_pending devient 1 pour créer la relation
            $addid->execute([
                'username_1' => $_SESSION['user'],
                'username_2' => $_GET['username'],
                'is_pending' => 1,
            ]);
            header('Location:index.php');
        
               }


//cette ligne permet d'accepter la demande d'ajout d'ami
    if(isset($act) && ($act=="accept")){
        //permet de mettre à jour la relation entre deux personnes si elle est acceptée
        $pdo->query("UPDATE friends SET is_pending = 1 WHERE id = ".$_GET['id']);
        header('Location:index.php');
    }

?>