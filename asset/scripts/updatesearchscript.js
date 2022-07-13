$(document).ready(function(){
  $("input#search").keyup(function(e){
    e.preventDefault();
    var val = document.getElementById('search').value;
    if (val !=""){
      $.ajax({
        url:"controller/getupdatesearch.php",
        type:'POST',
        data:{
          value:val
        },
        beforeSend:function(){
          $('.alert-danger').html('Please Wait. Saving...');
        },
        success:function(e){
            $('#likeresult').html(e);
        },
        error: function(){
          $('.alert-danger').html('Not Successfull. Please try again.');
        }
      });
    }
  });
});

$(document).ready(function(){
  $("#searchform").submit(function(e){
    e.preventDefault();
    data = $("#searchform").serialize();
    $.ajax({
      url:"controller/getupdatesearch.php",
      type:'POST',
      data:data,
      beforeSend:function(){
        $('.alert-danger').show(1000);
        $('.alert-danger').html('Sending, Please Wait...');
      },
      success:function(e){
        $('.alert-danger').html('Search result showing');
        $('#searchresults').html(e);
      },
      error: function(){
        $('.alert-danger').html('Not Successfull. Please try again.');
      }
    });
  });
});