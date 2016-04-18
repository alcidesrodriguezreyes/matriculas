var gulp = require('gulp');
var sass = require('gulp-sass');

var sassFolder = './sass/**/*.scss';
var cssTarget = 'yii/frontend/web/css';

gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('sass', function() {
  return gulp.src(sassFolder)
  .pipe(sass().on('error', sass.logError))
  .pipe(gulp.dest(cssTarget));
});

gulp.task('sass:watch', function () {
  gulp.watch(sassFolder, ['sass']);
});
