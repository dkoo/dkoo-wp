/**
 *
 * useful util methods
 *
 * Copyright (c) 2016 Derrick Koo
 * Licensed under the GPL-2.0+ license.
 */

// do not execute func unless it has not been exeucted in at least delay ms
module.exports = {
	debounce: (func, delay, immediate) => {
		let timeout,
			curried = function() {
				let context = this, args = arguments;
				let later = function() {
					timeout = null;
					if (!immediate) func.apply(context, args);
				};
				let callNow = immediate && !timeout;
				clearTimeout(timeout);
				timeout = setTimeout(later, delay);
				if (callNow) func.apply(context, args);
			};
		return curried;
	}
};