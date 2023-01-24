<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <title>Hello, world!</title>

  </head>

  <body class="bg-light"><?php include '../navbar.php'; ?>

    

<?php

include '../connect.php';

if(isset($_REQUEST["modifica"])) {
  $_isbn = $_REQUEST["id"];

  $conn = connect();


  $titolo = $_REQUEST["titolo"];
  $autore = $_REQUEST["autore"];
  $genere = $_REQUEST["genere"];
  $anno = $_REQUEST["anno"];
  $isbn = $_REQUEST["isbn"];
  $scaffale = $_REQUEST["scaffale"];
  $query = "UPDATE libro SET titolo='$titolo', autore='$autore', genere='$genere', anno='$anno', isbn='$isbn', scaffale='$scaffale' WHERE isbn='$_isbn'";
  if($conn->query($query) === TRUE) {
    echo "Ok";
  } else {
    echo "Errore";
  }
} else {

  $_isbn = $_REQUEST["id"];

  $conn = connect();
  
    $query = "SELECT * FROM libro WHERE isbn='$_isbn'";
  
  $result = $conn->query($query);
  
  
  
  if($result->num_rows == 1) {
  
      $dati = $result->fetch_assoc();
  
      $titolo = $dati["titolo"];
  
      $autore = $dati["autore"];
  
      $genere = $dati["genere"];
  
      $anno = $dati["anno"];
  
      $isbn = $dati["isbn"];
  
      $scaffale = $dati["scaffale"];
  
  
  }
}


?>



<form method="post" class="p-2">

        <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Titolo</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="titolo" placeholder="Titolo" value="<?php echo "$titolo"; ?>">

            </div>

        </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Autore</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="autore" placeholder="Autore"value="<?php echo "$autore"; ?>">

            </div>

          </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Genere</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="genere" placeholder="Genere"value="<?php echo "$genere"; ?>">

            </div>

          </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Anno</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="anno" placeholder="Anno" value="<?php echo "$anno"; ?>">

            </div>

          </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">ISBN</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="isbn" placeholder="ISBN" value="<?php echo "$isbn"; ?>">

            </div>

        </div>



            <div class="row mb-3">

                <label class="col-sm-1 col-form-label">Scaffale</label>

                <div class="col-sm-2">

                  <input type="text" class="form-control" name="scaffale" placeholder="Scaffale" value="<?php echo "$scaffale"; ?>">

                </div>

              </div>



          <input class="btn btn-primary" type="submit" name="modifica" value="Modifica">  
  
      </form>


      <input type="button" name="add" value="Torna indietro" onclick="location.href='javascript:history.go(-1)'"/>


 

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>