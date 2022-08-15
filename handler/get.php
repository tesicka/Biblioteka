<?php

require "../dbBroker.php";
require "../iznajmljivanje.php";

if(isset($_POST["id"])) {
    $niz = Iznajmljivanje::find($_POST["id"],$connection);
    echo json_encode($niz);
}

?>