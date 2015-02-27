module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        autoprefixer: {
            dist: {
                files: {
                    'web/assets/css/styles.css': 'web/assets/css/styles.css'
                }
            }
        },
        'check-gems': {
            dist: {
                files: [{
                    src: '.'
                }]
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed',
                    sourcemap: 'auto',
                    require: 'sass-media_query_combiner'
                },
                files: {
                    'web/assets/css/styles.css': 'web/assets/css/styles.scss'
                }
            },
            debug: {
                options: {
                    style: 'expanded',
                    sourcemap: 'auto',
                    lineNumbers: true,
                    require: 'sass-media_query_combiner'
                },
                files: {
                    'web/assets/css/styles.css': 'web/assets/css/styles.scss'
                }
            }
        },
        sassdoc: {
            default: {
                src: [ 'web/assets/css/modules', 'web/assets/css/partials' ]
            }
        },
        jshint: {
            options: {
                eqnull: true,
                browser: true,
                globals: {
                    jQuery: true
                },
                reporter: require('jshint-stylish')
            },
            all: ['Gruntfile.js', 'web/assets/js/*.js']
        },
        uglify: {
            options: {
                mangle: true
            },
            dist: {
                files: {
                    'web/assets/js/min/main-ck.js' :  [ 'web/assets/js/main.js' ],
                    'web/assets/js/min/teams-ck.js':  [ 'web/assets/js/teams.js' ]
                }
            }
        },
        watch: {
            docs: {
                files: [ 'web/assets/css/modules/**/*.scss', 'web/assets/css/partials/**/*.scss' ],
                tasks: [ 'sassdoc' ]
            },
            scripts: {
                files: [ 'web/assets/js/main.js', 'web/assets/js/teams.js'],
                tasks: [ 'js' ],
                options: {
                    livereload: true
                }
            },
            styles: {
                files: [ 'web/assets/css/**/*.scss' ],
                tasks: [ 'css' ],
                options: {
                    livereload: true
                }
            },
            views: {
                files: [ 'views/**/*.html.twig' ],
                options: {
                    livereload: true
                }
            }
        }
    });

    grunt.registerTask('css', [ 'sass:dist' ]);
    grunt.registerTask('js', [ 'jshint', 'uglify' ]);
    grunt.registerTask('check', [ 'check-gems' ]);
    grunt.registerTask('default', [ 'css', 'js' ]);
};
