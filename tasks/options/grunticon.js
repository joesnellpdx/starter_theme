module.exports = {
    myIcons: {
        files: [{
            expand: true,
            cwd: 'assets/grunticon/source',
            src: ['*.svg', '*.png'],
            dest: "assets/grunticon/output"
        }],
        options: {
            // CSS filenames
            datasvgcss: "icons.data.svg.css",
            datapngcss: "icons.data.png.css",
            urlpngcss: "icons.fallback.css",

            // preview HTML filename
            previewhtml: "preview.html",

            // grunticon loader code snippet filename
            loadersnippet: "grunticon.loader-file.js",

            corsEmbed: false,
            enhanceSVG: true,

            // folder name (within dest) for png output
            //pngfolder: "png",

            //pngpath: "assets/grunticon/output/png",

            pngpath: "png",

            // prefix for CSS classnames
            cssprefix: ".nwkids-icon-",

            //primarily for pngs
            defaultWidth: "400px",
            defaultHeight: "240px",

            // define vars that can be used in filenames if desirable, like foo.colors-primary-secondary.svg
            colors: {
                primary: "#ff8800",
                secondary: "#666",
                white: "#FFF",
                black: "000",
                font: "#343434"
            },

            dynamicColorOnly: false,

            cssbasepath: "assets/grunticon/output/",
            tmpPath: "assets/grunticon/svgs/",
            tmpDir: "grunticon-tmp-files",


            //customselectors: {
            //    "*": [".icon-$1:before", ".icon-$1-what", ".hey-$1"]
            //},

            //compressPNG: true

        }
    }
};