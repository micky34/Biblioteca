<!doctype html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  </head>

  <body class="bg-light">

  <?php include '../navbar.php'; ?>

    <div class="card-group p-3">

        <div class="card">

          <div class="card-body">

            <h5 class="card-title">Inserisci utenti</h5>

            <p class="card-text">Inserisci nuovi utenti.</p>

            <a href="inserisci.php" class="btn btn-primary">Vai</a>

          </div>

        </div>

        <div class="card">

          <div class="card-body">

            <h5 class="card-title">Cerca utenti</h5>

            <p class="card-text">Cerca utenti per campo.</p>

            <a href="cerca.php" class="btn btn-primary">Vai</a>

          </div>

        </div>

        <div class="card">

          <div class="card-body">

            <h5 class="card-title">Visualizza utenti</h5>

            <p class="card-text">Visualizza tutti gli utenti</p>

            <a href="cerca.php?invio=" class="btn btn-primary">Vai</a>

          </div>

        </div>

    </div>

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  </body>

</html>