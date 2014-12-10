<?php
require 'class.php';
if (isset($_POST['login'])){
    $con = Db::getInstance();
    $con->autorize($_POST['login']);
}
?>
