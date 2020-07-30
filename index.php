<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <title>PHP CRUD</title>

  <script src="scripts.js"> </script>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php require_once 'process.php'; ?>
    <div class="container">
    <?php
      //pre_r() organizes the array when printing to make easy reading in html.
      function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
      }

      $mysqli = new mysqli('localhost', 'root', 'root', 'crud') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
      //pre_r($result);

      //fetch_assoc() grabs the first record from the query and returns it as an assoc array.
      //pre_r($result->fetch_assoc());
    ?>

    <div class="row justify-content-center">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td>
              <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
              <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
        </table>
    </div>

    <div class="row justify-content-center">
    <form action="index.php" method="post">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter your name">
      </div>
      <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control" placeholder="Enter your location">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" name="save">Save</button>
      </div>
    </form>
    </div>
    </div>
  </body>
</html>
