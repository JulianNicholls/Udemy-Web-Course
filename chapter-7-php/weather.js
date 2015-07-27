$(function() {
    $('#forecast').click(function(event) {
        event.preventDefault();

        var location = $("#location").val();

        $('#fail').fadeOut();
        $('#weather').fadeOut();
        if(location != '') {
            $.ajax('scraper.php', { data: { 'location': location } }).done(function(data) {
                if(data == '') {
                    show_error('No weather information was found for <strong>' + location + '</strong>');
                }
                else {
                    $('#weather').html(data).slideDown();
                }
            });
        }
        else {
            show_error('You must enter a location');
        }
    });
});

function show_error(text) {
    $('#fail span#error').html(text);
    $('#fail').slideDown();
}
