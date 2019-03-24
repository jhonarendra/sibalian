$(document).ready(function(){

	$(".jo-show").addClass("jo-hide");
	var offsetTop = $(".jo-show").offset().top;

	var scrollTop = $(window).scrollTop();
	var windowHeight = $(window).height();

	var showPoint = scrollTop + windowHeight - 50;

	if(showPoint>offsetTop){
		$(".jo-show").addClass("animated bounceIn");
		$(".jo-show").removeClass("jo-hide");
	}

	var currentScrollTop = 0;
	$(window).scroll(function(){
		var newScrollTop = $(window).scrollTop();

		currentScrollTop = newScrollTop;

		$(".jo-show").each(function(i){
			var offsetTop = $(this).offset().top;
			var scrollTop = $(window).scrollTop();
			var windowHeight = $(window).height();

			var showPoint = scrollTop + windowHeight - 50;
			if(showPoint>offsetTop){
				$(this).addClass("animated bounceIn");
				$(this).removeClass("jo-hide");
			}
		});
	});
});