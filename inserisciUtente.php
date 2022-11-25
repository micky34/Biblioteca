<?php
include 'connect.php';

$nome = $_REQUEST["nome"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

$conn = connect();
$query = "INSERT INTO utente (nome, email, password) VALUES ('$nome', '$email', '$password')";
if($conn->query($query) === TRUE) {
    echo "utente inserito con successo";
    echo "<input type=\"button\" name=\"add\" value=\"Torna indietro\" onclick=\"location.href='javascript:history.go(-1)'\"/>";
}

?>