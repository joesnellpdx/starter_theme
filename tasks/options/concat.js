module.exports = {
	options: {
		stripBanners: true,
			banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%= pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed GPL-2.0+' +
		' */\n'
	},
	main: {
		src: [
			// 'assets/js/vendor/vendor-file.js',
			'bower_components/imagesloaded/imagesloaded.pkgd.js',
			'assets/js/src/project-theme.js'
		],
			dest: 'assets/js/project-theme.js'
	}
};
