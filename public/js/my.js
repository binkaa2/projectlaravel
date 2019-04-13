$(".menu1").next('ul').toggle();

$(".menu1").click(function(event) {
	$(this).next("ul").toggle(500);
});

$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
});
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
			dots: false,
			autoplay: true,
			 items: 1,
			 stagePadding: 300,
			 loop: true,
			 margin:10,
    	 nav:true,
			 slideSpeed : 300,
			 lazyLoad: true,
			 smartSpeed:450

	});
});
