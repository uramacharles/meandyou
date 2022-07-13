$(document).ready(function(){
 document.getElementById('textEdit').contentWindow.document.designMode="on";
 document.getElementById('textEdit').contentWindow.document.close();
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
});

function iBold (){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  edit.document.execCommand("bold", false, "");
  edit.focus();
}
function iUnderline(){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  textEdit.document.execCommand('underline',false,null);
 edit.focus();
}
function iItalic (){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  textEdit.document.execCommand('italic',false,null); 
 edit.focus();
}
function changeFont(){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
 textEdit.document.execCommand("FontName", false, $("#fonts").val() );
 edit.focus();
}
function iFontSize(){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  var size = document.getElementById("FontSize").value;
  textEdit.document.execCommand('FontSize',false,size);
 edit.focus();
}
function iForeColor (){
  var color='';
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  color = swal({
    title: "choose color:",
    text: '',
    type: 'input',
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top"
  }, function(intcolor){
    swal("done");
   textEdit.document.execCommand('ForeColor',false,intcolor);
    edit.focus();
  });
}
function iHorizontalRule(){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  textEdit.document.execCommand('insertHorizontalRule',false,'null');
 edit.focus();
}
function iUnorderedList(){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  textEdit.document.execCommand('InsertUnorderedList',false,null);
 edit.focus();
}
function iOrderedList(){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  textEdit.document.execCommand('InsertOrderedList',false,null);
 edit.focus();
}
function iLink(){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  var link = prompt("Past in the link","http://");
  textEdit.document.execCommand('CreateLink',false,link);
 edit.focus();
}
function iUnlink(){
 var edit = document.getElementById("textEdit").contentWindow;
 edit.focus();
  textEdit.document.execCommand('Unlink',false,null);
 edit.focus();
}
function iImage(){
///////////////////////////////////////////////////////////////
/// used to post the images asyncroniously
  
  var data = new FormData();
  data.append("jscript","1");
  $.each($("#img")[0].files,function(i,file){
    data.append("pictures[]",file);
  });
  $.ajax({
    url:"../controller/textEditorImageUploader.php",
    type:'POST',
    processData:false,
    contentType:false,
    data:data,
    beforeSend:function(){
      $('.alert-danger').show(500);
      $('.alert-danger').html('Posting, Please Wait...');
    },
    success:function(e){
        $('.alert-danger').html("Posted");
         var edit = document.getElementById("textEdit").contentWindow;
         edit.focus();
          textEdit.document.execCommand('insertHTML',false,e);
         edit.focus();
//        var old = $("#linkshowdiv").html();
   //     $('#linkshowdiv').html(old + e);
        $('.alert-danger').hide(10000);

      //$("#all_rows").load('controller/getpost.php');
    },
    error: function(e){
      swal("Opps","Something went wrong" ,"error");
    }
  });
}
setInterval(function(){
 var gyt=$("#textEdit").contents().find("body").html().match(/@/g);
 if($("#textEdit").contents().find("body").html().match(/@/g)>=0){}else{
  $("#description").val($("#textEdit").contents().find("body").html());
 }
 $("#description").val($("#textEdit").contents().find("body").html());
},1000);
