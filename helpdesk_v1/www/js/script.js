$(document).ready(function() {
    $('input[data-dateinput-type]').dateinput({
        datetime: {
            dateFormat: 'd.m.yy',
            timeFormat: 'H:mm',
            options: { // nastavení datepickeru pro konkrétní typ
                changeYear: true
            }
        },
        'datetime-local': {
            dateFormat: 'd.m.yy',
            timeFormat: 'H:mm'
        },
        date: {
            dateFormat: 'd.m.yy'
        },
        month: {
            dateFormat: 'MM yy'
        },
        week: {
            dateFormat: "w. 'týden' yy"
        },
        time: {
            timeFormat: 'H:mm'
        },
        options: { // globální nastavení datepickeru
            closeText: "Close"
        }
    });
});

$('#container').on("mouseenter mouseleave", "table.grido tbody tr",
    function(){
        $(this).toggleClass("active");
    }
);

function pop_up(hyperlink, window_name)
{
        if (! window.focus)
                return true;
        var href;
        if (typeof(hyperlink) == 'string')
                href=hyperlink;
        else
                href=hyperlink.href;
        window.open(
                href,
                window_name,
                'width=700,height=500,toolbar=no, scrollbars=yes'
        );
        return false;
}