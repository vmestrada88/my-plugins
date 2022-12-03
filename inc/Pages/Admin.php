<?php

/**
 * @package myPlugin
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin
{
    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->set_Pages();
		$this->set_Subpages();

		$this->set_Settings();
		$this->set_Sections();
		$this->set_Fields();

        $this->settings->add_pages($this->pages)->with_sub_page('Dashboard')->add_sub_pages($this->subpages)->register();
    }

    public function set_Pages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'My Plugin', 
				'menu_title' => 'My Plugin', 
				'capability' => 'manage_options', 
				'menu_slug' => 'my_plugin', 
				'callback' => array( $this->callbacks, 'admin_dashboard' ), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
	}

	public function set_Subpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'my_plugin', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'my_cpt', 
				'callback' => array( $this->callbacks, 'admin_cpt' )
			),
			array(
				'parent_slug' => 'my_plugin', 
				'page_title' => 'Custom Taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'my_taxonomies', 
				'callback' => array( $this->callbacks, 'admin_taxonomy' )
			),
			array(
				'parent_slug' => 'my_plugin', 
				'page_title' => 'Custom Widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'my_widgets', 
				'callback' => array( $this->callbacks, 'admin_widget' )
			)
		);
	}

	public function set_settings()
	{
		$args = array(
			array(
				'option_group' => 'mp_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->callbacks, 'mp_options_group' )
			),
			array(
				'option_group' => 'mp_options_group',
				'option_name' => 'first_name'
			)
		);

		$this->settings->set_settings( $args );
	}

	public function set_sections()
	{
		$args = array(
			array(
				'id' => 'mp_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callbacks, 'mp_admin_section' ),
				'page' => 'my_plugin'
			)
		);

		$this->settings->set_sections( $args );
	}

	public function set_fields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array( $this->callbacks, 'mp_text_example' ),
				'page' => 'my_plugin',
				'section' => 'mp_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callbacks, 'mp_first_name' ),
				'page' => 'my_plugin',
				'section' => 'mp_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'last_name',
				'title' => 'Last Name',
				'callback' => array( $this->callbacks, 'mp_last_name' ),
				'page' => 'my_plugin',
				'section' => 'mp_admin_index',
				'args' => array(
					'label_for' => 'last_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->set_fields( $args );
	}
}
