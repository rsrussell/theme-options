<?phpfunction getweb_menu_table(){	global $wpdb;	return $wpdb->prefix . "getweb_option_menu";}function getweb_field_table(){	global $wpdb;	return $wpdb->prefix . "getweb_option_field";}function get_fileds_id($id){	global $wpdb;	$field_by_id = $wpdb->get_row(		$wpdb->prepare(			"SELECT * from " . getweb_field_table() . " WHERE id = %d ",$id		),ARRAY_A	);	return $field_by_id;}function get_menus($publish = true,$parent = 0){	global $wpdb;	if ($publish == 1) {		/*$get_headings = $wpdb->get_results(			$wpdb->prepare(				"SELECT * from " . getweb_menu_table() . " WHERE status = %d ",1			),ARRAY_A		);*/		$get_headings = $wpdb->get_results( "SELECT * FROM " . getweb_menu_table() . " WHERE status = 1 && parent = $parent" );	} elseif ($publish == 0) {		/*$get_headings = $wpdb->get_results(			$wpdb->prepare(				"SELECT * from " . getweb_menu_table() . " WHERE status = %d ",0			),ARRAY_A		);*/		$get_headings = $wpdb->get_results( "SELECT * FROM " . getweb_menu_table() . " WHERE status = 0 && parent = $parent" );	} elseif ($publish == -1 && $parent == -1) {		/*$get_headings = $wpdb->get_results(			$wpdb->prepare(				"SELECT * from " . getweb_menu_table() . " ORDER by id ASC", ""			), ARRAY_A		);*/		$get_headings = $wpdb->get_results( "SELECT * FROM " . getweb_menu_table() . " ORDER by id ASC" );	} elseif ($publish == 2) {		$get_headings = $wpdb->get_results( "SELECT * FROM " . getweb_menu_table() . " WHERE status = 1" );	} else {		return 'Do not matched.';	}	return $get_headings;}function get_menu_by_id($id){	global $wpdb;	$field_by_id = $wpdb->get_row(		$wpdb->prepare(			"SELECT * from " . getweb_menu_table() . " WHERE id = %d ",$id		),ARRAY_A	);	return $field_by_id;}function menu_name_by_id( $id ) {	global $wpdb;	$getweb_heading_by_id = $wpdb->get_row(		$wpdb->prepare(			"SELECT * from " . getweb_menu_table() . " WHERE id = %d ", $id		), ARRAY_A	);	return $getweb_heading_by_id['name'];}function create_before( $time_ago ) {	$time_ago     = strtotime( $time_ago );	$cur_time     = time();	$time_elapsed = $cur_time - $time_ago;	$seconds      = $time_elapsed;	$minutes      = round( $time_elapsed / 60 );	$hours        = round( $time_elapsed / 3600 );	$days         = round( $time_elapsed / 86400 );	$weeks        = round( $time_elapsed / 604800 );	$months       = round( $time_elapsed / 2600640 );	$years        = round( $time_elapsed / 31207680 );	// Seconds	if ( $seconds <= 60 ) {		return "just now";	} //Minutes	elseif ( $minutes <= 60 ) {		if ( $minutes == 1 ) {			return "one minute ago";		} else {			return "$minutes minutes ago";		}	} //Hours	elseif ( $hours <= 24 ) {		if ( $hours == 1 ) {			return "an hour ago";		} else {			return "$hours hours ago";		}	} //Days	elseif ( $days <= 7 ) {		if ( $days == 1 ) {			return "yesterday";		} else {			return "$days days ago";		}	} //Weeks	elseif ( $weeks <= 4.3 ) {		if ( $weeks == 1 ) {			return "a week ago";		} else {			return "$weeks weeks ago";		}	} //Months	elseif ( $months <= 12 ) {		if ( $months == 1 ) {			return "a month ago";		} else {			return "$months months ago";		}	} //Years	else {		if ( $years == 1 ) {			return "one year ago";		} else {			return "$years years ago";		}	}}/*------------[ Theme Option Get Data ]-------------*//** * @param $key * @param $default * @param bool $replace_site_url * @return mixed */if(!function_exists('getweb_theme_option_value')){  function getweb_theme_option_value($key, $default ) {    $value = get_theme_mod( $key, $default );    return $value;  }}if(!function_exists('getweb_option_array_value')){  function getweb_option_array_value($key1, $key2, $default) {    global $gtof_data;    $value = isset($gtof_data[$key1][$key2]) ? $gtof_data[$key1][$key2] : $default;    return $value;  }}function of_get_options($key = null, $data = null) {	global $gtof_data;	do_action('of_get_options_before', array(		'key'=>$key, 'data'=>$data	));	if ($key != null) { // Get one specific value		$data = get_theme_mod($key, $data);	} else { // Get all values		$data = get_theme_mods();	}	$data = apply_filters('of_options_after_load', $data);	if ($key == null) {		$gtof_data = $data;	} else {		$gtof_data[$key] = $data;	}	do_action('of_option_setup_before', array(		'key'=>$key, 'data'=>$data	));	return $data;}function of_save_options($data, $key = null) {	global $gtof_data;	if (empty($data))		return;	do_action('of_save_options_before', array(		'key'=>$key, 'data'=>$data	));	$data = apply_filters('of_options_before_save', $data);	if ($key != null) { // Update one specific value		if ($key == BACKUPS) {			unset($data['gtof_init']); // Don't want to change this.		}		set_theme_mod($key, $data);	} else { // Update all values in $data		foreach ( $data as $k=>$v ) {			if (!isset($gtof_data[$k]) || $gtof_data[$k] != $v) { // Only write to the DB when we need to				set_theme_mod($k, $v);			} else if (is_array($v)) {				foreach ($v as $key=>$val) {					if ($key != $k && $v[$key] == $val) {						set_theme_mod($k, $v);						break;					}				}			}		}	}	do_action('of_save_options_after', array(		'key'=>$key, 'data'=>$data	));}