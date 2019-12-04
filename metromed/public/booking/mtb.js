$(document).ready(function() {
  //Change in service dropdown list will trigger this function and
  //generate dropdown options for provider dropdown
  $(document).on('change','#service', function() {
    var service_id = $(this).val();
    if(service_id != "") {
      $.ajax({
        url:"get_services.php",
        type:'POST',
        data:{service_id:service_id},
        success:function(response) {
          //var resp = $.trim(response);
          if(response != '') {
            $("#provider").removeAttr('disabled','disabled').html(response);
            $("#state").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          } else {
           $("#provider, #state").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          }
        }
      });
    } else {
      $("#provider, #state").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
    }
  });
  //Change in provider dropdown list will trigger this function and
  //generate dropdown options for state dropdown
  $(document).on('change','#provider', function() {
    var provider_id = $(this).val();
    if(provider_id != "") {
      $.ajax({
        url:"get_services.php",
        type:'POST',
        data:{provider_id:provider_id},
        success:function(response) {
          //var resp = $.trim(response);
          if(response != '') {
            $("#state").removeAttr('disabled','disabled').html(response);
          } else {
            $("#state").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
          }
        }
      });
    } else {
      $("#state").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
    }
  });
  //Change in state dropdown list will trigger this function and
  //generate dropdown options for city dropdown
  // $(document).on('change','#state', function() {
  //   var state_id = $(this).val();
  //   if(state_id != "") {
  //     $.ajax({
  //       url:"get_services.php",
  //       type:'POST',
  //       data:{state_id:state_id},
  //       success:function(response) {
  //         if(response != '') {
  //           $("#city").removeAttr('disabled','disabled').html(response);
  //         } else {
  //           $("#city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
  //         }
  //       }
  //     });
  //   } else {
  //     $("#city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
  //   }
  // });
});
