
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
// recupero l'id della stanza da modificare dal paramentro in GET
$id_stanza = intval($_GET['id']);
$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql);
?>
<?php
  include 'head.php';
  include 'header.php';
?>

<div class="container">
      <h1>Modifica stanza id: <?php echo $id_stanza ?></h1>
      <?php
      if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form method="post" action="edit_input.php">
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <!-- <div> -->
            <label for="room_number">N° stanza:</label>
            <input type="text" placeholder="numero stanza"
              value="<?php echo $row['room_number'] ?>" name="room_number">
          <!-- </div>
          <div> -->
            <label for="piano">Piano:</label>
            <input type="number" placeholder="piano"  value="<?php echo $row['floor'] ?>" name="floor">
          <!-- </div>
          <div> -->
            <label for="beds">N°letti:</label>
            <input type="number" placeholder="numero letti"  value="<?php echo $row['beds'] ?>" name="beds">
          <!-- </div>
          <div> -->
            <input type="submit" value="Salva" class="btn btn-success">
          <!-- </div> -->
        </form>
        <?php
      } elseif($result) {
        echo "Non ci sono risultati";
      } else {
        echo "Si è verificato un errore";
      }
      ?>
</div>

<?php
include 'layout/footer.php';
$conn->close();
?>
