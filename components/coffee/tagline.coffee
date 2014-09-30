$ = require 'jquery'

do fill = (item = 'Your reminder of what you like and where') ->
    $('.tagline').append "#{item}"
fill
