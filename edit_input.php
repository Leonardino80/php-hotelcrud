
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
if(empty($_POST)) {
  echo "si è verificato un errore";
  exit();
}
// prendo i dati in post dall'edit.php
$id = intval($_POST['id']);
// estraggo il valore numerico della stringa tramite INTVAL
$room_number = intval($_POST['room_number']);
$floor = intval($_POST['floor']);
$beds = intval($_POST['beds']);
$sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW() WHERE id = $id";
$result = $conn->query($sql);
?>
<?php
  include 'head.php';
  include 'header.php';
?>

<div class="container">
  <?php if($result=true) { ?>
  <h1>Modifica effettuata con successo!</h1>
  <?php } else { ?>
  <h1>Errore!</h1>
  <?php } ?>
  <a href="index.php">Torna alla home</a>
</div>
<?php
include 'footer.php';
$conn->close();
?>
