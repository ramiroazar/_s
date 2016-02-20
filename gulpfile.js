var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var compass = require('gulp-compass');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var browserSync = require('browser-sync').create();
var path = require('path');

var project_directory = path.basename(__dirname);
var parent_theme = '_s';
var child_theme = project_directory;
var parent_theme_directory = 'content/themes/' + parent_theme;
var child_theme_directory = 'content/themes/' + child_theme;
var php_src = [
  child_theme_directory + '/**/*.php'
];
var sass_src = [
  child_theme_directory + '/sass/**/*.scss'
];
var css_src = [
  parent_theme_directory + '/*.css',
  child_theme_directory + '/!(stylesheet).css'
];
var javascript_src = [
  parent_theme_directory + '/js/**/!(customizer).js',
  child_theme_directory + '/js/**/!(javascript).js'
];

gulp.task('javascript', function() {
  return gulp.src(javascript_src)
    .pipe(concat('javascript.js'))
    .pipe(uglify())
    .pipe(gulp.dest(child_theme_directory + '/js'))
});

gulp.task('sass', function() {
  return gulp.src(sass_src)
    .pipe(compass({
      sass: child_theme_directory + '/sass',
      css: child_theme_directory,
      require: ['susy']
    }))
});

gulp.task('css', function() {
  return gulp.src(css_src)
    .pipe(concat('stylesheet.css'))
    .pipe(autoprefixer())
    .pipe(cssnano())
    .pipe(gulp.dest(child_theme_directory))
});

gulp.task('server', function() {
  browserSync.init({
    proxy: 'localhost/' + project_directory
  })
});

gulp.task('watch', ['server', 'javascript', 'sass', 'css'], function (){
  gulp.watch(php_src, [browserSync.reload]);
  gulp.watch(javascript_src, ['javascript', browserSync.reload]);
  gulp.watch(sass_src, ['sass']);
  gulp.watch(css_src, ['css', browserSync.reload]);
});
