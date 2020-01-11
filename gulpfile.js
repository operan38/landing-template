const gulp = require('gulp'),
	autoprefixer = require('gulp-autoprefixer'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
	uglify = require('gulp-uglify');

const root = '',
    scss = root + 'src/scss/',
    js = root + 'src/js/',
    jsDist = root + 'dist/js/';

const styleWatchFiles = scss + '**/*.scss';

const jsSrc = [
	'libs/jquery/jquery-3.4.1.min.js',
	'libs/bootstrap/js/bootstrap.bundle.min.js',
	'libs/slick/slick.min.js',
	'src/js/**/*.js'
];

function css() {
	return gulp.src(scss + 'main.scss', { sourcemaps: true })
	.pipe(sass({
		outputStyle: 'compressed'
	}).on('error', sass.logError))
	.pipe(autoprefixer('last 2 versions'))
	.pipe(gulp.dest('dist/css', { sourcemaps: '.' }));
}

function javascript() {
	return gulp.src(['libs/jquery/jquery-3.4.1.min.js', 'libs/bootstrap/js/bootstrap.bundle.min.js', 'libs/slick/slick.min.js', 'src/js/**/*.js'])
	.pipe(concat('main.js'))
	.pipe(uglify())
	.pipe(gulp.dest(jsDist));
}

function watch() {
    gulp.watch(styleWatchFiles, css);
    gulp.watch(jsSrc, javascript);
}

exports.css = css;
exports.javascript = javascript;
exports.watch = watch;

const build = gulp.series(watch);
gulp.task('default', build);