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

    

  

<form method="get">

    <?php

          include '../connect.php';

        $conn = connect();

        $qLibri = "SELECT * FROM libro";

        $qUtenti = "SELECT * FROM utente";



        $resLibri = $conn->query($qLibri);

        echo "Seleziona un libro: <select class=\"form-select\" aria-label=\"Selezione libri\" name=\"isbn\">";

        echo "<option selected>Seleziona un libro</option>";

        while($libri = $resLibri->fetch_assoc()) {

            $isbn = $libri["isbn"];

            $titolo = $libri["titolo"];

            $autore = $libri["autore"];

            echo "<option value=\"$isbn\">$titolo - $autore</option>";

            

        }

        echo "</select>";



        $resUtenti = $conn->query($qUtenti);

        echo "Seleziona un utente: <select class=\"form-select\" aria-label=\"Selezione utenti\" name=\"id\">";

        echo "<option selected>Seleziona un utente</option>";

        while($utenti = $resUtenti->fetch_assoc()) {

            $id = $utenti["id"];

            $nome = $utenti["nome"];

            $email = $utenti["email"];



            echo "<option value=\"$id\">($id) $nome - $email</option>";

            

        }

        echo "</select>";



    ?>

<input class="btn btn-primary" type="submit" name="invio">

<?php
if(isset($_REQUEST["invio"])) {
  $id = $_REQUEST["id"];
  $isbn = $_REQUEST["isbn"];
  $data = date("Y-m-d");

  $query = "INSERT INTO prestito (isbn, id_utente, data) VALUES ('$isbn', '$id', '$data')";
  $conn = connect();
  if($conn->query($query) === TRUE) {
      echo "Prestito creato correttamente!";
      echo "<form action=\"index.html\"><button class=\"btn btn-secondary\" type=\"submit\">Torna indietro</button></form>";
  }
}

?>

      </form>

<input type="button" name="add" value="Torna indietro" onclick="location.href='javascript:history.go(-1)'"/>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>