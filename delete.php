
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
  echo "errore.";
  exit();
}
$id_stanza = intval($_POST['id']);
$sql = "DELETE FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql);
?>

<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
 ?>
<div class="container">
  <?php if($result = true) { ?>
  <h1>Stanza cancellata</h1>
  <?php } else { ?>
  <h1>Si è verificato un errore. Riprova o contatta l'amministratore.</h1>
  <?php } ?>
  <a href="index.php" class="btn btn-primary">Torna alla home</a>
</div>

 <?php include 'footer.php';
 $conn->close();
 ?>
