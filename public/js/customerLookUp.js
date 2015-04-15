$(document).ready(function() {

    $("#existingCustomerFormSubmit").click(function(){
        return false;
    });

    $("#existingCustomerFormSubmit").click(function(){

        //alert('letsgo');
        var email = $('#returningCustomerEmail').val();


        $.ajax({
          type: 'POST',
          url: "/customer/lookup",
          data: { returningCustomerEmail:email },
          cache: false
        })
          .done(function( msg ) {
              if(msg.status == "success") {
                  var customerHTML = "<strong>" + msg.customername+"</strong><br />"
                    +msg.customeremail+"<br /><br />"
                    +msg.customeraddress+"<br />"
                    +msg.customercity+", "+msg.customerprov+"<br />"
                    +msg.customerpc+"<br /><br />"
                    +"Home: "+msg.customerhomephone+"<br />"
                    +"Work: "+msg.customerworkphone+"<br />"
                    +"Cell: "+msg.customercellphone+"<br />";

                  $("#customerinfo").empty();
                  $("#customerinfo").append("<div>"+customerHTML+"</div>");
                  console.log(msg);
              } else {
                  $("#customerinfo").empty();
                  $("#customerinfo").append("<div>"+msg.status+"</div>");
                  console.log(msg);
              }
          });

    });

});
