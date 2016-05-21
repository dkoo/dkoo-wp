module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/dkoo.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'dkoo/'
	}
};