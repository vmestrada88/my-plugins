<?php

/**
 * @package myPlugin
 */
namespace Inc\Base;

class Activate
{
    public static function activate()
    {

        update_option('mp_version', '1.0.0');

        flush_rewrite_rules();
    }
}