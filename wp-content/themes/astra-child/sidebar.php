<?php if (is_active_sidebar( 'left-sidebar')) : ?>
    <div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'left-sidebar' ); ?>
    </div>
<?php endif; ?>