<?php

function register_custom_post_type() {
    register_post_type('event', [
        'labels' => array(
            'name' => __('Events', 'textdomain'),
            'singuluar_name' => __('Event', 'textdomain')
        ),
        'public' => true,
        'supports' => array('custom-fields', 'page-attributes', 'thumbnail', 'editor', 'title'),
        'show_in_rest' => true
    ]);
}

add_action('init', 'register_custom_post_type');