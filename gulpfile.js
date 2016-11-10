
var gulp        = require('gulp'),
    imagemin    = require('gulp-imagemin'),
    cssmin      = require('gulp-cssmin'),
    htmlmin     = require('gulp-htmlmin'),
    inline      = require('gulp-inline'),
    minline     = require('gulp-minify-inline'),
    // uglify      = require('gulp-uglify'),
    browserSync = require('browser-sync'),
    reload      = browserSync.reload,
    serve       = require('gulp-serve'),
    psi         = require('psi'),
    ngrok       = require('ngrok'),
    sequence    = require('run-sequence');

var config      = {
    "build": "dist",
    "html": {
        "source": "*.html",
        "target": "/"
    },
    "css": {
        "source": "css/*.css",
        "target": "/css"
    },
    "js": {
        "source": "js/*",
        "target": "/js"
    },
    "fonts": {
        "source": "fonts/*",
        "target": "/fonts"
    },
    "img": {
        "source": "img/*",
        "target": "/img"
    },
    "view": {
        "source": "view/*",
        "target": "/view"
    }
  },
  site        = '',
  portVal     = 3000;


gulp.task('css', function () {
  return gulp.src(config.css.source)
  .pipe(cssmin())
  .pipe(gulp.dest(config.build + config.css.target));
});

gulp.task('html', function () {
  return gulp.src(config.html.source)
  .pipe(htmlmin({collapseWhitespace: true}))
  .pipe(gulp.dest(config.build + config.html.target));
});

gulp.task('view', function () {
  return gulp.src(config.view.source)
  .pipe(htmlmin({collapseWhitespace: true}))
  .pipe(gulp.dest(config.build + config.view.target));
});

gulp.task('img', function () {
  return gulp.src(config.img.source)
  .pipe(gulp.dest(config.build + config.img.target));
});

gulp.task('fonts', function () {
  return gulp.src(config.fonts.source)
  .pipe(gulp.dest(config.build + config.fonts.target));
});

gulp.task('js', function () {
  return gulp.src(config.js.source)
  // .pipe(uglify())
  .pipe(gulp.dest(config.build + config.js.target));
});

gulp.task('build', ['html','css','js','view','img','fonts']);

gulp.task('ngrok-url', function(cb) {
  return ngrok.connect(portVal, function (err, url) {
    site = url + '/dist/';
    console.log('serving your tunnel from: ' + site);
    cb();
  });
});

gulp.task('psi-mobile', function () {
    return psi(site, {
        // key: key
        nokey: 'true',
        strategy: 'mobile',
    }).then(function (data) {
        console.log(site);
        console.log(data.pageStats);
        console.log('Speed score: ' + data.ruleGroups.SPEED.score);
    });
});

gulp.task('psi-desktop', function () {
    return psi(site, {
        nokey: 'true',
        strategy: 'desktop',
    }).then(function (data) {
        console.log(site);
        console.log(data.pageStats);
        console.log('Speed score: ' + data.ruleGroups.SPEED.score);
    });
});

// psi sequence with 'browser-sync-psi' instead
gulp.task('psi-seq', function (cb) {
  return sequence(
    // 'build',
    'serve',
    'ngrok-url',
    'psi-desktop',
    'psi-mobile',
    cb
  );
});

// psi task runs and exits
gulp.task('psi', ['psi-seq'], function() {
  process.exit();
});

// // Watch Files For Changes & Reload
gulp.task('serve', function() {
  browserSync({
    notify: false,
    // Customize the BrowserSync console logging prefix
    logPrefix: 'EoM',
    // Run as an https by uncommenting 'https: true'
    // Note: this uses an unsigned certificate which on first access
    //       will present a certificate warning in the browser.
    // https: true,
    server: {
      baseDir: "dist/"
    }
  });

  gulp.watch(['*.html'], reload);
  gulp.watch(['views/*.html'], reload);
  gulp.watch(['css/*.css'], reload);
  gulp.watch(['js/*.js'], reload);
});