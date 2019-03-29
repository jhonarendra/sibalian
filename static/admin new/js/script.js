$(document).ready(function(){
	$('.popup-show').click(function(){
		$('.overlay').css('display','block')
		$('.popup').css('display','block')
	});
	$('.popup .batal').click(function(){
		$('.overlay').css('display','none')
		$('.popup').css('display','none')
	})
})