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
  <?php include '../navbar.php'; ?>

<?php


include '../connect.php';

$id = $_REQUEST["id"];



$conn = connect();



$query = "SELECT * FROM utente WHERE id='$id'";

$result = $conn->query($query);





if($result->num_rows == 1) {

    $data = $result->fetch_assoc();

    $nome = $data["nome"];

    $email = $data["email"];

    $password = $data["password"];  

} else die ("Errore");





?>



<form method="post" class="p-2">

<div class="row mb-3">

            <label class="col-sm-1 col-form-label">ID</label>

            <div class="col-sm-2">

              <input type="text" class="form-control disabled" name="id" placeholder="ID" value="<?php echo "$id"; ?>">

            </div>

        </div>

        <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Nome</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo "$nome"; ?>">

            </div>

        </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Email</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo "$email"; ?>">

            </div>

          </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Password</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo "$password"; ?>">

            </div>

          </div>



          <input class="btn btn-primary" type="submit" name="modifica">

      </form>

      
      <input type="button" name="add" value="Torna indietro" onclick="location.href='javascript:history.go(-1)'"/>

    <?php
if(isset($_REQUEST["modifica"])) {

$id = $_REQUEST["id"];

$conn = connect();


$nome = $_REQUEST["nome"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$query = "UPDATE utente SET nome='$nome', email='$email', password='$password' WHERE id='$id'";
if($conn->query($query) === TRUE) {
    echo "Utente modificato con successo.";
} else {
    echo "Errore nella modifica dell'utente nel database.";
}


}
?>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>