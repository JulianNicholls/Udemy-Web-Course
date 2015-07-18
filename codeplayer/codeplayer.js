$(function() {
    resizeColumns();

    $('.toggle').click(function() {
        var $this   = $(this),
            column  = '#' + $this.text().toLowerCase(),
            $column = $(column);

        $this.toggleClass('enabled');
        $column.toggleClass('enabled');

        resizeColumns();
    });
});

function resizeColumns() {
    var count = visibleColumns(),
        width = Math.floor(100 / count) - 1;

    $('.column').each(function() {
        $(this).css('width', width + '%')
    })

}

function visibleColumns() {
    var count = 0;

    $('.column').each( function() {
        if($(this).hasClass('enabled')) {
            ++count;
        }
    });

    return count;
}
