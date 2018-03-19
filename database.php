<?php

class Database {

  function __construct() {
    define("SERVER_NAME",'localhost');
    define("USERNAME",'todo_list');
    define("PASSWORD",'this_is_super_insecure');
  }

  function connect() {

    $conn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,"",3306);

    if ($conn->connect_error) {
      die("Connection Failed: " . $conn->connect_error);
    }
    return $conn;
  }

  function setup() {
    $conn = $this->connect();
    $sql = "CREATE DATABASE IF NOT EXISTS TODO_LIST;";
    if ($conn->query($sql) === TRUE) {
      $sql = "USE TODO_LIST";
      if (mysqli_query($conn, $sql)) {
        $sql = "CREATE TABLE IF NOT EXISTS TASKS(
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                name VARCHAR(24) NOT NULL,
                description VARCHAR(120) NOT NULL,
                upload_date DATE NOT NULL,
                due_date DATE NOT NULL,
                is_completed BOOLEAN NOT NULL,
                PRIMARY KEY (id)
              );";
        if (mysqli_query($conn, $sql)) {
          $conn->close();
          return true;
        }
      }
    }
    die("Error Setting Up Database Schema: " . $conn->error);
  }

  function add_task($task) {
    $conn = $this->connect();
    $sql = "USE TODO_LIST";
    if (mysqli_query($conn, $sql)) {
      $sql = "INSERT INTO TASKS (name, description, upload_date, due_date, is_completed) VALUES ('{$task->name}', '{$task->description}', CURDATE(), '{$task->due_date}', FALSE);";
      if (mysqli_query($conn, $sql)) {
        $task->id = $conn->insert_id;
        $conn->close();
        return $task;
      }
    }
    die("Error Inserting Task Into Database: " . $conn->error);
  }

  function get_tasks() {
    $conn = $this->connect();
    $sql = "USE TODO_LIST";
    if (mysqli_query($conn, $sql)) {
      $sql = "SELECT * FROM TASKS;";
      $results = $conn->query($sql);
      if ($results && $results->num_rows) {
        $tasks = array();
        while($row = $results->fetch_assoc()) {
          array_push($tasks, new Task(
            $row["name"], $row["description"], $row["upload_date"], $row["due_date"], $row["is_completed"], $row["id"])
          );
        }
        return $tasks;
      }
    }
    return array();
  }

  function check_task($task_id) {
    $conn = $this->connect();
    $sql = "USE TODO_LIST";
    if (mysqli_query($conn, $sql)) {
      $sql = "UPDATE TASKS SET is_completed = TRUE WHERE id = {$task_id}";
      $results = $conn->query($sql);
      if (mysqli_query($conn, $sql)) {
        $conn->close();
        return true;
      }
    }
    die("Failed to check task");
  }

  function uncheck_task($task_id) {
    $conn = $this->connect();
    $sql = "USE TODO_LIST";
    if (mysqli_query($conn, $sql)) {
      $sql = "UPDATE TASKS SET is_completed = FALSE WHERE id = {$task_id}";
      $results = $conn->query($sql);
      if (mysqli_query($conn, $sql)) {
        $conn->close();
        return true;
      }
    }
    die("Failed to check task");
  }

  function remove_all() {
    $conn = $this->connect();
    $sql = "USE TODO_LIST;";
    if (mysqli_query($conn, $sql)) {
      $sql = "DROP TABLE TASKS;";
      $results = $conn->query($sql);
      if (mysqli_query($conn, $sql)) {
        $conn->close();
        return true;
      }
    }
    die("Failed to drop table");
  }
}
?>
