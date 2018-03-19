<?php
  function yes_no($is_completed) {
    if($is_completed) {
      return "Yes";
    }
    return "No";
  }
?>
<h2>Task List</h2>
<table id="task-table" class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Date Uploaded</th>
      <th>Due Date</th>
      <th>Is Completed</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $tasks = $db->get_tasks();
      foreach ($tasks as $task) {
      ?>
        <tr class="task-row" data-id=<?php echo $task->id; ?> >
          <td><?php echo $task->name; ?></td>
          <td><?php echo $task->description; ?></td>
          <td><?php echo $task->uploaded_date; ?></td>
          <td><?php echo $task->due_date; ?></td>
          <td class="is_completed"><?php echo yes_no($task->is_completed); ?></td>
        </tr>
      <?php
      }
    ?>
  </tbody>
</table>
