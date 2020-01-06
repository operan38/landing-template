var gulp = require('gulp'),
	cssnano = require('gulp-cssnano'),
	autoprefixer = require('gulp-autoprefixer'),
	sass = require('gulp-sass'),
	plumber = require('gulp-plumber'),
	sourcemaps = require('gulp-sourcemaps'),
	rename = require('gulp-rename');

var pathScss = {
	in: 'src/scss/**/*.scss',
	out: 'dist/css'
}

gulp.task('scss:dev', function () {
	return gulp
		.src(pathScss.in) // Выбираем scss файлы
		.pipe(plumber()) // Обработка ошибки в плагине без выброса из консоли
		.pipe(sourcemaps.init()) // Иницилизация sourcemaps
		.pipe(sass()) // Компилируем в css
		.pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true })) //Проставляем автопрефиксы
		.pipe(cssnano()) // Удаляем пробелы и табуляции
		.pipe(rename('static.min.css')) // Переименование входного файла
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(pathScss.out)); // Выгружаем в папку css
})

gulp.task('scss:prod', function () {
	return gulp
		.src(pathScss.in) // Выбираем scss файлы
		.pipe(sass()) // Компилируем в css
		.pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true })) //Проставляем автопрефиксы
		.pipe(cssnano()) // Удаляем пробелы и табуляции
		.pipe(rename('static.min.css')) // Переименование входного файла
		.pipe(gulp.dest(pathScss.out)); // Выгружаем в папку css
});

gulp.task('default', ['scss:dev'], function () { // Запускаем таск по умолчанию вместе с таском scss и отслеживаем изменения
	gulp.watch(pathScss.in, ['scss:dev']);
});