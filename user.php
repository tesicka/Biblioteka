<?php

class User{
    public $id_korisnik;
    public $username;
    public $password;

    public function _construct($id_korisnik=null, $username=null, $password=null){
        $this->id_korisnik=$id_korisnik;
        $this->username=$username;
        $this->password=$password;
    }

    public static function logIn($username, $password, mysqli $connection ){
        $query="SELECT * FROM korisnik WHERE username='$username';";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['password'] == $password){
                    $_SESSION['id_korisnik']=$row['id_korisnik'];
                    return true;
                }
            }
        }else{
            $_POST['err']="Pogresna lozinka";
            return false;
        }
    }
}

?>