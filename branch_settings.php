<?php

class BranchSettingsPlugin {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
		add_action( 'admin_init', array( $this, 'setup_sections' ) );
		add_action( 'admin_init', array( $this, 'setup_fields' ) );
	}

	public function create_plugin_settings_page() {
		// Add the menu item and page
		$page_title = 'Politsturm';
		$menu_title = 'Politsturm';
		$capability = 'manage_options';
		$slug = 'politsturm_fields';
		$callback = array( $this, 'plugin_settings_page_content' );
		$icon = 'dashicons-admin-plugins';
		$position = 100;

		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	}

	public function plugin_settings_page_content() {?>
		<div class="wrap">
		<h2>Settings of Politsturm branch</h2><?php
		if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
			$this->admin_notice();
		} ?>
			<form method="POST" action="options.php">
<?php
		settings_fields( 'politsturm_fields' );
		do_settings_sections( 'politsturm_fields' );
		submit_button();
?>
		</form>
		</div>
<?php }

	public function admin_notice() { ?>
		<div class="notice notice-success is-dismissible">
			<p>Your settings have been updated!</p>
		</div><?php
	}

	public function setup_sections() {
		add_settings_section( 'site_settings', 'Site settings', array( $this, 'section_callback' ), 'politsturm_fields' );
		add_settings_section( 'branch_settings', 'Settings of branch', array( $this, 'section_callback' ), 'politsturm_fields' );
	}

	public function section_callback( $arguments ) {
		switch( $arguments['id'] ){
		case 'site_settings':
			echo 'Site settings';
			break;
		case 'branch_settings':
			echo 'Settings of branch';
			break;
		}
	}

	public function setup_fields() {
		$fields = array(
			array(
				'uid' => 'branch_name',
				'label' => 'Branch name',
				'section' => 'branch_settings',
				'type' => 'text',
				'placeholder' => 'Россия',
				'default' => 'Россия'
			),
			array(
				'uid' => 'site_type',
				'label' => 'Site type',
				'section' => 'site_settings',
				'type' => 'select',
				'options' => array(
					'main' => 'Main site',
					'branch' => 'Branch site',
				),
				'default' => array('main')
			),
			array(
				'uid' => 'social_networks_list',
				'label' => 'Social networks',
				'section' => 'branch_settings',
				'type' => 'textarea',
				'placeholder' => 'https://URL,Name,#svg_id',
				'default' => ''
			),
		);
		foreach( $fields as $field ){

			add_settings_field( $field['uid'], $field['label'],
				array( $this, 'field_callback' ),
				'politsturm_fields',
				$field['section'],
				$field );
			register_setting( 'politsturm_fields', $field['uid'] );
		}
	}

	public function field_callback( $arguments ) {

		$value = get_option( $arguments['uid'] );

		if( ! $value ) {
			$value = $arguments['default'];
		}

		switch( $arguments['type'] ){
		case 'text':
		case 'password':
		case 'number':
			printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
			break;
		case 'textarea':
			printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
			break;
		case 'select':
		case 'multiselect':
			if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
				$attributes = '';
				$options_markup = '';
				foreach( $arguments['options'] as $key => $label ){
					$options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value[ array_search( $key, $value, true ) ], $key, false ), $label );
				}
				if( $arguments['type'] === 'multiselect' ){
					$attributes = ' multiple="multiple" ';
				}
				printf( '<select name="%1$s[]" id="%1$s" %2$s>%3$s</select>', $arguments['uid'], $attributes, $options_markup );
			}
			break;
		case 'radio':
		case 'checkbox':
			if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
				$options_markup = '';
				$iterator = 0;
				foreach( $arguments['options'] as $key => $label ){
					$iterator++;
					$options_markup .= sprintf( '<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>', $arguments['uid'], $arguments['type'], $key, checked( $value[ array_search( $key, $value, true ) ], $key, false ), $label, $iterator );
				}
				printf( '<fieldset>%s</fieldset>', $options_markup );
			}
			break;
		}

		if( in_array('helper', $arguments) && $helper = $arguments['helper'] ){
			printf( '<span class="helper"> %s</span>', $helper );
		}

		if( in_array('supplimental', $arguments) && $supplimental = $arguments['supplimental'] ){
			printf( '<p class="description">%s</p>', $supplimental );
		}

	}

}
new BranchSettingsPlugin();
