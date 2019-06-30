<?php

include 'layout/_head.php';
include 'layout/_nav.php';

?>

<div class="row d-flex justify-content-center">
  <div class="col-2">
    <form action="_create_manager.php" method="post">
      <div class="form-group">
        <label>Numero stanza</label>
        <input type="number" placeholder="Inserisci numero stanza" class="form-control" name="room_number" value="">
      </div>
      <div class="form-group">
        <label>Piano</label>
        <input type="number" placeholder="Inserisci numero piano" class="form-control" name="floor" value="">
      </div>
      <div class="form-group">
        <label>Letti</label>
        <input type="number" placeholder="Inserisci quantità letti" class="form-control" name="beds" value="">
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm">Crea stanza</button>
            <a href="index.php"><button type="button" name="button" class="btn btn-primary btn-sm">Ritorna alle stanze</button></a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include 'layout/_footer.php' ?>
