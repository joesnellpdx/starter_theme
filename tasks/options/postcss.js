module.exports = {
	dist: {
		options: {
			processors: [
				require('pixrem')(), // add fallbacks for rem units
				require('autoprefixer')({browsers: 'last 2 versions'})
			]
		},
		files: { 
			'assets/css/project-theme.css': [ 'assets/css/project-theme.css' ]
		}
	}
};