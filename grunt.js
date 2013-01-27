/*global module:false*/
module.exports = function (grunt) {
  grunt.initConfig({
    compass:{
      prod:{
        src:'assets/sass',
        dest:'web/css',
        outputstyle:'compressed',
        linecomments:false,
        forcecompile:true,
        require:[],
        debugsass:false,
        relativeassets:true
      }
    },
    watch:{
      files:['assets/sass/**/*.scss'],
      tasks:'compass:prod'
    }
  });
  grunt.registerTask('default', 'compass:prod');
  grunt.loadNpmTasks('grunt-compass');
};
