
$(document).ready(function() {
    var $document = $(this);
    $('#patient-prehistory-form').bind('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            async: false,
            statusCode: {
                200: function (data) {
                    $document.replaceWith(data);
                },
                302: function (data) {
                    closeWindow();
                }
            }
        });
    });
});