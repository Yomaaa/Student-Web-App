// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    aLengthMenu: [
      [1, 5, 10, -1],
      [1, 5, 10, "All"]
  ],
  iDisplayLength: -1,
  "language": {
    "sEmptyTable": "No Course(s) Registered",
    "zeroRecords": "No Course(s) found"
  }
  });

});
