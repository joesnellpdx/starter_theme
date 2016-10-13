module.exports = {
	options: {
		stripBanners: true,
			banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%= pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed GPL-2.0+' +
		' */\n'
	},
	srcJS: {
		src: [
			'assets/js/src/*.js'
		],
		dest: 'assets/js/src.js'
	},
	vendorJS: {
		src: [
			'bower_components/imagesloaded/imagesloaded.pkgd.js',
			'assets/js/vendor/*.js'
		],
		dest: 'assets/js/vendor.js'
	},
	mainJS: {
		src: [
			'assets/js/vendor/*.js',
			'assets/js/src/*.js'
		],
		dest: 'assets/js/project-theme.js'
	}
};
