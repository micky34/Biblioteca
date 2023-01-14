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

  <body class="bg-light">
  <script id="replace_with_navbar" src="../nav.js"></script>

    

<?php

include 'connect.php';

$_isbn = $_REQUEST["isbn"];



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

    $prestito = $dati["prestito"];

} else die ("Errore");





?>



<form action ="update.php" method="post" class="p-2">

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



              



            <div class="row mb-3">

                <label class="col-sm-1 col-form-label">Prestito</label>

                <div class="col-sm-2">

                  <input type="text" class="form-control" name="prestito" placeholder="Prestito" value="<?php echo "$prestito"; ?>">

                </div>

              </div>



          <input class="btn btn-primary" type="submit" value="Salva" name="modifica">

      </form>

      <form action="index.html" class="p-2">

        <button class="btn btn-secondary" type="submit">Torna indietro</button>

    </form>





    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>