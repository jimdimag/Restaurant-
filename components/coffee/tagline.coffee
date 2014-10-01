$ = require 'jquery'

do fill = (item = 'Your reminder of what you like and where you go it from') ->
    $('.tagline').append "#{item}"
fill
