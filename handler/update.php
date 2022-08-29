<?php

require "../dbBroker.php";
require "../iznajmljivanje.php";

if(isset($_POST["id_korisnik"])) {

    $naziv = $_POST['knjiga'];
    $autor = $_POST['autor'];
    $vrsta = $_POST['vrsta'];
    $pozajmica = $_POST['id_pozajmice'];

    
    $result = mysqli_query($connection, "UPDATE iznajmljivanje SET knjiga='$naziv', autor='$autor', vrsta='$vrsta' WHERE id_pozajmice='$pozajmica'");
    if($result) {
        echo "Success";
    } else {
        echo "Failed";
    }
}

?>