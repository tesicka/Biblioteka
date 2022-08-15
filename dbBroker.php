<?php
$server="localhost";
$database="biblioteka";
$user="root";
$password="";

$connection=new mysqli($server,$user,$password,$database);

if($connection->connect_errno){
    exit("Neuspesno konektovanje");
}

?>
