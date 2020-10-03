// $(document).ready(function() {

//     // like button for cards
//     $('.card').each(function(k, v) {
//         var index = k+1;
//         $('#favorite > #heart-' + index).click(function(e) 
//         {
//             e.preventDefault();// you dont want your anchor to redirect so prevent it
//             let id = $('a').data('id'); 
//             let project_id = $('#heart').data('id'); 
        
//             $.ajax({
//                 type: "post",
//                 data: { id : id, project_id : project_id, _token: '{{csrf_token()}}' },   
//                 url: "marketplace/favorite",
//                 success: function(data) {
//                     if (data)                 
//                         $(this).removeClass('liked');
//                     else 
//                         $(this).addClass('liked');                    
//                 }
//             })

//         })
//     })

//     $('.custom-file-input').on('change', function() { 
//         let fileName = $(this).val().split('\\').pop(); 
//         $(this).next('.custom-file-label').html(fileName); 
//     });
// })

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