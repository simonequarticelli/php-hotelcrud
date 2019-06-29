<?php

include 'layout/_head.php';
include 'layout/_nav.php';
include '_config.php';

print_r($_POST);

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// tento di fare la connessione se non va a buon fine esco
if ($conn && $conn->connect_error) {
  echo ( "Connection failed: " . $conn->connect_error);
  exit();
}

//controllo che la post (dati da ricevere) non sia vuota... se si chiudo la connessione
if (empty($_POST)) {
  echo "Si è verificato un errore";
  exit();
}

//salvo i dati ricevuti
$id_stanza = $_POST['id'];
$room_number = $_POST['room_number'];
$floor = $_POST['floor'];
$beds = $_POST['beds'];

//query per aggiornare info stanza
$sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW() WHERE id = $id_stanza";//<-- usare doppi apici per interpretare
$result = $conn->query($sql); //esegui questa istruzione












?>
