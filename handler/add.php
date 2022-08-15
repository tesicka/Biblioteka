<?php

require "../dbBroker.php";
require "../iznajmljivanje.php";

session_start();
if(isset($_POST["knjiga"]) && isset($_POST["autor"]) && isset($_POST["vrsta"])) {
    $novi = new Iznajmljivanje(null, $_POST["knjiga"], $_POST["autor"], $_POST["vrsta"], $_SESSION["id_korisnik"]);  // mislim da ce morati da unosi svoj ID
    $status = Iznajmljivanje::add($novi,$connection);
    if($status) {
        echo "Success";
    } else {
        echo $status."Failed";
    }
} 

?>