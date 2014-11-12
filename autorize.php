<?php
require 'class.php';
if (isset($_POST['login']) && isset($_POST['pass'])){
    $con = Db::getInstance();
    $con->autorize($_POST['login'],$_POST['pass']);
}
?>
