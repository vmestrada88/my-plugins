<?php

/**
 * @package myPlugin
 */

namespace Inc\Base;

class  Enqueue
{

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        wp_enqueue_style('my-plugin-style', MP_PLUGIN_URL . '/assets/my-style.css');
        wp_enqueue_script('my-plugin-script', MP_PLUGIN_URL .'/assets/my-script.js');
    }
}
