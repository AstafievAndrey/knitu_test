<?php
require 'class.php';
if (isset($_SESSION['aut'])&&isset($_SESSION['rating'])){
echo $_SESSION['rating'];
$_SESSION=array();
session_destroy();
}else header('location:index.php');
