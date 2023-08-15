// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "lengthMenu": [[1, 2, 5, -1], [1, 2, 5, "All"]],
  });

});
