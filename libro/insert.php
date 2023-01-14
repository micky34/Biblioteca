<?php
include 'connect.php';
$conn = connect();

$titolo = $_REQUEST["titolo"];
$autore = $_REQUEST["autore"];
$genere = $_REQUEST["genere"];
$anno = $_REQUEST["anno"];
$isbn = $_REQUEST["isbn"];
$scaffale = $_REQUEST["scaffale"];

$sql = "INSERT INTO libro (titolo, autore, genere, anno, isbn, scaffale) VALUES ('$titolo', '$autore', '$genere', '$anno', '$isbn', '$scaffale')";

if($conn->query($sql) === TRUE) {
    echo "Inserimento avvenuto con successo!\n";
    echo "<form action=\"index.html\"><button class=\"btn btn-secondary \" type=\"submit\">Torna indietro</button></form>";
} else {
    echo "errore di inserimento\n";
    echo "<input type=\"button\" name=\"add\" value=\"Torna indietro\" onclick=\"location.href='javascript:history.go(-1)'\"/>";
}

?>
