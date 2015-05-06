
$(document).ready(function() {
    var section = $('section.sec_gap40'),
        catheterizationForm = $('#catheterization-form'),
        submitted = false;

    // Close window after submission
    catheterizationForm.on('submit', function(e) {
        e.preventDefault();

        if (submitted) {
            return;
        } else {
            submitted = true;
        }

        $.ajax({
            type: 'POST',
            url: catheterizationForm.action,
            data: catheterizationForm.serialize(),
            statusCode: {
                302: function() {
                    window.opener.location.reload();
                    window.close();
                },
                200: function() {
                    window.opener.location.reload();
                    window.close();
                },
                500: function() {
                    submitted = false;
                }
            }
        });
    });

});
