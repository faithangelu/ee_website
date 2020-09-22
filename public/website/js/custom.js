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

    $('.custom-file-input').on('change', function() { 
        let fileName = $(this).val().split('\\').pop(); 
        $(this).next('.custom-file-label').html(fileName); 
    });
})