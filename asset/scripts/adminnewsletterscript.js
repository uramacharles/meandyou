$(document).ready(function(){
  $('.alert-danger').hide(5000);
  $("#newsletterform").submit(function(e){
    e.preventDefault();
    data = $("#newsletterform").serialize();
    $.ajax({
      url:"../controller/adminsendnewsletter.php",
      type:'POST',
      data:data,
      beforeSend:function(){
        $('.alert-danger').show(1000);
        $('.alert-danger').html("<img src = '../images/processing.gif' alt='Processing...' width='100%'>");
      },
      success:function(e){
        $('.alert-danger').html("<img src = '../images/success.png' alt='Processing...' width='100%'>");
        $('.alert-danger').hide(5000);
      },
      error: function(){
        $('.alert-danger').html("<img src = '../images/fail.png' alt='Processing...' width='100%'>");
      }
    });
  });
});