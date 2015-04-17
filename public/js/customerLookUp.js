$(document).ready(function() {

    $("#existingCustomerFormSubmit").click(function(){
        return false;
    });

    $("#existingCustomerFormSubmit").click(function(){

        var email = $('#returningCustomerEmail').val();

        $.ajax({
          type: 'POST',
          url: "/customer/lookup",
          data: { returningCustomerEmail:email },
          cache: false
        })
          .done(function( msg ) {
              if(msg.status == "success"){
                  var customerHTML = "<strong>" + msg.customername+"</strong><br />"
                    +msg.customeremail+"<br /><br />"
                    +msg.customeraddress+"<br />"
                    +msg.customercity+", "+msg.customerprov+"<br />"
                    +msg.customerpc+"<br /><br />"
                    +"Home: "+msg.customerhomephone+"<br />"
                    +"Work: "+msg.customerworkphone+"<br />"
                    +"Cell: "+msg.customercellphone+"<br />"
                    +"<br /><strong>Is this information correct?</strong><br />"
                    +"<a href='/customer/edit/"+msg.customerid+"'><button><i class='fa fa-pencil-square-o'></i> No, edit this profile</button></a>  "
                    +"<form style='display:inline;' id='startNewOrder' name='startNewOrder' method='POST' action='/order/new/form'><input type='hidden' name='customerId' id='customerId' value='"+msg.customerid+"' /><button><i class='fa fa-check-circle'></i> Yes, create a new order</button></form>";
                  $("#customerinfo").empty();
                  $("#customerinfo").append(customerHTML);
                  console.log(msg);
              } else {
                  $("#customerinfo").empty();
                  $("#customerinfo").append(msg.status);
                  console.log(msg);
              }
          });

    });

});
