<?php
$id = $_REQUEST["id"];
$isbn = $_REQUEST["isbn"];
$data = date("Y-m-d");

include 'connect.php';
$query = "INSERT INTO prestito (isbn, id_utente, data) VALUES ('$isbn', '$id', '$data')";
$conn = connect();
if($conn->query($query) === TRUE) {
    echo "Prestito creato correttamente!";
    echo "<form action=\"index.html\"><button class=\"btn btn-secondary\" type=\"submit\">Torna indietro</button></form>";
}