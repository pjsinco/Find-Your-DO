module.exports = function(grunt) {

  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-contrib-compass");
  grunt.loadNpmTasks("grunt-autoprefixer");
  grunt.loadNpmTasks("grunt-browserify");
  grunt.loadNpmTasks("grunt-notify");


  grunt.initConfig({

    notify: {
        sass: {
            options: {
                title: 'Sass',
                message: 'Sass task complete'
            } 
        },

        jade: {
            options: {
                title: 'Jade',
                message: 'Jade compiled'
            }
        },

        browserify: {
            options: {
                title: 'Browserify',
                message: 'Browserified!'
            }
        }
    },

    autoprefixer: {
        css: {
            src: './public/css/find-your-do-public.css',
        }
    },

    browserify: {
        options: {
            debug: true,
        },
        dev: {
            options: {
                require: [ ['./components/js/main.js', {expose: 'app'} ] ]
                //alias: ['app:'],
                //external: ['app:']     
            },
            src: ['./components/js/main.js'],
            dest: './public/js/find-your-do-public.js'
        },
    },

    compass: {
      dev: {
        options: {
          config: 'config.rb'
        }
      }
    },

    watch: {
      options: {
        livereload: true
      },
      
      sass: {
        files: ['components/sass/**/*.scss'],
        tasks: ['compass:dev', 'notify:sass'] 
      },

      js: {
        files: ['components/js/**/*.js'],
        tasks: ['browserify:dev', 'notify:browserify']
      }

    
    } // watch
  }); // initConfig
  
  grunt.registerTask('compile-sass', ['compass:dev', 'notify:sass']);
  grunt.registerTask('compile-js', ['browserify:dev', 'notify:browserify']);
  grunt.registerTask('default', ['watch']);

}; // exports

