<?php/** * @package  getwebThemeOption *//*Plugin Name: Theme OptionsPlugin URI: https://getwebinc.comDescription: Awesome Theme Options Plugin.Add option field dynamically.Version: 1.0.0Author: R S RUSSELLAuthor URI: https://facebook.com/with.rain79License: GPLv2Text Domain: getweb*/if (!defined('ABSPATH'))	exit;define( 'GETWEB_OPTION_VERSION', '1.0' );define( 'GETWEB_OPTION_PLUGINS', plugins_url().'/theme-options');define( 'BACKUPS','backups' );$theme_version = '';$theme_data = wp_get_theme();$theme_version = $theme_data['Version'];$theme_name = $theme_data['Name'];$theme_uri = $theme_data['ThemeURI'];$author_uri = $theme_data['AuthorURI'];// Require once the Composer Autoloadif ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {	require_once dirname( __FILE__ ) . '/vendor/autoload.php';}include('inc/Helper/helper.php');/** * The code that runs during plugin activation */function activate_option_plugin() {	Getweb\Common\ActivateThemeOptions::ActivateThemeOptionsFlash();}register_activation_hook( __FILE__, 'activate_option_plugin' );/** * The code that runs during plugin deactivation */function deactivate_option_plugin() {	Getweb\Common\DeactivateThemeOptions::DeactivateThemeOptionsFlash();}register_deactivation_hook( __FILE__, 'deactivate_option_plugin' );/** * The code that runs during plugin active to create table */function create_options_table() {	Getweb\Common\TableController::option_table();}register_activation_hook(__FILE__, 'create_options_table' );/** * Initialize all the core classes of the plugin */if ( class_exists( 'Getweb\\Getweb' ) ) {	Getweb\Getweb::registerServices();}