<?php
include 'connect.php';
$_isbn = $_REQUEST["isbn"];

$conn = connect();


$titolo = $_REQUEST["titolo"];
$autore = $_REQUEST["autore"];
$genere = $_REQUEST["genere"];
$anno = $_REQUEST["anno"];
$isbn = $_REQUEST["isbn"];
$scaffale = $_REQUEST["scaffale"];
$prestito = $_REQUEST["prestito"];
$query = "UPDATE libro SET titolo='$titolo', autore='$autore', genere='$genere', anno='$anno', isbn='$isbn', scaffale='$scaffale', prestito='prestito' WHERE isbn='$_isbn'";
if($conn->query($query) === TRUE) {
    echo "ok";
} 



?>