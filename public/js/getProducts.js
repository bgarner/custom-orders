$(document).ready(function() {

    $("#brandSelectDiv").click(function(){
        return false;
    });

    $("#brandSelectDiv").change(function(){

        var cat = $('#categroies').val();
        var brand = $('#brands').val();

        console.log('cat:' + cat);
        console.log('brand:' + brand);

        $.ajax({
          type: 'POST',
          url: "/product/getProductsByBrandAndCategory",
          data: {  brand_id:brand, cat_id:cat },
          cache: false
        })
          .done(function( msg ) {
              if(msg){
                  console.log(msg);

                  var productsHTML = "<select class='form-control' id='products' name='products'>";
                  productsHTML += "<option value=''>Select a Product</option>";

                  jQuery.each(msg, function(i, val) {
                      productsHTML += "<option value='"+msg[i].id+"'>"+msg[i].name+"</option>";
                  });

                //   for( var key in msg ){
                //       productsHTML += "<option value='"+msg.id+"'>"+msg.name+"</option>";
                //   }

                  productsHTML +="</select>";

                  $('#productSelectDiv').empty();
                  $('#productSelectDiv').append(productsHTML);

                  console.log(productsHTML);
              } else {
                //   var brandselectHTML = "<select class='form-control'>"
                //   +"<option> something </option>"
                //     + "</select>";
                  //
                //   $('.brandSelect').empty();
                //   $('.brandSelect').append(brandselectHTML);
                //   console.log(msg);
              }
          });

    });

});
