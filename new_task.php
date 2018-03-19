<h2>New Task</h2>
<form id="add-task-form" action="add_task.php" method="post">
  <div class="form-row">
    <div class="col">
      <label for="task_name">Task Name</label>
      <input id="task_name" class="form-control" type="text" name="task_name"></input>
    </div>
    <div class="col">
      <label for="due_date">Due Date</label>
      <input id="due_date" class="form-control" type="text" name="due_date"></input>
    </div>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input id="description" class="form-control" type="text" name="description"></input>
  </div>
  <div class="form-row">
    <div class="col">
      <button class="btn btn-primary" type="submit">Add New Task</button>
    </div>
    <div class="col">
      <button id="clear-btn" class="btn btn-secondary" type="button">Clear</button>
    </div>
  </div>
</form>
