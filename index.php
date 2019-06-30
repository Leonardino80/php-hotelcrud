<?php
  $server = "localhost";
  $user = "root";
  $pass = "root";
  $dbName = "db_hotel";
  $conn = new mysqli($server, $user, $pass, $dbName);
  if ($conn && $conn->connect_error) {
    echo ("Connection failed " .$conn->connect_error);
    exit();
  }
  $sql = "SELECT room_number, floor, beds FROM stanze";
  $sql = "SELECT * FROM stanze";
  $result = $conn->query($sql);
?>

<?php
  include 'head.php';
  include 'header.php';
?>
<!--start of body-->
    <div class="container">
      <table class="dbtable">
        <tr>
          <th>Identificativo</th>
          <th>N° Stanza</th>
          <th>Piano</th>
          <th>Letti</th>
        </tr>
        <?php

          if($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {?>
            <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["room_number"]; ?></td>
              <td><?php echo $row["floor"]; ?></td>
              <td><?php echo $row["beds"]; ?></td>
              <td>
                <a href="show.php?id=<?php echo $row['id'] ?>"
                  type="button" class="btn btn-primary">
                  Visualizza
                </a>
                <a href="edit.php?id=<?php echo $row['id'] ?>" type="button">
                  Modifica
                </a>
                <form method="post" action="delete.php">
                  <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                  <input type="submit" value="Cancella" class="btn btn-danger">
                </form>
              </td>
            </tr>

            <?php
            }
          } elseif ($result) {
           echo "0 results";
          } else {
           echo "query error";
          }
        ?>
      </table>
    </div><!--container -->

    <script src="public/js/script.js"></script>

<?php
  include 'footer.php';
?>

<?php
  $conn->close();
?>
