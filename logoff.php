<?php
session_start();
if (isset($_SESSION["id"])){
    $_SESSION["id"]=null;
}
header("Refresh:0");
header("Location:index.php")

?>