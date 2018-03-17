<?php

define(SERVER_NAME,'localhost');

function connect($username, $password) {

  $conn = new mysqli(SERVER_NAME,$username,$password);

  if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  }
  return $conn;
}

function setup($conn) {
  if (!$conn) {
    die("Connection is NULL");
  }
  $sql = "CREATE DATABASE TODO_LIST";
  if (mysqli_query($conn, $sql)) {
    $sql = "CREATE TABLE TASKS(
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY_KEY,
              name VARCHAR(12) NOT NULL,
              description VARCHAR(60) NOT NULL,
              upload_date DATE,
              due_date DATE,
              is_completed BOOLEAN
            );"
    if (mysqli_query($conn, $sql)) {
      return true;
    }
  }
  die("Error Setting Up Database: " . $conn->connect_error);
}

function add_task($conn, $task) {
  if (!$conn) {
    die("Connection is NULL");
  }
  $sql = "INSERT INTO TODO_LIST (name, description, uploaded_date, due_date, is_completed)
          VALUES ($task->name, $task->description, $task->uploaded_date, $task->due_date, false)";
  if (mysqli_query($conn, $sql)) {
    return true;
  }
  die("Error Inserting Task Into Database: " $conn->connect_error);
}
?>
