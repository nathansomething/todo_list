<?php
  require("task.php");
  require("database.php");

  function add_task() {
    $task = new Task(
      addslashes($_POST['task_name']),
      addslashes($_POST['description']),
      NULL,
      date('Y-m-d', strtotime($_POST['due_date'])),
      false,
      NULL
    );
    $db = new Database();
    $db->add_task($task);
  }

  if (isset($_POST)) {
    add_task();
    header('Location: /');
  }
 ?>
