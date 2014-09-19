$ = require 'jquery'

do fill = (item = 'See what others say before you order') ->
    $('.tagline').append "#{item}"
fill
