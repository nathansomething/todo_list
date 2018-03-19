<?php
class Task {
  public $name;
  public $description;
  public $uploaded_date;
  public $due_date;
  public $is_completed;
  public $id;

  function __construct($name, $description, $uploaded_date, $due_date, $is_completed, $id = NULL) {
    $this->name = $name;
    $this->description = $description;
    $this->uploaded_date = $uploaded_date;
    $this->due_date = $due_date;
    $this->is_completed = $is_completed;
    $this->id = $id;
  }
}
?>
