/*=========================================
To delete all REACTIVATION in a given time difference.
=============================================*/
function deleterecovery(){
  var val = 1;
  $.ajax({
  type:'POST',
  url:'../controller/admincontrol.php',
  data: {
   delete:val
  },
  success: function (response){
  }
  });
}
$(document).ready(function(){
  $.ajaxSetup({cachie:false});
  setInterval(function(){deleterecovery();},2000);
});