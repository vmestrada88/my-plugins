<?php

/**
 * @package myPlugin
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;

class Admin
{
    public $settings;
    public $pages = array();
    public $subpages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi();
        $this->pages = array(
            array(
                'page_title' => 'My Plugin page Title',
                'menu_title' => 'My Plugin Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'my_plugin',
                'callback' => function () {
                    echo '<h1>My Plugin Admin</h1>';
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
        $this->subpages = array(
            array(
                'parent_slug' => 'my_plugin',
                'page_title' => 'My Custom Post Types',
                'menu_title' => 'My CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'my_cpt',
                'callback' => function () {
                    echo '<h1>My CPT Manager</h1>';
                }
            ),
            array(
                'parent_slug' => 'my_plugin',
                'page_title' => 'My Custom Taxonomies',
                'menu_title' => 'My Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'my_taxonomies',
                'callback' => function () {
                    echo '<h1>My Taxonomies Manager</h1>';
                }
            ),
            array(
                'parent_slug' => 'my_plugin',
                'page_title' => 'My Custom Widgets',
                'menu_title' => 'My Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'my_widgets',
                'callback' => function () {
                    echo '<h1>My Widgets Manager</h1>';
                }
            )
        );
    }

    public function register()
    {
        $this->settings->add_pages($this->pages)->with_sub_page('Dashboard')->add_sub_pages($this->subpages)->register();
    }
}
