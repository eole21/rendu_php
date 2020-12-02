<?php

session_start();
require "db.php";

$act = $_GET['action'];



if(isset($act) && ($act=="delete")){

    $supprimeid = $pdo->prepare("DELETE FROM `friends` WHERE `id` = ".$_GET['id']);
    $supprimeid->execute([
        ':id'=>$_GET['id'],
    ]);
        header('Location:index.php');
       }



    // if(isset($act) && ($act=="add")){

    //     // $pdo->exec("INSERT INTO friends (username_1, username_2, is_pending) VALUES (:username_1, :username_2, :is_pending)");
    //     //':is_pending'=>$_GET['is_pending'];

    // $addid = $pdo->prepare("INSERT INTO friends (username_1, username_2, is_pending) VALUES (:username_1,:username_2, ".$_GET['is_pending']);
    // $addid->execute(array(
    //     'username_1' => $_SESSION['user'],
    //     'username_2' => $_GET['username'],
    //     $_GET['is_pending'] == true
    // ));
    // // `id` = ".$_GET['id'] ."WHERE `id` = ".$_GET['id']);
    // echo $_GET['is_pending'];
    //  var_dump ($_GET['username']);
    // //header('Location:index.php');

    //    }else{
    //             echo "(pb add)";
    //         }





            if(isset($act) && ($act=="add")){
        
            $addid = $pdo->prepare("INSERT INTO friends (id, username_1, username_2, is_pending) VALUES (:id,:username_1,:username_2, :is_pending)");
            $addid->execute([
                'username_1' => $_SESSION['user'],
                'username_2' => $_GET['username'],
                'is_pending' => true,
            ]);
            echo $_GET['is_pending'];
            //header('Location:index.php');
        
               }else{
                        echo "(pb add)";
                    }















    // if(isset($act) && ($act=="accept")){

    //     $pdo->query("UPDATE friends SET is_pending = 1 WHERE id = ".$_GET['id']);
    //     //var_dump($pdo);
    //     //header('Location:index.php');
    //     echo "(ok accept)";
    // }else{
    //          //echo "(pb accept)";
    //      }

    // if($act=="accept"){
    //     $pdo->query("UPDATE friends SET is_pending = 0 WHERE id = ".$_GET['id']);

    //     header('Location:index.php');
    // }else{
    //     echo "(pb accept)";
    // }
        


// SELECT username FROM users ORDER BY id DESC where username not in (SELECT * FROM friends WHERE username_1 = username_1 OR username_2 = username_2)


?>