<!-- Come vi dicevo a lezione, oggi pomeriggio provate a fare la connessione
al db da php e provate a fare la prima query di select di tutte le stanze.
Se tutto va a buon fine, impaginate la tabella (sì, siete autorizzati ad
usare il tag <table> :rolling_on_the_floor_laughing: ), magari potete aiutarvi
con bootstrap, se vi fa piacere :wink: -->

<?php
include 'layout/_head.php';
include 'layout/_nav.php';
include '_config.php';
include 'layout/_footer.php';

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

  <div class="container_btn_create text-center">
    <a href="_create.php"><button type="button" class="btn btn-secondary mt-100 btn-sm">CREA UNA STANZA</button>
  </div>

  <tr>
    <th>Stanza n° <i class="fas fa-door-closed"></i></th>
    <th>Actions <i class="fas fa-pencil-alt"></i></th>
  </tr>

  <?php

  if ($result && $result->num_rows > 0) {
  // output data of each row
  // prendi risultati e fai cose fino a che ce ne sono
    while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><span><?php echo $row['room_number'] ?></span></td>
        <td>
          <!-- compilo la querystring  -->
          <a href="_show.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-info btn-sm">Visualizza</button>
          <a href="_update.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-primary btn-sm">Modifica</button>
          <a href="_delete.php?id=<?php echo $row['id']?>&room_number=<?php echo $row['room_number']?>"><button type="button" class="btn btn-danger btn-sm">Cancella</button>
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
