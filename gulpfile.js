const gulp = require('gulp')
const autoprefixer = require('gulp-autoprefixer')
const browserSync = require('browser-sync')

gulp.task('server', () =>
  browserSync.init({
    server: {
      baseDir: "./"
    }
  })
)

gulp.task('reload', () =>
  browserSync.reload()
)

gulp.task('dist-common', () =>
  gulp.src('common/+(css|js)/*')
    .pipe(gulp.dest('dist'))
)

gulp.task('dist-nrm', () =>
  gulp.src('node_modules/normalize.css/normalize.css')
    .pipe(gulp.dest('dist/css'))
)

gulp.task('dist-fa-css', () =>
  gulp.src('node_modules/font-awesome/css/font-awesome.min.css')
    .pipe(gulp.dest('dist/css'))
)

gulp.task('dist-fa-fonts', () =>
  gulp.src('node_modules/font-awesome/fonts/*')
  .pipe(gulp.dest('dist/fonts'))
)

gulp.task('dist-vue', () =>
  gulp.src('node_modules/vue/dist/vue.min.js')
    .pipe(gulp.dest('dist/js'))
)

gulp.task('default', ['server'], () =>
  gulp.watch(['common/**/*', '*.html'], ['reload'])
)

gulp.task('prepare-release', ['dist-common','dist-nrm', 'dist-fa-css', 'dist-fa-fonts', 'dist-vue'])
