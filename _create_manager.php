<?php

include 'layout/_head.php';
include 'layout/_nav.php';

include '_config.php';

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
//id in creazione non c'è!! --> il database lo aggiunge automaticamente <--
$room_number = intval($_POST['room_number']);
$floor = intval($_POST['floor']);
$beds = intval($_POST['beds']);

// var_dump($_POST);

if ($room_number != 0 && $floor != 0 && $beds != 0) {
  //query per creare la stanza
  //QUERY DI INSERIMENTO
  $sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at)
          VALUES ($room_number, $floor, $beds, NOW(), NOW())";
  $result = $conn->query($sql); //esegui questa istruzione
  // var_dump($result);
}

?>
<div class="row">
  <div class="col-12 text-center">
    <?php if ($result){?>
      <h5>STANZA <?php echo '<span>'.$room_number.'</span>' ?> CREATA CON SUCCESSO</h5>
    <?php }else { ?>
      <h5>SI E' VERIFICATO UN ERRORE</h5>
      <a href="_create.php"><button type="button" name="button" class="btn btn-primary mt-3 btn-sm">Ritorna alla creazione</button></a>
      <br>
    <?php } ?>
    <a href="index.php"><button type="button" name="button" class="btn btn-primary mt-3 btn-sm">Ritorna alle stanze</button></a>
  </div>
</div>

<?php include 'layout/_footer.php' ?>
