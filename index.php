<!DOCTYPE>
<html>
  <head>
    <title>Todo List</title>
    <script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
  </head>
  <body div class="container">
    <p>
      <?php
        require_once("root.php");
        require_once("task.php");
        require_once("database.php");
        $db = new Database();
        $db->setup();
        $template = $twig->load('list_tasks.html');
      ?>
    </p>
    <h1 class="text-center">Todo List Application</h1>
    <div class="row">
      <div class="col-md-8"><?php echo $template->render(array('tasks' => $db->get_tasks())) ?></div>
      <div class="col-md-4"><?php require_once("new_task.php"); ?></div>
    </div>
    <button id="remove-button" class="btn btn-primary">Remove All Tasks</button>
  </body>
</html>
