const gulp = require('gulp')
const autoprefixer = require('gulp-autoprefixer')
const browserSync = require('browser-sync')
const gutil = require('gulp-util')
const ftp = require('vinyl-ftp')
const cleancss = require('gulp-clean-css');

/* browser-syncを利用*/
gulp.task('browser-sync', ['server'], () =>
  gulp.watch(['common/**/*', '*.html', 'style_dev.css'], ['reload'])
)

/* デプロイ作業 */ 
gulp.task('deploy', ['clean-css', 'dist-common','dist-nrm', 'dist-fa-css', 'dist-fa-fonts', 'dist-vue', 'ftp'])



gulp.task('server', () =>
  browserSync.init({
    server: {
      baseDir: "./"
    }
  })
)

gulp.task( 'ftp', function () {
    // FTPアカウント
    var conn = ftp.create( {
        host:     'ftp.14451a4e1a4ab9a2.lolipop.jp',
        user:     'lolipop.jp-14451a4e1a4ab9a2',
        password: 'focusrite_0109',
        parallel: 5,
        log:      gutil.log
    } );

    // ローカルのパス
    var globs = [
        'dist/**',
        '*.css',
        '*.js',
        '*.php',
        // 「!」を付けて除外するファイルを指定
        '!gulpfile.js',
        '!*.md',
        '!*.sql'
    ];

    // ベースディレクトリを「'.'」に記述する
    return gulp.src( globs, { base: '.', buffer: false } )　
      .pipe( conn.newer( '/wp-content/themes/tobaccojuice' ) ) // 指定のディレクトリにあるファイルより新しければアップロード
      .pipe( conn.dest( '/wp-content/themes/tobaccojuice' ) ); // 出力するディレクトリ
});

gulp.task('reload', () =>
  browserSync.reload()
)

gulp.task('dist-common', () =>
  gulp.src('common/+(css|js|img)/**/*')
    .pipe(cleancss())
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
