$(document).ready(function(){
	$('#searchname').hide();
	$('#searchposition').hide();
	$('#searchpracticearea').hide();
	$('#viewsearchdiv').click(function(){
		$('#searchname').toggle(1000);
		$('#searchposition').toggle(1200);
		$('#searchpracticearea').toggle(1300);
	});
});