$(document).ready(function() {

    // like button for cards
    $('.card').each(function(k, v) {
        var index = k+1;
        $('#favorite > #heart-' + index).click(function() 
        {

            if ($(this).hasClass('liked')) 
            {
                $(this).removeClass('liked');
            } else 
            {
                $(this).addClass('liked');
            }
        })
    })
})