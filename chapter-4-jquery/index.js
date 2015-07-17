jQuery(function($) {
    $('#circle').hover(function() {
        $('p').text('Over the circle');
    }, function() {
        $('p').text('Not over the circle');
    });

    $('#circle').click(function() {
        $('.square').fadeOut(800);
    });

    $('div').click(function() {
        console.log($(this).css('width'));

        $(this).css({'backgroundColor': 'blue'});
        $(this).animate({'width': '400px'});
    });
});
