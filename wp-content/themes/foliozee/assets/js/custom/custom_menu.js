// JavaScript Document
jQuery(document).ready(function($){
	"use strict";
	
	/* Scroll To Navigation */
	jQuery('#head-nav li').on('click', function(){
		jQuery('#top-nav').onePageNav({
			currentClass: 'current',
			changeHash: true,
			scrollSpeed: 800,
			scrollOffset: 0,
			scrollThreshold: 0.3, // how much part of the upper section has to be visible .5 = 50% it effects navigations active hash
			easing: 'swing',
			filter: ':not(.external a)'
		});
	});
	jQuery('#top-nav li').on('click', function(){
		jQuery('#head-nav').onePageNav({
			currentClass: 'current',
			changeHash: true,
			scrollSpeed: 800,
			scrollOffset: 0,
			scrollThreshold: 0.3,
			easing: 'swing',
			filter: ':not(.external a)',
			
		});
	});
	
		jQuery('#top-nav').onePageNav({
			currentClass: 'current',
			changeHash: true,
			scrollSpeed: 800,
			scrollOffset: 0,
			scrollThreshold: 0.3,
			easing: 'swing',
			filter: ':not(.external a)'
		});
		jQuery('#head-nav').onePageNav({
			currentClass: 'current',
			changeHash: true,
			scrollSpeed: 800,
			scrollOffset: 0,
			scrollThreshold: 0.3,
			easing: 'swing',
			filter: ':not(.external a)'
		});
});
