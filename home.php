
<?php

    require "dbBroker.php";
    require "iznajmljivanje.php";
    session_start();
    if(!isset($_SESSION['id_korisnik'])){
        echo "ne moze";
        header("refresh:5;url=index.php");
    }
    else{
      //  echo "radi";
    //  $nizKorisnikovihKnjiga=getByKorisnik($_SESSION['id_korisnik'],$connection); samo da moze da gleda taj korisnik 
    
    $pozajmice = Iznajmljivanje::show($connection);

    if(!$pozajmice) {
        echo "Došlo je do greške.";
        exit();
    }
    
    if($pozajmice->num_rows == 0) {
        echo "Baza je prazna. Nema informacija.";
        exit();
    } else { 

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">
    <title>Online biblioteka</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
<div class="padding-container">

        <h1 style="text-align:center;">Dobrodošli na online biblioteku</h1>

        <div class="padding-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Knjiga</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Vrsta</th>
                    <th scope="col">Korisnik</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody class="telo">
                <?php
                    while($row = $pozajmice->fetch_array()):
                ?>
                <tr id="<?php echo $row["id_pozajmice"]?>">
                    <td scope="row" style="display:none;"><?php echo $row["id_pozajmice"] ?></td>
                    <td data-target="knjiga"><?php echo $row["knjiga"] ?></td>
                    <td data-target="autor"><?php echo $row["autor"] ?></td>
                    <td data-target="vrsta"><?php echo $row["vrsta"] ?></td>
                    <td data-target="id_korisnik"><?php echo $row["id_korisnik"] ?></td>
                    <td>
                        <a href="#" style="margin-right:10px;" class="btn btn-success btn-sm izmeni-knjigu-button" data-id="<?php echo $row['id_pozajmice']; ?>"><i class="fas fa-pen"></i></a>
                        <a href="#" class="btn btn-danger btn-sm vrati-knjigu-button" data-id="<?php echo $row['id_pozajmice']; ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                    endwhile;
                }
            }
                ?>
            </tbody>
        </table>
    </div>


        <div style="display: flex; align-items:center; padding-left:20px;">
            <button style="margin-right:20px; margin-bottom:30px; padding:0px; width:100px; height:40px" type="button" id="nova-pozajmica" class="btn btn-success">Iznajmi knjigu</button>
            <button style="margin-right:20px; margin-bottom:30px; padding:0px; width:40px; height:40px" type="button" class="btn btn-danger btn btn-info" id="sortiraj"><i class="fas fa-sort"></i></button>
            <input style="margin-right:20px; width:200px; display:inline; margin-bottom:30px" type="text" class="form-control" id="search" placeholder="Pretraži.">
        </div>

        <div class="prozor-knjiga" style="padding-left:20px;">
            <form action="#" method="POST" id="dodajNovu">
                <div class="form-group">
                    <label>Naziv knjige</label>
                    <input name="knjiga" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Autor knjige</label>
                    <input name="autor" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Vrsta</label>
                    <input name="vrsta" type="text" class="form-control">
                </div>
                <button id="btnDodaj" formmethod="POST" type="submit" class="btn btn-primary">Dodaj</button>
            </form>
        </div>

        <div class="izmeni-knjigu"  style="padding-left:20px;">
            <form action="#" method="POST" id="izmeniKnjigu">
                 <div class="form-group">
                    <label>ID pozajmice</label>
                    <input name="id" id="id-pozajmice" disabled type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Naziv knjige</label>
                    <input name="knjiga" id="knjiga-input" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Autor knjige</label>
                    <input name="autor" id="autor-input" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Vrsta</label>
                    <input name="vrsta" id="vrsta-input" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>ID korisnika</label>
                    <input name="id_korisnik" id="id-korisnik" disabled type="text" class="form-control">
                    <!-- ovde ne hvata id korisnika-->
                </div>
                
                <button id="btnIzmeni" formmethod="POST" type="submit" class="btn btn-success">Izmeni</button>
            </form>
        </div>

    </div>

    
    <script src="main.js"></script>

            </body>
            </html>    