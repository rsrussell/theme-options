<?php/** * @package  getwebThemeOption */namespace Getweb\Common;use Getweb\Common\BaseController;class TableController extends BaseController {	/*Create Database Table*/	public function option_table() {		global $wpdb;		global $jal_db_version;		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );		// create settings table		$db_table_name_menu  = getweb_menu_table();		$db_table_name_field = getweb_field_table();		if ( $wpdb->get_var( "SHOW TABLES LIKE '$db_table_name_menu'" ) != $db_table_name_menu ) {			if ( ! empty( $wpdb->charset ) ) {				$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";			}			if ( ! empty( $wpdb->collate ) ) {				$charset_collate .= " COLLATE $wpdb->collate";			}			$sql = "CREATE TABLE $db_table_name_menu (		id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,                name VARCHAR(250) NOT NULL,                parent INT(9) NOT NULL DEFAULT 0,                 status INT(11) NOT NULL,                 icon VARCHAR(250) NOT NULL,                 extra_class VARCHAR(250) NOT NULL,                created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,   		UNIQUE KEY id (id)		) $charset_collate;";			dbDelta( $sql );			 $wpdb->insert( $db_table_name_menu,				array(				'id'       		=> 1,				'name'     		=> 'General',				'parent'   		=> 0,				'status'   		=> 1,				'icon'     		=> 'fa fa-cogs',				'extra_class'	=> '',				'created_at'	=> current_time('mysql'),			)			);			 $wpdb->insert( $db_table_name_menu,				array(				'id'       		=> 2,				'name'     		=> 'Header',				'parent'   		=> 0,				'status'   		=> 1,				'icon'     		=> 'fa fa-file-o',				'extra_class'	=> '',				'created_at'	=> current_time('mysql'),			)			);			/*"INSERT INTO $db_table_name_menu ('id', 'name', 'parent', 'status', 'icon', 'extra_class', 'created_at') VALUES(1, 'General', 0, 1, 'fa fa-cogs', '', '2019-10-20 03:57:53'),(2, 'Header', 0, 1, 'fa fa-file-o', '', '2019-10-20 04:01:24')";*//*$rows_affected = $wpdb->query("INSERT INTO $db_table_name_menu            ('id', 'name', 'parent', 'status', 'icon', 'extra_class', 'created_at')            VALUES            (1, 'General', 0, 1, 'fa fa-cogs', '', CURRENT_TIMESTAMP),            (2, 'Header', 0, 1, 'fa fa-file-o', '', CURRENT_TIMESTAMP)           ");*/		}				if ( $wpdb->get_var( "SHOW TABLES LIKE '$db_table_name_field'" ) != $db_table_name_field ) {			if ( ! empty( $wpdb->charset ) ) {				$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";			}			if ( ! empty( $wpdb->collate ) ) {				$charset_collate .= " COLLATE $wpdb->collate";			}			$sql = "CREATE TABLE $db_table_name_field (		id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,                title VARCHAR(250) NOT NULL,                description VARCHAR(250) NOT NULL,                get_id VARCHAR(250) NOT NULL,                default_value VARCHAR(250) NOT NULL,                custom_class VARCHAR(250) NOT NULL,                type VARCHAR(250) NOT NULL,                more_values VARCHAR(250) NULL ,                other VARCHAR(250) NULL ,                info VARCHAR(250) NULL ,                menu_id INT(250) NOT NULL,                status INT(11) NOT NULL,                created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,   		UNIQUE KEY id (id)		) $charset_collate;";			dbDelta( $sql );			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 1,				'title'     	=> 'General Info',				'description'	=> 'Welcome to the Skill Advisor WordPress Responsive Theme.',				'get_id'   		=> 'get_info',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'info',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '<h3>Welcome to the Skill Advisor WordPress Responsive Theme.</h3>\r\nAdjust the options here and change the theme like you want',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 2,				'title'     	=> 'Upload Logo',				'description'	=> 'Upload a custom logo. Width and Height should be within 153px x43px.',				'get_id'   		=> 'custom_logo',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 3,				'title'     	=> 'Upload Logo Light',				'description'	=> 'Upload a custom logo light. Width and Height should be within 153px x43px.',				'get_id'   		=> 'custom_logo_light',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 4,				'title'     	=> 'Upload Retina Logo',				'description'	=> 'Upload a retina logo. Width and Height should be within 153px x43px.',				'get_id'   		=> 'retina_logo',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 5,				'title'     	=> 'Upload Retina Logo Light',				'description'	=> 'Upload a retina logo light. Width and Height should be within 153px x43px.',				'get_id'   		=> 'retina_logo_light',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 6,				'title'     	=> 'Upload Mobile Logo',				'description'	=> 'Upload a mobile logo. Width and Height should be within 153px x43px.',				'get_id'   		=> 'custom_mobile_logo',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 7,				'title'     	=> 'Upload Sticky Logo',				'description'	=> 'Upload a sticky logo. Width and Height should be within 153px x43px.',				'get_id'   		=> 'custom_sticky_logo',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 8,				'title'     	=> 'Upload Retina Sticky Logo',				'description'	=> 'Upload a retina sticky logo. Width and Height should be within 153px x43px.',				'get_id'   		=> 'retina_sticky_logo',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 9,				'title'     	=> 'Fav Icon',				'description'	=> 'Upload a 16px x 16px Png/Gif image that will represent your website favicon.',				'get_id'   		=> 'fav_icon',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 10,				'title'     	=> 'Apple Touch Icon',				'description'	=> 'Size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4 retina display (IMHO, just go ahead and use the biggest one). Transparency is not recommended (iOS will put a black BG behind the icon)',				'get_id'   		=> 'apple_touch_icon',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 11,				'title'     	=> 'Windows Tile Icon',				'description'	=> 'Size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4 retina display (IMHO, just go ahead and use the biggest one). Transparency is not recommended (iOS will put a black BG behind the icon)',				'get_id'   		=> 'win_tile_icon',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'media',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 12,				'title'     	=> 'Responsive',				'description'	=> 'Please choose responsive.',				'get_id'   		=> 'mobile_responsive',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'switch',				'more_values'   => '[{"select_title":"On","select_value":"on"},{"select_title":"Of","select_value":"of"}]',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 13,				'title'     	=> 'Primary Color',				'description'	=> 'This is the primary color. Its applied for most of the items in the theme such as button, link etc..',				'get_id'   		=> 'pri_color',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'color',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 14,				'title'     	=> 'Search Text',				'description'	=> 'Please enter search text here.',				'get_id'   		=> 'search_text',				'default_value' => 'Search',				'custom_class'  => '',				'type'   		=> 'text',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 15,				'title'     	=> 'Show Go to Top Button',				'description'	=> 'Please enter search text here.',				'get_id'   		=> 'go_to_top',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'switch',				'more_values'   => '[{"select_title":"Enable","select_value":"enable"},{"select_title":"Disable","select_value":"disable"}]',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 16,				'title'     	=> 'Show Go to Top Button',				'description'	=> 'Show/Hide go to top button on mobile in the page',				'get_id'   		=> 'go_to_top_mobile',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'switch',				'more_values'   => '[{"select_title":"Enable","select_value":"enable"},{"select_title":"Disable","select_value":"disable"}]',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 17,				'title'     	=> 'Custom CSS',				'description'	=> 'Type your custom CSS rules.',				'get_id'   		=> 'custom_css',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'textarea',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 18,				'title'     	=> 'Custom JS in Head Tag',				'description'	=> 'Type your header custom JS.',				'get_id'   		=> 'custom_js',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'textarea',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			$wpdb->insert( $db_table_name_field,				array(				'id'       		=> 19,				'title'     	=> 'Custom JS below Footer',				'description'	=> 'Type your footer custom JS.',				'get_id'   		=> 'custom_js_footer',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'textarea',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '',				'menu_id'   	=> 1,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);			array(				'id'       		=> 20,				'title'     	=> 'Social Networking Icons',				'description'	=> 'Social Networking Icons',				'get_id'   		=> 'header_social_info',				'default_value' => '',				'custom_class'  => '',				'type'   		=> 'info',				'more_values'   => 'null',				'other'   		=> '',				'info'   		=> '<h3>Social Networking Icons</h3>Enter the url to display social networking icons you want, Leave it empty if you don\'t want display',				'menu_id'   	=> 2,				'status'   		=> 1,				'created_at'	=> current_time('mysql'),			)			);		}		add_option( "jal_db_version", "WETWEB_OPTION_VERSION" );	}}