<?php

class Iznajmljivanje{
    public $id_pozajmice;
    public $knjiga;
    public $autor;
    public $vrsta;
    public $id_korisnik;

    public function __construct($id_pozajmice=null, $knjiga=null, $autor=null, $vrsta=null, $id_korisnik=null){
        $this->id_pozajmice=$id_pozajmice;
        $this->knjiga=$knjiga;
        $this->autor=$autor;
        $this->vrsta=$vrsta;
        $this->id_korisnik=$id_korisnik;
    }

    public static function show($connection){  // prikazi sve
        $query="SELECT * FROM iznajmljivanje";
        return $connection->query($query);
    }

    public function delete($connection){  // obrisi
        $sql = "DELETE FROM iznajmljivanje WHERE id_pozajmice=$this->id_pozajmice";
        return $connection->query($sql);
    }
    
    public function find(){  // pronadji sve
        $sql = "SELECT * FROM iznajmljivanje WHERE id_pozajmice=$this->id_pozajmice";
        $myObj = array();
        if($rez = $connection->query($sql)) {
            while($row = $result->fetch_array(1)){
                $myObj[]= $row;
            }
        }
        return $myObj;
        
    }
    public static function add($novi,$connection){   // dodaj
        $sql = "INSERT INTO iznajmljivanje (knjiga,autor,vrsta,id_korisnik) VALUES ('$novi->knjiga','$novi->autor', '$novi->vrsta', '$novi->id_korisnik')";
        return $connection->query($sql);
    }

    }


?>