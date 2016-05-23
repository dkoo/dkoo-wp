/**
 *
 * fetch more posts via WP AJAX actions
 *
 * Copyright (c) 2016 Derrick Koo
 * Licensed under the GPL-2.0+ license.
 */

// useful util methods
let utils = require('./utils.js');


( function() {
	'use strict';

	let posts = posts || document.querySelector('.posts'); // posts container

	if ( posts ) {
		// hide more button if JS is enabled
		document.querySelector('.more').classList.add('hidden');

		let moreBtn = moreBtn || document.querySelector('.more'), // more button
			temp = temp || document.createElement('div'), // a temporary element for converting HTML string to elements
			moreHandler = utils.debounce(() => {
				if ( window.innerHeight + window.scrollY >= document.body.scrollHeight - 50 ) {
					fetchPosts();
				}

			}, 250);

		// send a fetch request to the fetch_posts WP action
		let fetchPosts = function() {
			let offset = posts.querySelectorAll('article').length || 10;

			// show loading animation
			moreBtn.classList.add('loading');

			fetch(dkoo_ajax.url + `?action=fetch_posts&offset=${offset}&query_vars=${dkoo_ajax.query_vars}`, {
				method: 'get'
			}).then((response) => {
				return response.text();
			}).then((data) => {
				// convert returned HTML string to elements
				let frag = document.createDocumentFragment(),
					articles;

				temp.innerHTML = data;
				articles = temp.querySelectorAll('article');

				for ( let i = 0, len = articles.length; i < len; i++ ) {
					frag.appendChild(articles[i]);
				}

				// insert posts above the "more" button
				if ( moreBtn ) {
					posts.insertBefore(frag, moreBtn);
				}
			}).catch((error) => {
				console.log(error);
			});

			// remove loading animation
			moreBtn.classList.remove('loading');
		};

		module.exports = () => {
			// attach more posts listeners
			if ( moreBtn ) {
				// when user scrolls toward the bottom of the posts page
				if ( posts ) {
					window.addEventListener('scroll', moreHandler);
				}

				// when 'more' button is clicked to load more posts
				moreBtn.addEventListener('click', (e) => {
					e.preventDefault();
					fetchPosts();
				});
			}
		};
	}
} )();