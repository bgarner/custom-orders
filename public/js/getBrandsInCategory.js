$(document).ready(function() {

    // $(".brandLookupByCategory").click(function(){
    //     return false;
    // });
    //
    // $(".brandLookupByCategory").change(function(){

    $("#categories").click(function(){
        return false;
    });

    $("#categories").change(function(){

        var catid = $(this).val();

        $.ajax({
          type: 'POST',
          url: "/product/brandsInCategory",
          data: { id:catid },
          cache: false
        })
          .done(function( msg ) {

              if(msg){

                  if(msg.status){
                      console.log('status: ' + msg.status);
                      $('#brandSelectDiv').empty();
                      return;
                  }

                  console.log(msg);

                  var brandselectHTML = "<select class='form-control productLookUpByBrand' id='brands' name='brands'>";
                  brandselectHTML += "<option value=''>Select a Brand</option>";
                  for( var key in msg ){
                      brandselectHTML += "<option value='"+key+"'>"+msg[key]+"</option>";
                  }
                  brandselectHTML +="</select>";

                  $('#brandSelectDiv').empty();
                  $('#brandSelectDiv').append(brandselectHTML);

                  console.log(brandselectHTML);
              } else {

              }
          });

    });

});
