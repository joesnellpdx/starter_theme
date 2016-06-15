module.exports = function (grunt) {
	grunt.registerTask( 'js', ['clean:grunticon', 'svgmin', 'jshint', 'concat', 'uglify', 'grunticon'] );
};