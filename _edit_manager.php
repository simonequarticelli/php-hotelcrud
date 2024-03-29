<?php

include 'layout/_head.php';
include 'layout/_nav.php';

include '_config.php';

// print_r($_POST);

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
$id_stanza = intval($_POST['id']);
$room_number = intval($_POST['room_number']);
$floor = intval($_POST['floor']);
$beds = intval($_POST['beds']);

//query per aggiornare info stanza
$sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW() WHERE id = $id_stanza";//<-- usare doppi apici per interpretare
$result = $conn->query($sql); //esegui questa istruzione

?>

<div class="row">
  <div class="col-12 text-center">
    <?php if ($result){?>
      <h5>MODIFICA EFFETTUATA CON SUCCESSO</h5>
    <?php }else { ?>
      <h5>SI E' VERIFICATO UN ERRORE</h5>
    <?php } ?>
    <a href="index.php"><button type="button" name="button" class="btn btn-primary mt-3 btn-sm">Ritorna alle stanze</button></a>
  </div>
</div>

<?php include 'layout/_footer.php'; ?>
