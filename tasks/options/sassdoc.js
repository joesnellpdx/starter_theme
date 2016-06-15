module.exports = {
    default: {
        src: 'assets/css/sass',
        options: {
            dest: 'assets/css/documentation',
            display: {
                access: ['public', 'private'],
                alias: true,
                watermark: true,
            },
        },
        groups: {
            slug: 'Title',
            helpers: 'Helpers',
            hacks: 'Dirty Hacks & Fixes',
            'undefined': 'General',
        },
    }
};