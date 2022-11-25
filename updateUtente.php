<?php
include 'connect.php';
$id = $_REQUEST["id"];

$conn = connect();


$nome = $_REQUEST["nome"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$query = "UPDATE utente SET nome='$nome', email='$email', password='$password' WHERE id='$id'";
if($conn->query($query) === TRUE) {
    echo "ok";
} 



?>