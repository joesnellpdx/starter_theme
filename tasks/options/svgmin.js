module.exports = {
    options: {
        plugins: [
            { removeViewBox: true },
            { removeUselessStrokeAndFill: true }
        ]
    },
    dist: {
        files: [{
            expand: true,
            cwd: 'assets/grunticon/svgs',
            src: ['*.svg'],
            dest: 'assets/grunticon/source'
        }]
    }
};