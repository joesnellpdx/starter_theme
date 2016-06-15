module.exports = function (grunt) {
	grunt.registerTask( 'css', ['sassdoc', 'sass', 'postcss', 'cssmin'] );
};