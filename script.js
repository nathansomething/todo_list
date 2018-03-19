$(function() {
  $('tr.task-row').click(function() {
    var is_completed = $(this).find('td.is_completed');
    var tr = $(this);
    console.log(is_completed.text());
    if (is_completed.text() == 'No') {
      $.ajax({
        url: '/check_task.php?id=' + $(this).data('id') + '&check=true'
      }).done(function() {
        tr.addClass('completed');
        is_completed.text('Yes');
      });
    }
    else {
      $.ajax({
        url: '/check_task.php?id=' + $(this).data('id') + '&check=false'
      }).done(function() {
        tr.removeClass('completed');
        is_completed.text('No')
      });
    }
  });

  $('#clear-btn').click(function() {
    $('#add-task-form')[0].reset();
  });

  $('#remove-button').click(function() {
    $.ajax({
      url: '/remove_all.php'
    }).done(function() {
      $("#task-table").find("tbody").html("");
    });
  });
});
