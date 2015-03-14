$(document).ready(function() {
    $("#searchButton").click(function() {
        window.location.replace($(this).data('url')+'?key='+$('input[name="keyword"]').val());
    });

    $('input[name="keyword"]').keyup(function (e) {
        if (e.keyCode == 13) {
            // Do something
            $("#searchButton").click();
        }
    });
});