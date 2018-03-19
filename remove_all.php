<?php
  require("database.php");

  if (isset($_GET)) {
    $db = new Database();
    $db->remove_all();
    header('Location: /');
  }
?>
