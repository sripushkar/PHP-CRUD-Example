<?php

session_start();

//DB connection
$mysqli = new mysqli('localhost', 'root', 'root', 'crud') or die(mysqli_error($mysqli));

//This executes when the save button is posted from index.php
if(isset($_POST['save'])){
  $name = $_POST['name'];
  $location = $_POST['location'];

  $mysqli->query("INSERT INTO data(name, location) VALUES('$name', '$location')") or die($mysqli->error);

  $_SESSION['message'] = "Record has been saved!";
  $_SESSION['msg_type'] = "success";

  header('location: index.php');
}

//This executes when the delete button is clicked and is passed into the url from index.php
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header('location: index.php');
}

?>
