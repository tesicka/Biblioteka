<?php
$server="localhost";
$database="biblioteka";
$user="user";
$password="";

$connection=new mysqli($server,$user,$password,$database);

if($connection->connect_errno){
    exit("Neuspesno konektovanje");
}

?>
