<?php 
session_start();
if($_POST['Mode']=="Set"){
    $_SESSION["ModeTable"]=$_POST['x'];
}

?>