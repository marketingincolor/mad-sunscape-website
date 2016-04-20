<style>
#slideshow { position:relative; height:325px; }
#slideshow IMG { position:absolute; top:0; left:0; z-index:800; opacity:0.0; }
#slideshow IMG.active { z-index:1000; opacity:1.0; }
#slideshow IMG.last-active { z-index:900; }
</style>

<div id="slideshow">
    <img src="./uploads/how01.jpg" alt="" class="active" />
    <img src="./uploads/how02.jpg" alt="" />
    <img src="./uploads/how03.jpg" alt="" />
    <img src="./uploads/how04.jpg" alt="" />
</div>

<script>
function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 4000 );
});
</script>