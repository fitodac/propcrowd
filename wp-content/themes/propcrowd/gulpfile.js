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
		.pipe(gulp.dest('./'));
		// .pipe(notify({ message: 'SASS compiled!' }));
});


// gulp.task('sass-widgets', function(){
// 	gulp.src('views/**/*.scss')
// 	.pipe(sourcemaps.init())
// 	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
// 	.pipe(sourcemaps.write('.'))
// 	.pipe(gulp.dest('.'))
// 	.pipe(notify({ message: 'SASS compiled!' }));
// });




// COMPILE PUG
// gulp.task('pug', function() {
//   return gulp.src('*.pug')
// 		.pipe(pug({ pretty: true }))
// 		.pipe(gulp.dest('../'));
// 		// .pipe(notify({ message: 'Pug compiled!', onLast: true }));
// });




// WATCH
gulp.task('watch', function(){
	gulp.watch('scss/**/*.scss', ['sass']);
	// gulp.watch('*.pug', ['pug']);
});






