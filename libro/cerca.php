<!doctype html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  </head>

  <body class="bg-light"><?php include '../navbar.php'; ?>

    <h3 class="p-2">Cerca un libro</h3>



    <form action="cerca.php" method="get" class="p-2">

        <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Titolo</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="titolo" placeholder="Titolo">

            </div>

        </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Autore</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="autore" placeholder="Autore">

            </div>

          </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Genere</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="genere" placeholder="Genere">

            </div>

          </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">Anno</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="anno" placeholder="Anno">

            </div>

          </div>



          <div class="row mb-3">

            <label class="col-sm-1 col-form-label">ISBN</label>

            <div class="col-sm-2">

              <input type="text" class="form-control" name="isbn" placeholder="ISBN">

            </div>

        </div>



            <div class="row mb-3">

                <label class="col-sm-1 col-form-label">Scaffale</label>

                <div class="col-sm-2">

                  <input type="text" class="form-control" name="scaffale" placeholder="Scaffale">

                </div>

              </div>



              <div class="row mb-3">

                <label class="col-sm-1 col-form-label">Prestito</label>

                <div class="col-sm-2">

                  <input type="text" class="form-control" name="prestito" placeholder="Prestito">

                </div>

              </div>

          <input class="btn btn-primary" name="invio" type="submit" value="Cerca">

      </form>

      <?php
include '../connect.php';
  $conn = connect();
if(isset($_REQUEST["invio"])) {
    if(isset($_REQUEST["titolo"], $_REQUEST["autore"],$_REQUEST["genere"], $_REQUEST["anno"], $_REQUEST["isbn"])) {
      $titolo = $_REQUEST["titolo"];
    $autore = $_REQUEST["autore"];
    $genere = $_REQUEST["genere"];
    $anno = $_REQUEST["anno"];
    $isbn = $_REQUEST["isbn"];
    $scaffale = $_REQUEST["scaffale"];
    }
    else {
      $titolo = "";
    $autore = "";
    $genere = "";
    $anno = "";
    $isbn = "";
    $scaffale = "";
    }
    $check = false;

    $query = "SELECT * FROM libro WHERE titolo LIKE '$titolo%' AND autore LIKE '$autore%' AND genere LIKE '$genere%' AND anno LIKE '$anno%' AND isbn LIKE '$isbn%' AND scaffale LIKE '$scaffale%'";
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
                echo "<td><a href='modifica.php?id=$assoc[isbn]'> Modifica </a></td>";
                echo "<td><a href='elimina.php?id=$assoc[isbn]'> Elimina </a></td>";
                echo "</tr>";

                $check = true;
            } else {
                echo "<tr>";
                foreach($assoc as $key=>$value) {
                    echo "<td scope=\"row\">$value</td>";
                }
                echo "<td><a href='modifica.php?id=$assoc[isbn]'> Modifica </a></td>";
                echo "<td><a href='elimina.php?id=$assoc[isbn]'> Elimina </a></td>";
                echo "</tr>";
            }
            
        }
        echo "</tbody></table>";
    }
  }

    echo "<input type=\"button\" name=\"add\" value=\"Torna indietro\" onclick=\"location.href='javascript:history.go(-1)'\"/>";
    

?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  </body>

</html>