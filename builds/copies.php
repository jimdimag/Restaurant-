imagemin = require('gulp-imagemin'),
    pngcrush = require('imgemin-pngcrush'),

gulp.task('images', function(){
   gulp.src('builds/development/images/**/*.*') 
   .pipe(gulpif(env === 'production', imagemin({
       progressive: true,
       svgoPlugins: [{ removeViewBox: false }],
       use: [pngcrush()]
   })))
   .pipe(gulpif(env === 'production', gulp.dest(outputDir + 'images')))
   .pipe(connect.reload())
});