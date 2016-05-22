// useful util methods
let utils = require('./utils.js');

( function() {
	'use strict';

	let posts = posts || document.querySelector('.posts'); // posts container

	if ( posts ) {
		let moreBtn = moreBtn || document.querySelector('.more'), // more button
			searchBtn = document.querySelector('.search'), // search button
			searchIcon = searchBtn.querySelector('i'), // search icon
			search = document.querySelector('nav.search'), // search form
			searchInput = search.querySelector('input.search'), // search input field
			searchClose = search.querySelector('.close'), // search close button,
			query_vars = JSON.parse(dkoo_ajax.query_vars), // wp_query vars
			temp = temp || document.createElement('div'), // a temporary element for converting HTML string to elements
			searchHandler = utils.debounce((e) => {
				searchPosts(e.target.value);
			}, 500),
			clearSearch = () => {
				posts.classList.remove('searching');
				searchIcon.classList.remove('fa-search-minus');
				searchInput.value = '';
				searchInput.blur();
				searchPosts('');
			};

		let searchPosts = (searchTerm) => {
			if ( query_vars.s !== searchTerm && query_vars.tag !== searchTerm ) {
				query_vars.s = searchTerm;

				let query = JSON.stringify(query_vars);

				fetch(dkoo_ajax.url + `?action=search_posts&searchTerm=${searchTerm}&query_vars=${query}`, {
					method: 'get'
				}).then((response) => {
					return response.text();
				}).then((data) => {
					// convert returned HTML string to elements
					let frag = document.createDocumentFragment(),
						articles = posts.querySelectorAll('article'),
						i,
						len;

					for ( i = 0, len = articles.length; i < len; i++ ) {
						articles[i].parentNode.removeChild(articles[i]);
					}

					temp.innerHTML = data;
					articles = temp.querySelectorAll('article');

					for ( i = 0, len = articles.length; i < len; i++ ) {
						frag.appendChild(articles[i]);
					}

					// insert posts above the "more" button
					if ( moreBtn ) {
						posts.insertBefore(frag, moreBtn);
					}

					dkoo_ajax.query_vars = JSON.stringify(query_vars);
				}).catch((error) => {
					console.log(error);
				});
			}
		};

		module.exports = () => {
			// attach search listeners
			if ( searchBtn ) {
				searchBtn.addEventListener('click', (e) => {
					e.preventDefault();
					if ( searchIcon.classList.contains('fa-search-minus') ) {
						clearSearch();
					} else {
						searchIcon.classList.add('fa-search-minus');

						posts.classList.add('searching');
						searchInput.focus();
					}
				});
			}

			if ( searchClose ) {
				searchClose.addEventListener('click', (e) => {
					e.preventDefault();

					clearSearch();
				});
			}

			if ( searchInput ) {
				// if user hits escape or enter while in search input
				searchInput.addEventListener('keydown', (e) => {
					if ( e.keyCode === 27 ) {
						clearSearch();
					} else if ( e.keyCode === 13 ) {
						e.target.blur();
					}
				});

				// if user types while in search input
				searchInput.addEventListener('keyup', searchHandler);
			}
		};
	}
} )();