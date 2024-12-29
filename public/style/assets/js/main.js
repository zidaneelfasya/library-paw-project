$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});
	// Add this to your existing JavaScript file
$(document).ready(function () {
    // Function to handle the successful login transition
    function showSuccessMessage() {
        $('#loginForm').addClass('form-hidden');
        $('#successMessage').css('display', 'block').animate({ opacity: 1 }, 500);
    }

    // Event listener for the "Sign in" button
    $('#loginBtn').on('click', function (e) {
        e.preventDefault();
        
        // Simulating a successful login (replace this with your actual login logic)
        // For demonstration purposes, showing the success message after a delay
        setTimeout(function () {
            showSuccessMessage();
        }, 1000);
    });
});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });


});