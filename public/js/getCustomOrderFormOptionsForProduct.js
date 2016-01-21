$(document).ready(function() {

    var customOptionsHTML = "";
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
                           var customOptionsHTML = "";
                           var customOptionsHTML = "<h4>Custom Options</h4>";
                           var json = $.parseJSON(data);
                           console.log(json.type + " - " + json.date + " - " + json.version );

                           $.each(json.fields, function(i, item) {
                               console.log(i + " - " + json.fields[i].type + " - " + json.fields[i].required  );

                               if( json.fields[i].options){

                                   switch( json.fields[i].type ){
                                        case 'radio':
                                            customOptionsHTML += '<label class="form-label">'+i+'</label>';
                                            $.each(json.fields[i].options, function(j, jtem) {
                                                console.log( j + " - " + json.fields[i].options[j] )
                                                customOptionsHTML += j+': <input type="radio" name="'+i+'" value="'+json.fields[i].options[j]+'">';
                                            });
                                            break;
                                        case 'dropdown':
                                            customOptionsHTML += '<label class="form-label">'+i+'</label>';
                                            customOptionsHTML += '<select class="form-control" name="'+i+'" id="'+i+'">';
                                            $.each(json.fields[i].options, function(j, jtem) {
                                                console.log( j + " - " + json.fields[i].options[j] )
                                                customOptionsHTML += '<option value="'+json.fields[i].options[j]+'">'+j+'</option>';
                                            });
                                            customOptionsHTML += '</select>';
                                            break;
                                   }

                               } else {
                                   customOptionsHTML += '<label class="form-label">'+i+'</label>';
                                   customOptionsHTML += '<input class="form-control" type="text" name="'+i+'" id="'+i+'">';
                               }
                           });

                           console.log("HTML: " + customOptionsHTML);
                           $('#customOptions').empty();
                           $('#customOptions').append(customOptionsHTML);

                       }
                  });

              } else {

              }
          });

    });

});
