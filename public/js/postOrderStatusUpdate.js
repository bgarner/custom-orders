$(document).ready(function() {

    //disable the default action
    $("#postOrderStatusSubmit").click(function(){
        return false;
    });

    $("#postOrderStatusSubmit").click(function(){
        $(".error").hide();
        var hasError = false;

        var orderVal = $("#order_id").val();
        var userVal = $("#user").val();
        var statusVal = $("#status").val();
        var notesVal = $("#notes").val();

        console.log("order id: " + orderVal);
        //validation
        if(notesVal == '') {
            $("#notes").after('<span class="error">Oops, you forgot to say something.</span>');
            hasError = true;
        }

        if(hasError == false) {


            $.ajax({
              type: 'POST',
              url: "/order/postStatus",
              data: { order_id: orderVal, user: userVal, order_status_type: statusVal, description: notesVal },
              cache: false
            }) .done(function( msg ) {

                var update = '<li>'
                +'<i class="fa fa-check-circle bg-green" data-toggle="tooltip" data-placement="top" title="" data-original-title="Message"></i>'
                +'<div class="timeline-item">'
                    +'<span class="time"><i class="fa fa-clock-o"></i> Just Now</span>'
                    +'<h3 class="timeline-header no-border"><a href="#">You said</a>  '+notesVal+'</h3>'
                    +'</div>'
                +'</li>';

                $('#statusUpdateForm').before($( update ).hide().fadeIn(1000));
                $('#notes').val('');

            });
        }

    });


    // $(document).on('click','.comment-delete',function(){
    //
    //     var commentidVal = $(this).attr('data-comment');
    //     var selector = "#comment"+commentidVal;
    //
    //     $.post("/deletecomment",{ comment_id: commentidVal })
    //         .done( function(data){
    //             $(selector).closest('tr').fadeOut(2000);
    //         });
    //     return false;
    // });
    //
    // $(document).on('click','.comment-delete-inblog',function(){
    //
    //     var commentidVal = $(this).attr('data-comment');
    //     var selector = "#comment"+commentidVal;
    //
    //     $.post("/deletecomment",{ comment_id: commentidVal })
    //     .done( function(data){
    //         $(selector).closest('div').fadeOut(2000);
    //     });
    //     return false;
    // });

});
