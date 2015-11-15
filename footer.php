<div id="footertop"></div>
    <div id="footer">
        <div id="infooter">
            <div class="one_third">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Left") ) : ?>
<?php endif; ?>
        </div>
        <div class="one_third">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Middle") ) : ?>
<?php endif; ?>
        </div>
        <div class="one_third last">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Right") ) : ?>
<?php endif; ?>
        </div><div class="clear"></div>
        </div>
    </div>
    <div id="q"></div>
    <div id="bottom">
        <div id="inbottom">
            <p><?php echo get_option('of_footer_text'); ?></p>
        </div>
    </div>


    <script>
$(function(){
  $('#slider1').bxSlider({
    displaySlideQty: 4,
    moveSlideQty: 2
  });
});


$(function() {
    $(".imgHover").hover(
        function() {
            $(this).children("img").fadeTo(400, 0.25).end().children(".hover").show();
        },
        function() {
            $(this).children("img").fadeTo(200, 1).end().children(".hover").hide();
        });
});
</script>
<script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto();
        });
    </script>
<?php echo get_option('of_custom_scr'); ?>
</body>
</html>