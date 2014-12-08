module.exports = function(grunt) {
  "use strict";

  // Force use of Unix newlines
  grunt.util.linefeed = '\n';
  RegExp.quote = require('regexp-quote');
  var btoa = require('btoa');
  // Project configuration.
  grunt.initConfig({
    sass: {
      development: {
        options: {
          style: 'expanded',
          loadPath: ['bower_components/bootstrap-sass/lib/']
        },
        files: {
          'css/blendtec.css' : 'sass/reduced_blendtec.scss',
          'style.css' : 'sass/main.scss'
        }     
      }       
    },
    clean: {
      css: ['css/blendtec.css', 'style.css'],
      js: ['js/src/scripts.js', 'js/src/scripts.min.js']
    },
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      gruntfile: {
        src: 'Gruntfile.js'
      },
      all: [
            'js/*.js',
            '!js/debounce.js',
            '!js/scripts.js',
            '!js/scripts.min.js',
            '!js/html5shiv.js'
      ]
    },
    concat: {
      options: {
        stripBanners: true,
        separator: ';'
      },
      dist: {
        src: [
          'bower_components/bootstrap-sass/dist/js/bootstrap.js',
          'bower_components/lodash/dist/lodash.js',
          'js/debounce.js',
          'js/blendtec-blog.js'
        ],
        dest: 'js/src/scripts.js'
      }
    },
    uglify: {
      options: {
        report: 'min'
      },
      bootstrap: {
        src: ['<%= concat.dist.dest %>'],
        dest: 'js/src/scripts.min.js'
      }
    },
    webfont: {
      icons: {
        src: 'svg/*.svg',
        dest: 'fonts',
        destCss: 'sass/common',
        options: {
          font: 'blendtec_icon',
          relativeFontPath: '../fonts',
          stylesheet: 'scss',
          htmlDemo: false,
          hashes: false,
          destHtml: ''
        }
      }
    },
    watch: {
      sass: {
        files: ['sass/*.scss', 'sass/modules/_*.scss'],
        tasks: ['sass']
      },
      js: {
        files: ['js/*.js', 'Gruntfile.js'],
        tasks: ['jshint', 'concat', 'uglify']
      }
    }
  });
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-webfont');

  grunt.registerTask('dev', ['watch']);
  grunt.registerTask('js', ['jshint','concat', 'uglify']);
  grunt.registerTask('clean-all', ['clean', 'sass', 'js']);

};
