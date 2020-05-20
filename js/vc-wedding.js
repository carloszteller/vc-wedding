$(document).ready(function() {
	$('header').css({ height: $(window).height() });
	
	$('nav.navbar > .container > .navbar-header > .navbar-toggle').click(function() {
		$('.navbar > .container > .navbar-header > .navbar-toggle > i').toggleClass('fa-bars fa-times');
	});
	
	$('.navbar > .container > #nav > .nav > li > a').click(function() {
		$('html, body').animate({
			scrollTop: $($(this).attr("href")).offset().top - 50
		}, 'slow');
	});

	var map, marker;
	var latLng = { lat: 29.6161623, lng: -98.7563123 };
	
	function initMap() {
		map = new google.maps.Map(document.getElementById('map-canvas'), {
				center: latLng,
				zoom: 15,
				scrollwheel: false
			});
		
		marker = new google.maps.Marker({
					position: latLng,
					map: map
				});
	}
	
	google.maps.event.addDomListener(window, 'load', initMap);
	
	$(window).scroll(function() {
		if($(this).scrollTop() > $('.navbar').offset().top) {
			$('.navbar').addClass('navbar-fixed-top');
			$('.navbar').removeClass('navbar-static-top');
			$('#story').css({ 'margin-top': '75px' });
		}
		
		if($(this).scrollTop() < ($('header.jumbotron').offset().top + $(this).height())) {
			$('.navbar').removeClass('navbar-fixed-top');
			$('.navbar').addClass('navbar-static-top');
			$('#story').css({ 'margin-top': '0' });
		}
		
		if($(this).scrollTop() > 250) {
			$('.top').fadeIn();
		} else {
			$('.top').fadeOut();
		}
	});
	
	$('#rsvp-form').submit(function(e) {
		e.preventDefault();
		
		$.ajax({
			type: 'post',
			data: $(this).serialize(),
			dataType: 'html',
			success: function() {
				$('.submit-message').removeClass('alert alert-dismissable alert-danger in');
				$('.submit-message').addClass('alert alert-dismissable alert-success in').html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>RSVPed successfully! Can\'t wait to share our day with you!');
				
				$('form').trigger('reset');
			},
			error: function() {
				$('.submit-message').removeClass('alert alert-dismissable alert-success in');
				$('.submit-message').addClass('alert alert-dismissable alert-danger in').html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to send RSVP. Please try again later.');
				
				$('form').trigger('reset');
			}
		});
	});
	
	$('.top').click(function() {
		$('html, body').animate({
			scrollTop: 0
		}, 'slow');
	});
	
	if($(window).width() >= 992) {
		$('#story > .container > .row > .col-md-6 > .carlos').css({ 'min-height': ($("#story > .container > .row > .col-md-6 > .velvet").outerHeight() + 'px') });
	}
	
	$(window).resize(function() {
		if($(this).width() >= 992) {
			$('#story > .container > .row > .col-md-6 > .carlos').css({ 'min-height': ($("#story > .container > .row > .col-md-6 > .velvet").outerHeight() + 'px') });
		} else {
			$('#story > .container > .row > .col-md-6 > .carlos').css({ 'min-height': 'inherit' });
		}
		
		if($(this).width() <= 768) {
			$('#story > .container > .row > .col-md-6 > .velvet > img').removeClass('pull-right');
			$('#story > .container > .row > .col-md-6 > .carlos > img').removeClass('pull-left');
		}
	});
});