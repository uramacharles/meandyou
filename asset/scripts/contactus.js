$(document).ready(function(){
  $('.alert-danger').hide(5000);
  $("#contact").submit(function(e){
    e.preventDefault();
    data = $("#contact").serialize();
    $.ajax({
      url:"controller/u_contactuscontrol.php",
      type:'POST',
      data:data,
      beforeSend:function(){
        $('.alert-danger').show(500);
        $('.alert-danger').html('Sending message, Please Wait...');
      },
      success:function(e){
        swal("Successful.","Sent. Our agent will get back to you soon!", "success");
        $('.alert-danger').html("");
        $('.alert-danger').hide(10000);
      },
      error: function(){
        swal('Please try again');
        $('.alert-danger').html('');
      }
    });
  });
});