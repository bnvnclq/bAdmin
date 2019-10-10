$(function () {
    // ============================================================== 
    // Auto select left navbar
    // ============================================================== 
    $(function() {
        var arr_route_prefix = window.location.pathname.split('/');
        var boo_found = false;
        $.each(arr_modules, function (indexInArray, valueOfElement) { 
            if($.inArray(valueOfElement, arr_route_prefix) > -1)
            {
                $('.nav_links').removeClass('active')
                boo_found = true;
                $('#nav_' + valueOfElement).addClass('active');
                // break;
            }
        });
        if(!boo_found)
        {
            $('#nav_dashboard').addClass('active');
        }
    });

    // ============================================================== 
    // Initialize tooltip
    // ============================================================== 
    $('[data-toggle="tooltip"]').tooltip();

    // ============================================================== 
    // Initialize switch
    // ============================================================== 
    $('[data-toggle="switch"]').bootstrapSwitch();
});
