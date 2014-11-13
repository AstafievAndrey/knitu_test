<?php
require 'class.php';
Db::rightAutorize();
if (isset($_POST['question']) && isset($_POST['type'])&& isset($_POST['answer'])){
    $rat=Db::getInstance();
    $rat->rating($_POST['question'],$_POST['type'],$_POST['answer']);
    if($_SESSION['count']<5){
        header('location:test.php');
    }else{
        $rat->saveRating($_SESSION['user'],$_SESSION['rating']);
        $_SESSION=array();
        header('location:index.php');
    }
}


