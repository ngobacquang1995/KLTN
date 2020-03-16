
//Camera Slide-Show Custom Js Here.
$(function () {
    $('.camera_wrap').camera({
        playPause: true,
        navigation: true,
        navigationHover: true,
        hover: false,
        loader: 'bar',
        loaderColor: 'red',
        loaderBgColor: '#222222',
        loaderOpacity: 1,
        loaderPadding: 0,
        time: 9000,
        transPeriod: 1500,
        pauseOnClick: true,
        pagination: true
    });
});

// slick autoplay 
$(document).ready(function(){
	<!-- slick -->
	$('.slick-show-4.autoplay').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 9000,
	  arrows: false,
	  dots: true,
		responsive: [
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 321,
			settings: {
				slidesToShow: 1
			}
		}
		]
	});
}); 
$(document).ready(function(){
	<!-- slick -->
	$('.slick-show-1.autoplay').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 9000,
	  arrows: false,
	  dots: true
	});
});