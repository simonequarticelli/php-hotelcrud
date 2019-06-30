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

$sql = "SELECT * FROM stanze WHERE id = $id_stanza";//<-- usare doppi apici per interpretare
$result = $conn->query($sql); //esegui questa istruzione

if ($result && $result->num_rows > 0) {
// output data of each row
// prendi risultati e fai cose fino a che ce ne sono
  while($row = $result->fetch_assoc()) { ?>
    <h5 class="text-center">MODIFICA DELLA STANAZA <?php echo '<span>'.$row['room_number'].'</span>' ?></h5>
    <div class="row justify-content-center">
      <div class="col-2 offset-col">
        <form action="_edit_manager.php" method="post">
          <div class="form-group">
            <!-- hidden per inviare id nascosto -->
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <label>Numero stanza</label>
            <input type="number" class="form-control" name="room_number" value="<?php echo $row['room_number'] ?>">
          </div>
          <div class="form-group">
            <label>Piano</label>
            <input type="number" class="form-control" name="floor" value="<?php echo $row['floor'] ?>">
          </div>
          <div class="form-group">
            <label>Letti</label>
            <input type="number" class="form-control" name="beds" value="<?php echo $row['beds'] ?>">
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Salva</button>
                <a href="index.php"><button type="button" name="button" class="btn btn-primary btn-sm">Ritorna alle stanze</button></a>
              </div>
            </div>
          </div>


        </form>
      </div>
    </div>

<?php } ?>
 <?php
} elseif ($result) {
  echo "0 results";
} else {
  echo "query error";
}
$conn->close();
?>

<?php include 'layout/_footer.php' ?>
