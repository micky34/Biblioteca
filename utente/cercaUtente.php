<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags   -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <title>Ricerca libro</title>

  </head>

  <body class="bg-light">
  <script id="replace_with_navbar" src="../nav.js"></script>

<?php

include '../connect.php';

  $conn = connect();



  if(isset($_REQUEST["id"], $_REQUEST["nome"], $_REQUEST["email"])){

       $id = $_REQUEST["id"];

    $nome = $_REQUEST["nome"];

    $email = $_REQUEST["email"];

  } else {

    $id  = "";

    $nome = "";

    $email = "";

  }

 



    $check = false;



    $query = "SELECT * FROM utente WHERE id LIKE '$id%' AND nome LIKE '$nome%' AND email LIKE '$email%'";

    $result = $conn->query($query);

    $conn->close();

    if($result->num_rows > 0) {

        echo "<table class=\"table table-success table-striped\">";

        while($assoc = $result->fetch_assoc()) {

            if(!$check) {

                echo "<thead><tr>";

                foreach($assoc as $key=>$value) {

                    echo "<th scope=\"col\">".strtoupper($key)."</th>";

                }

                echo "</tr></thead>";



                echo "<tbody><tr>";

                foreach($assoc as $key=>$value) {

                    echo "<td scope=\"row\">$value</td>";

                }

                echo "<td><a href='vediPrestitiUtente.php?id=$assoc[id]'> Prestiti </a></td>";

                echo "<td><a href='modificaUtente.php?id=$assoc[id]'> Modifica </a></td>";

                echo "<td><a href='eliminaUtente.php?id=$assoc[id]'> Elimina </a></td>";

                echo "</tr>";



                $check = true;

            } else {

                echo "<tr>";

                foreach($assoc as $key=>$value) {

                    echo "<td scope=\"row\">$value</td>";

                }

                echo "<td><a href='vediPrestitiUtente.php?id=$assoc[id]'> Prestiti </a></td>";

                echo "<td><a href='modificaUtente.php?id=$assoc[id]'> Modifica </a></td>";

                echo "<td><a href='eliminaUtente.php?id=$assoc[id]'> Elimina </a></td>";

                echo "</tr>";

            }

            

        }

        echo "</tbody></table>";

    }



    echo "<input type=\"button\" name=\"add\" value=\"Torna indietro\" onclick=\"location.href='javascript:history.go(-1)'\"/>";



?>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>