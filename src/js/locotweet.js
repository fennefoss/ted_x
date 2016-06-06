$(document).ready(function(){

    // Jquery function for the LocoTweet'er box
    $('.fts-tweeter-wrap:first-child').addClass('js-active-tweet');

    $('.locotweet-backward').click(function() {
        $('.fts-tweeter-wrap.js-active-tweet').next().addClass('js-active-tweet');
        $('.fts-tweeter-wrap.js-active-tweet').prev().removeClass('js-active-tweet');
    });

    $('.locotweet-forward').click(function() {
         $('.fts-tweeter-wrap.js-active-tweet').prev().addClass('js-active-tweet');
        $('.fts-tweeter-wrap.js-active-tweet').next().removeClass('js-active-tweet');
    });

});
