module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				files: {
					'../css/style.css':'sassfiles/style.scss',
				}
			}
		},
		postcss: {
			options: {
				map: true,			
				map: {
					inline: false,
					annotation: '../css/maps/'
				},
				processors: [
					require('pixrem')(),
					require('autoprefixer')({browsers: 'last 2 versions'})
				]
			},
			dist: {
				src: '../css/**/*.css'
			}
		},
		watch: {
			sass: {
				files: ['sassfiles/**/*.scss'],
				tasks: ['sass','postcss'],
				options: {
					livereload: true,
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Default task(s).
	grunt.registerTask('default', ['watch']);

};