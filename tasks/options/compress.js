module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/nwk.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'nwk/'
	}
};