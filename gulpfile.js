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

gulp.task('default', ['server'], () =>
  gulp.watch(['common/**/*', '*.html'], ['reload'])
)
