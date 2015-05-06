$(document).ready(function() {
  var printBtn = $('button.print-btn');

  // Print mechanism
  printBtn.bind('click', function(e) {
    e.preventDefault();
    window.print();
  });

});
