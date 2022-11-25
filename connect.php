<?php
function connect(){
    $mysqli = new mysqli("localhost", "root", "", "my_michelecarta1");
	if($mysqli->connect_error) {
        echo "errore di connessione " . $mysqli->connect_error . "\n";
        echo "<form action=\"index.php\"><button class=\"btn btn-primary\" type=\"submit\">Torna indietro</button></form>";
    } 
	return $mysqli;
} 