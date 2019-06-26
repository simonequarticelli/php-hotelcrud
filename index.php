<!-- Come vi dicevo a lezione, oggi pomeriggio provate a fare la connessione
al db da php e provate a fare la prima query di select di tutte le stanze.
Se tutto va a buon fine, impaginate la tabella (sì, siete autorizzati ad
usare il tag <table> :rolling_on_the_floor_laughing: ), magari potete aiutarvi
con bootstrap, se vi fa piacere :wink: -->

<?php

$servername = "localhost";
$username = "simone";
$password = "password";
$dbname = "db_hotel_boolean";
// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
echo ( "Connection failed: " . $conn->connect_error);
}
// echo '<p>Connected successfully</p>';
// phpinfo();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>php-hotelcrud</title>
    <link rel="stylesheet" href="public/app.css">
    <script src="https://kit.fontawesome.com/3234db9797.js"></script>
  </head>
  <body>
    <table>
      <tr>
        <th><?php echo "Stanza n° " ?><i class="fas fa-door-closed"></i></th>
        <th><?php echo "Piano " ?><i class="fas fa-walking"></i></th>
        <th><?php echo "Letti " ?><i class="fas fa-bed"></i></th>
      </tr>

      <?php
      $sql = "SELECT room_number, floor, beds FROM stanze";
      $result = $conn->query($sql);
      if ($result && $result->num_rows > 0) {
      // output data of each row
        while($row = $result->fetch_assoc()) { ?>

          <tr>
            <td><?php echo $row['room_number'] ?></td>
            <td><?php echo $row['floor'] ?></td>
            <td><?php echo $row['beds'] ?></td>
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

  </body>
</html>
