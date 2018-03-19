<?php
  require("database.php");

  function check_task($task_id) {
    $db = new Database();
    $db->check_task($task_id);
  }

  function uncheck_task($task_id) {
    $db = new Database();
    $db->uncheck_task($task_id);
  }

  if (isset($_GET)) {
    if ($_GET['check'] == 'true') {
      check_task($_GET['id']);
    }
    else {
      uncheck_task($_GET['id']);
    }
    header('Location: /');
  }
?>
