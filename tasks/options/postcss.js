module.exports = {
	dist: {
		options: {
			processors: [
				require('autoprefixer')({browsers: 'last 2 versions'})
			]
		},
		files: { 
			'assets/css/dkoo-dot-net.css': [ 'assets/css/dkoo-dot-net.css' ]
		}
	}
};