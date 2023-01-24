<?php
include '../connect.php';
$conn = connect();

$dom = new DOMDocument();
$dom->encoding = 'utf-8';

$dom->xmlVersion = '1.0';

$dom->formatOutput = true;

$xml_file_name = 'export.xml';

$biblioteca = $dom->createElement("biblioteca");


// EXPORT LIBRI
$sql = "SELECT * FROM libro";
$rs = $conn->query($sql);

if ($rs->num_rows > 0) {
    $libri = $dom->createElement("libri"); // crea la sezione libri

    while ($arr = $rs->fetch_assoc()) { // cicla tutti i libri
        $libro = $dom->createElement("libro"); // crea il figlio libro 
        foreach ($arr as $key => $value) { // inserisci il libro corrente
            $child_node_title = $dom->createElement($key, $value);
            $libro->appendChild($child_node_title);
        }
        $libri->appendChild($libro);
    }

    $dom->appendChild($libri);
}


// EXPORT UTENTI
$sql = "SELECT * FROM utente";
$rs = $conn->query($sql);

if ($rs->num_rows > 0) {
    $utenti = $dom->createElement("utenti"); // crea la sezione utenti

    while ($arr = $rs->fetch_assoc()) { // cicla tutti gli utenti
        $utente = $dom->createElement("utente"); //crea il figlio utente 
        foreach ($arr as $key => $value) { // inserisci l'utente corrente
            $child_node_title = $dom->createElement($key, $value); // imposta i valori
            $utente->appendChild($child_node_title); // aggiungi i valori a utente
        }
        $utenti->appendChild($utente); // aggiungi la sottosezione utente a utenti
    }

    $dom->appendChild($utenti);
}


// EXPORT PRESTITI
$sql = "SELECT * FROM prestito";
$rs = $conn->query($sql);

if ($rs->num_rows > 0) {
    $prestiti = $dom->createElement("prestiti");

    while ($arr = $rs->fetch_assoc()) { // cicla tutti i libri
        $prestito = $dom->createElement("prestito");
        foreach ($arr as $key => $value) { // inserisci il libro corrente
            $child_node_title = $dom->createElement($key, $value);
            $prestito->appendChild($child_node_title);
        }
        $prestiti->appendChild($prestito);
    }

    $dom->appendChild($prestiti);
}

echo "<xmp>".$dom->saveXML()."</xmp>";
$dom->save($xml_file_name);

/*

    $xmlfile = fopen('export.xml', "w");
    fwrite($xmlfile, $file->asXML());
    fclose($xmlfile);

    if(file_exists("export.xml")) {
        readfile("export.xml");
    }*/


echo "<input type=\"button\" name=\"add\" value=\"Torna indietro\" onclick=\"location.href='javascript:history.go(-1)'\"/>";
