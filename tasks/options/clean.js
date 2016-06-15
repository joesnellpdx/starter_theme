module.exports = {
	main: ['release/<%= pkg.version %>'],
	grunticon: ['assets/grunticon/source/**/*', '!assets/grunticon/source/*.svn', '!assets/grunticon/source/*.git', '!assets/grunticon/source/**/*.svn', '!assets/grunticon/source/**/*.git', 'assets/grunticon/output/*', '!assets/grunticon/output/*.svn', '!assets/grunticon/output/**/*.svn', '!assets/grunticon/output/*.git', '!assets/grunticon/output/**/*.git', 'assets/grunticon/output/png/*.png', '!assets/grunticon/output/png', '!assets/grunticon/output/png/*.svn', '!assets/grunticon/output/png/*.git']
};