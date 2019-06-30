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

$id_stanza = intval($_GET['id']);//<-- forzo con intval() a leggere un numero
$room_number = intval($_GET['room_number']);
//query per cancellare una stanza
//QUERY DI CANCELLAZIONE
$sql = "DELETE FROM stanze WHERE id = $id_stanza";//<-- usare doppi apici per interpretare
$result = $conn->query($sql); //esegui questa istruzione

//per vedere errore (meglio scrivere file di log)
// var_dump($conn->error);

?>

<div class="row">
  <div class="col-12 mt-100 text-center">
    <!-- se la query va a bun fine allora... -->
    <?php if ($result){?>
      <h5>CANCELLAZIONE AVVENUTA CON SUCCESSO DELLA STANZA <?php echo '<span>'.$room_number.'</span>' ?></h5>
      <!-- altrimenti -->
    <?php }else { ?>
      <h5>NON PUOI CANCELLARE LA STANZA <?php echo '<span>'.$room_number.'</span>' ?><br> --> STANZA PRENOTATA!! <-- </h5>
    <?php } ?>
    <a href="index.php"><button type="button" name="button" class="btn btn-primary mt-3 btn-sm">Ritorna alle stanze</button></a>
  </div>
</div>

<?php include 'layout/_footer.php' ?>
