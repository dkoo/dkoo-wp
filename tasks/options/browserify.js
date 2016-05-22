module.exports = {
	dist: {
		options: {
			transform: [ ["babelify", { "presets": ["es2015"] }] ]
		},
		files: {
			'assets/js/dkoo-dot-net.js': 'assets/js/src/dkoo-dot-net.js'
		}
	}
};
