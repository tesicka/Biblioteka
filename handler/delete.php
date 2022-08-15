<?php

require_once "../dbBroker.php";
require_once "../iznajmljivanje.php";

if(isset($_POST['id_pozajmice'])) {
    $knjiga = new Iznajmljivanje($_POST['id_pozajmice']);
    $status = $knjiga->delete($connection);
    if ($status){
        echo "Success";
    } else{
        echo "Failed";
    }
}

?>