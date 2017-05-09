module.exports = function(grunt) {

    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

//        concat: {
//            dist: {
//                src: [
//                    'js/functions.js',
//                    'js/navigation.js'
//                ],
//                dest: 'js/axiomcorp.js',
//            }
//        },

//        uglify: {
//            build: {
//                src: 'js/axiomcorp.js',
//                dest: 'js/axiomcorp.min.js'
//            }
//        },

        sass: {
            dist: {
                options: {
                    style: 'nested',
                },
                files: {
                    'style.css': 'sass/style.scss',
                    'css/red-style.css': 'sass/red-style.scss',
                    'css/green-style.css': 'sass/green-style.scss'
                }
            }
        },

        autoprefixer: {
            dist: {
                files: {
                    'style.css': 'style.css'
                }
            }
        },

        watch: {
            options: {
                livereload: true,
            },
//            scripts: {
//                files: ['js/*.js'],
//                tasks: ['concat', 'uglify'],
//                options: {
//                    spawn: false,
//                },
//            },
            scripts: {
              files: ['js/*.js'],
            },
            html: {
              files: '*.html'
            },
            php: {
              files: ['*.php', 'template-parts/*.php', 'inc/*.php']
            },
            css: {
                files: ['sass/*.scss', 'sass/custom/*.scss', 'sass/theme/*.scss', 'sass/colors/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            },
            styles: {
                files: ['style.css', 'red-style.css'],
                tasks: ['autoprefixer'],
                options: {
                    spawn: false,
                }
            }
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['watch']);

};
