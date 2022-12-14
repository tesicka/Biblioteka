


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <title>Prijava na online biblioteku</title>

    <style>
body{
  background-image: url("img/background.jpg");
  background-size: 100% 100%; 
  background-repeat: no-repeat;
  background-attachment: fixed;
}
.form{
    border: 1px solid #48bf53;
    padding: 50px,50px;
    margin-top: 280px;
    margin-left: 45px;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 30px;
    -webkit-box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.75);
-moz-box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.75);
box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.75);
}

.err{
    color:white;
}

</style>
    

</head>
<body>
<?php

require "dbBroker.php";
 require "user.php";
 session_start();
 
 $username="";
 $password="";
 if(isset($_POST['username']) && isset($_POST['password'])){
    if (isset($_SESSION['id_korisnik'])) {
        header("Location: home.php");
    }
    $response=User::logIn($_POST['username'], $_POST['password'], $connection);
    
    if ($response) {
        header("Location: home.php");
    }
}
?>

<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-sm-4 col-xs-12">
        <form class="form" action="#" method="post">
            <h1 style="color:#fff;">Prijava</h1>
                <div class="form-group">
                    <label for="username" style="color:#48bf53;">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password" style="color:#48bf53;">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="err">
                    <?php if (isset($_POST['err'])) {
                        print_r($_POST['err']);
                    }?>
                </div>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
                </form>

        </div>
        <div class="col-md-4 col-sm-4 col-xs-12"></div>

    </div>
</div>
</body>
</html>