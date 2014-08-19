var gulp         = require('gulp'),
	gutil        = require('gulp-util'),
	minifycss    = require('gulp-minify-css'),
	autoprefixer = require('gulp-autoprefixer'),
	notify       = require('gulp-notify'),
	sass         = require('gulp-ruby-sass'),
	livereload   = require('gulp-livereload');

var sassDir      = 'app/assets/scss';
var targetCSSDir = 'public/css';

gulp.task('css',function() {
	return gulp.src(sassDir + '/*.scss')
	.pipe(sass({ style: 'compact'}).on('error',gutil.log))
	.pipe(autoprefixer('last 15 version'))
	.pipe(gulp.dest(targetCSSDir))
	.pipe(livereload())
	.pipe(notify({title:'Gulp', message:'SCSS Compiled and Minified'}));
});

gulp.task('watch',function () {
	gulp.watch(sassDir + '/*.scss', ['css']);
});

gulp.task('default',['css','watch']);
