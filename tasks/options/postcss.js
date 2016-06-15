module.exports = {
	dist: {
		options: {
			processors: [
				require('pixrem')(), // add fallbacks for rem units
				require('autoprefixer')({browsers: 'last 2 versions'})
			]
		},
		files: { 
			'assets/css/nw-kids-theme.css': [ 'assets/css/nw-kids-theme.css' ]
		}
	}
};