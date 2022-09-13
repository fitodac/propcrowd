var gulp 				= require('gulp'),
		pug 				= require('gulp-pug'), // npm install gulp-pug
		sass 				= require('gulp-sass'), // npm install node-sass
		rename 			= require('gulp-rename'), // npm install gulp-rename
		sourcemaps 	= require('gulp-sourcemaps'), // npm install gulp-sourcemaps
		notify 			= require("gulp-notify"); // npm install --save-dev gulp-notify




// COMPILE SASS
gulp.task('sass', function(){
	gulp.src('scss/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('../assets/css/'));
		// .pipe(notify({ message: 'SASS compiled!' }));
});





// WATCH
gulp.task('watch', function(){
	gulp.watch('scss/**/*.scss', ['sass']);
});






