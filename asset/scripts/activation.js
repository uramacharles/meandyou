
/*=========================================
javascript to resend the code
=============================================*/
$(document).ready(function(){
  $('.alert-danger').hide(5000);
  $("#resendform").submit(function(e){
    e.preventDefault();
    data = $("#resendform").serialize();
    $.ajax({
      url:"controller/activationcontrol.php",
      type:'POST',
      data:data,
      beforeSend:function(){
        $('.alert-danger').show(1000);
        $('.alert-danger').html('Sending, Please Wait...');
      },
      success:function(e){
        $('.alert-danger').html(e);
        $('.alert-danger').hide(5000);
      },
      error: function(){
        $('.alert-danger').html('Not Successfull. Please try again.');
      }
    });
  });
});
/*=========================================
javascript to send the activation code accross
=============================================*/
$(document).ready(function(){
  $('.alert-danger').hide(5000);
  $("#activationform").submit(function(e){
    e.preventDefault();
    data = $("#activationform").serialize();
    $.ajax({
      url:"controller/activationcontrol.php",
      type:'POST',
      data:data,
      beforeSend:function(){
        $('.alert-danger').show(1000);
        $('.alert-danger').html('Sending, Please Wait...');
      },
      success:function(e){
        $('.alert-danger').html(e);
        $('.alert-danger').hide(5000);
      },
      error: function(){
        $('.alert-danger').html('Not Successfull. Please try again.');
      }
    });
  });
});
/*=========================================
To delete all activation in a given time difference.
=============================================*/
function deleteactivation(){
  var val = 1;
  $.ajax({
  type:'POST',
  url:'controller/activationcontrol.php',
  data: {
   delete:val
  },
  success: function (response){
  }
  });
}
$(document).ready(function(){
  $.ajaxSetup({cachie:false});
  setInterval(function(){deleteactivation();},2000);
});