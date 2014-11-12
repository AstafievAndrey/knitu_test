<?php
require 'class.php';
if ($_SESSION['aut']=='no'){
    $_SESSION=array();
    session_destroy();
}


