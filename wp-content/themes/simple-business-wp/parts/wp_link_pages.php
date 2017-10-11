<?php
$args = array(
    'before'           => '<p class="wp_link_pages">' . __('Pages:', 'simple-business-wp'),
    'after'            => '</p>',
    'link_before'      => '<span>',
    'link_after'       => '</span>'
);
wp_link_pages($args);
?>