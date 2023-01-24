
<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <title>Inserisci un utente</title>

  </head>

  <body class="bg-light">

    
  <?php include '../navbar.php'; ?>

    <h3 class="p-2">Inserisci un utente</h3>

    <form method="post" class="p-2">

        <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Nome</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="nome" placeholder="Nome utente">

            </div>

        </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Email</label>

            <div class="col-sm-2">

              <input type="email" class="form-control" name="email" placeholder="Email">

            </div>

          </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Password</label>

            <div class="col-sm-2">

              <input type="password" class="form-control" name="password" placeholder="Password">

            </div>

          </div>



          <input class="btn btn-primary" type="submit" name="invio" value="Invio">

      </form>



      <?php

if(isset($_REQUEST["invio"])) {

    include '../connect.php';

    $nome = $_REQUEST["nome"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    
    $conn = connect();
    $query = "INSERT INTO utente (nome, email, password) VALUES ('$nome', '$email', '$password')";
    if($conn->query($query) === TRUE) {
        echo "utente inserito con successo";
    }

}


?>

<input type="button" name="add" value="Torna indietro" onclick="location.href='javascript:history.go(-1)'"/>
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>



