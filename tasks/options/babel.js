module.exports = {
	babel: {
		options: {
			sourceMap: true,
			presets: ['es2015']
		},
		dist: {
			files: {
				'assets/js/dkoo-dot-net.js': 'assets/js/src/dkoo-dot-net.js'
			}
		}
	}

};
