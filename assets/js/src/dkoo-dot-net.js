/**
 * dkoo dot net
 * http://dkoo.net
 *
 * Copyright (c) 2016 Derrick Koo
 * Licensed under the GPL-2.0+ license.
 */

// fetch() polyfill
import 'whatwg-fetch';

let more = require('./modules/more.js'),
	search = require('./modules/search.js');

// the app
( function() {
	'use strict';

	// fetch more posts via WP AJAX actions
	more();

	// search for posts via WP AJAX actions
	search();
} )();
