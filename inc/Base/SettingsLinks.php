<?php

/**
 * @package myPlugin
 */

namespace Inc\Base;

class SettingsLinks
{

    public function register()
    {
       
        // echo $this->plugin_name;
        add_filter("plugin_action_links_my-plugins/my-plugin.php", array($this, 'settings_link'));
    }

    public function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=my_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }
}
