
$(document).ready(function() {
    $('a.new-window').on('click', function(e) {
        e.preventDefault();
        var popup = window.open(this.href, '_blank', 'resizable=yes,height=700,width=800,status=no,location=no,scrollbars=yes');
    });
});

function closeWindow() {
    if (window.opener) {
        window.opener.location.reload();
    }
    window.close();
}
