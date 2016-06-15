module.exports = {
    dist: {
        options: {
            optimizationLevel: 7,
            progressive: true
        },
        files: [{
            expand: true,
            cwd: 'assets/images/src',
            src: '**/*',
            dest: 'assets/images/src'
        }]
    }
};