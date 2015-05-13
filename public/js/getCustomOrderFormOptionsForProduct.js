$(document).ready(function() {

    // $(".brandLookupByCategory").click(function(){
    //     return false;
    // });
    //
    // $(".brandLookupByCategory").change(function(){

    // $("#products").click(function(){
    //     return false;
    // });

    $("#productSelectDiv").change(function(){

        var cat_id = $('#categories').val();

        $.ajax({
          type: 'POST',
          url: "/orderform/getJsonDescription",
          data: { id:cat_id },
          cache: false
        })
          .done(function( msg ) {

              if(msg){

                  if(msg.status){
                      console.log('status: ' + msg.status);
                      $('#customOptions').empty();
                      return;
                  }

                  console.log(msg);
                  
                  $.ajax({
                       url: "/forms/"+msg.def_file,
                       dataType: "text",
                       success: function(data){
                           var json = $.parseJSON(data);
                           console.log(json.type + " - " + json.date + " - " + json.version );
                       }
                  });

            //      $('#customOptions').empty();
            //      $('#customOptions').append(customOptionsHTML);


              } else {

              }
          });

    });

});
