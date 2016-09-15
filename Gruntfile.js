module.exports = function( grunt ){
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		jshint: {
			myAppPreConcat: ['app/bower_components/jquery/dist/jquery.min.js','app/bower_components/angular/angular.min.js','app/bower_components/angular-resource/angular-resource.min.js','app/bower_components/angular-ui-router/release/angular-ui-router.min.js','app/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js','app/bower_components/angular-animate/angular-animate.min.js','app/scripts/app.js','app/scripts/controllers/*.js'],
			myAppPostConcat:['app/scripts/all.con.js']
		},
		concat: {
			options:{
				separator: '\n\n\n\n\n\n'
			},
			myApp: {
				src: ['app/bower_components/jquery/dist/jquery.min.js','app/bower_components/angular/angular.min.js','app/bower_components/angular-resource/angular-resource.min.js','app/bower_components/angular-ui-router/release/angular-ui-router.min.js','app/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js','app/bower_components/angular-animate/angular-animate.min.js','app/scripts/app.js','app/scripts/controllers/*.js'],
				dest: 'app/scripts/all.js'
			},
		},
		uglify: {
			myApp: {
				options: {
					sourceMap: 'dist/script/all.min.js.map',
					banner: '/* <%= pkg.name %> yo cant get the code :P */'
				},
				files: {
					'dist/styles/all.min.js':'app/scripts/all.js'
				}
			}
		},
		less:{
			development: {
				options: {
					paths:['app/styles']
				},
				files: {
					'app/styles/style.css' : 'app/styles/style.less'
				}
			},
			production: {
				options: {
					paths: ['app/styles'],
					cleancss: true,
					sourceMap: true,
					sourceMapRootpath: 'app/styles',
					sourceMapFilename:'app/styles/all.css.map',
					separator: '\n\n\n\n\n\n'
				},
				files: {
					'dist/styles/all.css':['app/bower_components/bootstrap-css/css/bootstrap.min.css','app/bower_components/Font-Awesome/css/font-awesome.css','app/styles/normalise.css"','app/styles/scroll.css','app/styles/slider.css','app/styles/style.css']
				}
			}			
		},
		cssmin: {
			add_banner: {
				options: {
				  banner: '/* My minified css file */'
				},
				files: {
				  'app/styles/allsort.css': ['app/styles/all.css']
				}
			}
		},
		imagemin: {                          // Task
			// static: {                          // Target
			// options: {                       // Target options
			// optimizationLevel: 3
			// },
			// files: {                         // Dictionary of files
			// 'dist/img.png': 'src/img.png', // 'destination': 'source'
			// 'dist/img.jpg': 'src/img.jpg',
			// 'dist/img.gif': 'src/img.gif'
			// }
			// },
			dynamic: {  
				options: {                       // Target options
					optimizationLevel: 3
				},                       // Another target
				files: [{
				expand: true,                  // Enable dynamic expansion
				cwd: 'app/img/',                   // Src matches are relative to this path
				src: ['*.png'],   // Actual patterns to match
				dest: 'dist/img/' ,
				ext: '.png'                 // Destination path prefix
				}]
			}
		},
		uncss: {
		  dist: {
		    files: {
		      'dist/tidy.css': ['app/index.html','app/views/*.php','app/views/career/*.php','app/views/sss/*.php','app/views/enpower/*.php']
		      }
		    },
		    options: {
		      ignore       : ['#added_at_runtime', /test\-[0-9]+/],
		      // media        : ['(min-width: 700px) handheld and (orientation: landscape)'],
		      // csspath      : '../public/css/',
		      raw          : 'h1 { color: green }',
		      stylesheets  : ['bower_components/bootstrap-css/css/bootstrap.min.css', 'bower_components/Font-Awesome/css/font-awesome.css','styles/normalise.css','styles/scroll.css','styles/slider.css','styles/style.css'],
		      ignoreSheets : [/fonts.googleapis/],
		      // urls         : ['http://localhost:3000/mypage', '...'], // Deprecated
		      timeout      : 1000,
		      htmlroot     : '',
		      report       : 'min'
		    },
		},
		
		watch:{
			options: {
				livereload:true
			},
			css: {
				files:['app/styles/*.less'],
				tasks:['less']
			},
			js: {
				files:['app/scripts/app.js'],
				tasks:['concat:myApp','uglify:myApp']
			},
			gruntfile: {
                files: ['Gruntfile.js']
            }
            // livereload: {
            //     options: {
            //         livereload: '<%= connect.options.livereload %>'
            //     },
            //     files: [
            //         'app/{,*/}*.html',
            //         '.tmp/styles/{,*/}*.css',
            //         'app/images/{,*/}*.{gif,jpeg,jpg,png,svg,webp}'
            //     ]
            // }

		},

		// express:{
		// 	all: {
		// 		options:{
		// 			port:9000,
		// 			hostname:'localhost',
		// 			base:'.',
		// 			livereload:true
		// 		}
		// 	}
		// },

		connect: {
            options: {
                port: 9000,
                livereload: 35729,
                // Change this to '0.0.0.0' to access the server from outside
                hostname: 'localhost'
            },
            livereload: {
                options: {
                    open: true,
                    base: [
                        '.tmp',
                        'app'
                    ]
                }
            },   
        }
	});

	grunt.loadNpmTasks ( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks ( 'grunt-contrib-concat' );
	grunt.loadNpmTasks ( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks ( 'grunt-contrib-less' );
	grunt.loadNpmTasks ( 'grunt-contrib-watch' );
	grunt.loadNpmTasks ( 'grunt-contrib-livereload' );
	grunt.loadNpmTasks ( 'grunt-contrib-connect' );
	grunt.loadNpmTasks ( 'grunt-express' );
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-uncss');


	grunt.registerTask ( 'default','watch');

	grunt.registerTask('serve', function (target) {
        if (target === 'dist') {
            return grunt.task.run(['build', 'connect:dist:keepalive']);
        }
        grunt.task.run([
            'connect:livereload',
            'watch'
        ]);
    });

	grunt.registerTask('server', function () {
        grunt.log.warn('The `server` task has been deprecated. Use `grunt serve` to start a server.');
        grunt.task.run(['serve']);
    });
	
	grunt.registerTask('myApp', ['jshint:myAppPreConcat', 'concat:myApp' , 'jshint:myAppPostConcat' ,  'uglify:myApp' , 'less']); 
};