module.exports = function(grunt) {
  "use strict";

  // Force use of Unix newlines
  grunt.util.linefeed = '\n';

  RegExp.quote = require('regexp-quote')
  var btoa = require('btoa')
  // Project configuration.
  grunt.initConfig({
  	sass: {
      development: {
        options: {
          style: 'expanded'
        },
        files: {
          'css/blendtec.css' : 'sass/reduced_blendtec.scss',
          'style.css' : 'sass/main.scss' 
        }     
      }       
    },
    watch: {
    	sass: {
    		files: ['sass/*.scss', 'sass/modules/_*.scss'],
    		tasks: ['sass']
    	}
    }
  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.registerTask('dev', ['watch']);

};
