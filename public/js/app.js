$(document).ready( function () {
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href); // Force no form resubmission.
    }

    $('form').submit(function() {
        $(this).find("button[type='submit']").prop('disabled',true);
        $(this).find("button[type='submit']").html('<div class="cool-spinner"></div>');
    }); // Any forms, simply only allow submit once. And add spinner :)
});