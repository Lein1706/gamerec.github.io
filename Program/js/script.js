// event pada saat link
$('.page-scroll').on('click', function(e){

	// ambil isi href 
	var tujuan = $(this).attr('href')
	// tengkap elemen yang bersangkutan
	var elementujuan = $(tujuan);

	// pindahkan scroll
	$('html,body').animate({
		scrollTop: elementujuan.offset().top - 50
	}, 500, 'easeInOutExpo');

	e.preventDefault();
});


$(window).scroll(function() {
	var wScroll = $(this).scrollTop();

	$('css, .jumbotron img').css({
		'transform' : 'translate(0px, '+ wScroll/4 +'%)'
	})
	$('css, .jumbotron h1').css({
	'transform' : 'translate(0px, '+ wScroll/2 +'%)'
	})
	$('css, .jumbotron p').css({
	'transform' : 'translate(0px, '+ wScroll/1.5 +'%)'
	})

	// portfolio
	if( wScroll > $('css, .portfolio').offset().top -250 ){
		$('html,css, .portfolio .thumbnail').each(function(i) {
			setTimeout(function() {
				$('html, css, .portfolio .thumbnail').eq(i).addClass('muncul');
			}, 500 * (i+1));
		});

		
	}



});
