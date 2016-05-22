/**
 * dkoo dot net
 * http://dkoo.net
 *
 * Copyright (c) 2016 Derrick Koo
 * Licensed under the GPL-2.0+ license.
 */

// fetch() polyfill
import 'whatwg-fetch';

// useful util methods
let utils = require('./modules/utils.js');


// the app
( function() {
	'use strict';

	// send a fetch request to the fetch_posts WP action
	let fetchPosts = function() {
		let offset = posts.querySelectorAll('article').length || 10;

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

			// if all posts have been loaded, remove the "more" button and the scroll event listener
			if ( offset + articles.length >= dkoo_ajax.total ) {
				moreBtn.parentNode.removeChild(moreBtn);
				window.removeEventListener('scroll', moreHandler);
			}
		}).catch((error) => {
			console.log(error);
		});
	};

	// when 'more' button is clicked to load more posts
	let moreBtn = document.getElementById('js-more'),
		posts = document.querySelector('.posts'),
		temp = document.createElement('div'),
		moreHandler = utils.debounce((e) => {
			if ( window.innerHeight + document.body.scrollTop >= document.body.scrollHeight - 50 ) {
				fetchPosts();
			}

		}, 25);

	if ( moreBtn ) {
		if ( posts ) {
			window.addEventListener('scroll', moreHandler);
		}

		moreBtn.addEventListener('click', (e) => {
			e.preventDefault();
			fetchPosts();
		});
	}

} )();
