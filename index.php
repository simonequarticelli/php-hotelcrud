<!-- Come vi dicevo a lezione, oggi pomeriggio provate a fare la connessione
al db da php e provate a fare la prima query di select di tutte le stanze.
Se tutto va a buon fine, impaginate la tabella (sì, siete autorizzati ad
usare il tag <table> :rolling_on_the_floor_laughing: ), magari potete aiutarvi
con bootstrap, se vi fa piacere :wink: -->

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
// echo '<p>Connected successfully</p>';
// phpinfo();

//eseguo la query
$sql = "SELECT room_number, id FROM stanze";
$result = $conn->query($sql); //esegui questa istruzione


?>

<table>
  <tr>
    <th>Stanza n° <i class="fas fa-door-closed"></i></th>
    <th>Actions</th>
  </tr>

  <?php

  if ($result && $result->num_rows > 0) {
  // output data of each row
  // prendi risultati e fai cose fino a che ce ne sono
    while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['room_number'] ?></td>
        <td>
          <!-- compilo la querystring  -->
          <a href="_show.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-info btn-sm">visualizza</button>
          <a href="_update.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-primary btn-sm">modifica</button>
          <a href="#"><button type="button" class="btn btn-danger btn-sm">cancella</button>
        </td>
      </tr>

  <?php } ?>
</table> <?php
    } elseif ($result) {
      echo "0 results";
    } else {
      echo "query error";
    }
    $conn->close();
    ?>

  <?php include 'layout/_footer.php' ?>
