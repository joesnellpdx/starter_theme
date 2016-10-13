/**
 * Project Theme
 * http://www.projectidsmagazine.com/
 *
 * Copyright (c) 2016 Joe Snell
 * Licensed under the GPL-2.0+ license.
 *
 * Theme functions file.
 */

( function( window, undefined ) {
	'use strict';

	var document = window.document;


	document.querySelector('.js-mobile-expandable-toggle').addEventListener('click', toggleMenu);

	/**
	 * Toggle the menu
	 * Open if closed, close if opened.
	 * Accomplished by adding and removing the class .is-open
	 */
	function toggleMenu(e) {

		var el = document.querySelector('.js-mobile-expandable'),
			className = 'is-open';

		if (el.classList) {
			el.classList.toggle(className);
		} else {
			var classes = el.className.split(' ');
			var existingIndex = classes.indexOf(className);

			if (existingIndex >= 0)
				classes.splice(existingIndex, 1);
			else
				classes.push(className);

			el.className = classes.join(' ');
		}

		return false;

	}

	/**
	 * Fade in images with imagesloaded.js
	 * @link http://imagesloaded.desandro.com/
	 */
	var body = 'body',
		activeClass = 'js-images-loaded';

	imagesLoaded( document.querySelector(body), function( instance ) {
		document.querySelector(body).className += ' ' + activeClass;
	});

} )( this );