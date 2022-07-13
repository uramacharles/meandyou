$(window).load(function(){
	var latestPost = 
	{
		slide: function(){
			var interval = 4000;
			var slideIntime = 1000;
			var slideOuttime = 1000;
			var currentItem = 0;
			var divcount = $(".slidediv").length;
			var infiniteLoop = setInterval(function(){
				$(".slidediv").eq(currentItem).fadeOut(slideOuttime);

				if(currentItem == divcount-1){
					currentItem = 0;
				}else{
					currentItem++;
				}
				$(".slidediv").eq(currentItem).fadeIn(slideIntime);			
			} , interval);
		}
	};
	latestPost.slide();
});



/*

$(window).load(function(){
	var nthslide = 
	{
		start: function(){
			var divnum = 2;
			var interval2 = 3000;
			var slideIntime2 = 1000;
			var slideOuttime2 = 500;

			var currentItem2 = 0;
			var divcount2 = $(".slideitem").length;
			for( var j=0; j<=divnum-1; j++){
				$(".slideitem").eq(currentItem2+j).fadeIn(slideOuttime2);
			}
			currentItem2++;
			alert(currentItem2)
			var infiniteLoop = setInterval(function(){
				var co = 0;
				for (var i = 1; i <= divcount2; i++) {
					$(".slideitem").eq(currentItem2 + i).fadeOut(slideOuttime2);
					if(co >= divnum){
						currentItem2 ++
						co = 0
					}else{
						$(".slideitem").eq(currentItem2 + co).fadeIn(slideOuttime2);
						co++;
					}
				}

			} , interval2);
		}
	};
	nthslide.start();
});

$(document).ready(function(){
	var divnum = 2;
	var interval2 = 3000;
	var slideIntime2 = 1000;
	var slideOuttime2 = 500;

	var currentItem2 = 0;
	var divcount2 = $(".slideitem").length;

	for( var j=0; j<=divcount2; j++){
		$(".slideitem").eq(currentItem2+j).hide();
	}
	for( var j=0; j<=divnum; j++){
		$(".slideitem").eq(currentItem2+j).show(slideOuttime2);
	}
	setInterval(function(){ 
		var co = 0;
		for (var i = 0; i < divcount2; i++) {
			$(".slideitem").eq(i).hide(slideOuttime2);
			if(co > divnum){
				currentItem2 ++;
				co = 0;
			}else{
				$(".slideitem").eq(currentItem2+co).fadeIn(slideOuttime2);
				co++;
			}
		}
	},2000);

$(document).ready(function(){
	function startslide(divnum,interval2,slideIntime2,slideOuttime2,slideclass,currentItem2){
		var divcount2 = $(slideclass).length;

		for( var j=0; j<=divcount2; j++){
			$(slideclass).eq(currentItem2+j).hide();
		}
		for( var j=0; j<=divnum-1; j++){
			$(slideclass).eq(currentItem2+j).show();
		}
		setInterval(function(){ 
			if(currentItem2 == divcount2){
				startslide(divnum,interval2,1000,1000,slideclass,0);
			}else{
				var co = 0;
				for (var i = 0; i < divcount2; i++) {
					$(slideclass).eq(i).hide(slideOuttime2);
					if(co >= divnum){
						currentItem2 ++;
						co = 0;
					}else{
						$(slideclass).eq(currentItem2+co).fadeIn(slideOuttime2);
						co++;
					}
				}
			}
		},interval2);
	}
	startslide(2,7000,1000,1000,".slideitem",0);
});
*/


