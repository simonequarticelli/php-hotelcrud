<?php
//includo parte sup html
include 'layout/head.php';

// includo file contenente le pwd per la connessione
include '_config.php';

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// tento di fare la connessione se non va a buon fine esco
if ($conn && $conn->connect_error) {
  echo ( "Connection failed: " . $conn->connect_error);
  exit();
}

$id_stanza = intval($_GET['id']);//<-- forzo con intval() a leggere un numero

$sql = "SELECT * FROM stanze WHERE id = $id_stanza";//<-- usare doppi apici per interpretare
$result = $conn->query($sql); //esegui questa istruzione

if ($result && $result->num_rows > 0) {
// output data of each row
// prendi risultati e fai cose fino a che ce ne sono
  while($row = $result->fetch_assoc()) { ?>

    <form action="_edit_manager.php" method="post">
      <!-- hidden per inviare id nascosto -->
      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      <input type="text" name="room_number" value="<?php echo $row['room_number'] ?>">
      <input type="submit" value="salva">
    </form>

<?php } ?>
 <?php
} elseif ($result) {
  echo "0 results";
} else {
  echo "query error";
}
$conn->close();
?>
