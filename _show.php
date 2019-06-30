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

// leggo in GET il parametro id della stanza
$id_stanza = intval($_GET['id']);//<-- forzo con intval() a leggere un numero

//eseguo la query
//QUERY DI LETTURA
$sql = "SELECT room_number, floor, beds FROM stanze WHERE id = $id_stanza";//<-- usare doppi apici per interpretare
$result = $conn->query($sql); //esegui questa istruzione
// print_r($result);
?>

<table>
  <tr>
    <th>Stanza <i class="fas fa-door-closed"></th>
    <th>Piano <i class="fas fa-walking"></i></th>
    <th>Letti <i class="fas fa-bed"></i></th>
  </tr>
  <?php
  if ($result && $result->num_rows > 0) {
  // output data of each row
  // fetch_assoc() --> prendi risultati e fai cose fino a che ce ne sono
    while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><span><?php echo $row['room_number'] ?></span></td>
        <td><?php echo $row['floor']?></td>
        <td><?php echo $row['beds']?></td>
      </tr>
  <?php } ?>
</table> <?php
  } elseif ($result) {
    echo "0 results";
  } else {
    echo "query error";
  }
?>

<div class="container_btn">
  <a href="index.php"><button type="button" name="button" class="btn btn-info btn-sm">Ritorna alle stanze</button></a>
</div>

<!-- chiudo la connessione -->
<?php $conn->close(); ?>

<?php include 'layout/_footer.php' ?>
