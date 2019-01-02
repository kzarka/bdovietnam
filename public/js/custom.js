$(document).ready(function() {
    "use strict";

    $('.theme-footer').on('click', 'a', function(e){
        e.preventDefault();
        let theme = $(this)[0].innerHTML;
        if (theme) {
            theme = theme.toLowerCase();
        }

        $.ajax({
            url: $('#set_theme_api').val() + '?theme=' + theme,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data == 'true') {
                    location.reload();
                }
            }
        });
    });
});