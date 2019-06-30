<?php
  $server = "localhost";
  $user = "root";
  $pass = "root";
  $dbName = "db_hotel";
  $conn = new mysqli($server, $user, $pass, $dbName);
  if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}
$id_stanza = intval($_GET['id']);
$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql);
?>
<?php
  include 'head.php';
  include 'header.php';
?>

  <div class="container">
    <h1>Identificativo Stanza: <?php echo $id_stanza ?></h1>
    <?php
    if($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      ?>
      <section>
        <h2>Stanza n°: <?php echo $row['room_number'] ?></h2>
        <ul>
          <li>Piano: <?php echo $row['floor'] ?></li>
          <li>n°letti: <?php echo $row['beds'] ?></li>
          <li>Inserita il: <?php echo $row['created_at'] ?></li>
          <li>Aggiornata il: <?php echo $row['updated_at'] ?></li>
        </ul>
        <a href="index.php">torna all'elenco principale</a>
      </section>
     <?php
    } else if($result = true) {
     echo "Non sono state trovate stanze";
    } else {
     echo "errore";
    }
    ?>
  </div>

 <?php
 include 'layout/footer.php';
 $conn->close();
 ?>
