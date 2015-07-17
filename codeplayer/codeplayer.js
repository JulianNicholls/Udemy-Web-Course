$(function() {
    resizeColumns();

    $('.toggle').click(function() {
        var $this   = $(this),
            column  = '#' + $this.text().toLowerCase(),
            $column = $(column);

        console.log(column);

        $this.toggleClass('enabled');
        $column.toggleClass('enabled');

        resizeColumns();
    });
});

function resizeColumns() {
    var columns = $('.column'),
        count = visibleColumns(),
        width = Math.floor(100 / count) - 1;

    columns.each(function() {
        if($(this).hasClass('enabled')) {
            $(this).css('width', width + '%')
        }
    })

}

function visibleColumns() {
    var columns = $('.column'),
        count = 0;

    columns.each( function() {
        if($(this).hasClass('enabled')) {
            ++count;
        }
    });

    return count;
}
