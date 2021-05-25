<?php
/**
* Plugin Name: FS Divi Library Shortcodes
* Plugin URI: https://github.com/FreshyMichael/Plugin-Starter
* Description: Add Divi Library Shortcode to display library items anywhere
* Version: 1.0.0
* Author: FreshySites
* Author URI: https://freshysites.com/
* License: GNU v3.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/* FS Divi Library Shortcodes Start */
//______________________________________________________________________________

// create new column in et_pb_layout screen
add_filter( 'manage_et_pb_layout_posts_columns', 'fs_create_shortcode_column', 5 );
add_action( 'manage_et_pb_layout_posts_custom_column', 'fs_shortcode_content', 5, 2 );
// register new shortcode
add_shortcode('fs_layout_sc', 'fs_shortcode_mod');

// New Admin Column
function fs_create_shortcode_column( $columns ) {
$columns['fs_shortcode_id'] = 'Module Shortcode';
return $columns;
}

//Display Shortcode
function fs_shortcode_content( $column, $id ) {
if( 'fs_shortcode_id' == $column ) {
?>
<p>[fs_layout_sc id="<?php echo $id ?>"]</p>
<?php
}
}

// Create New Shortcode
function fs_shortcode_mod($fs_mod_id) {
extract(shortcode_atts(array('id' =>'*'),$fs_mod_id));
return do_shortcode('[et_pb_section global_module="'.$id.'"][/et_pb_section]');
}


//______________________________________________________________________________
// All About Updates

//  Begin Version Control | Auto Update Checker
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
// ***IMPORTANT*** Update this path to New Github Repository Master Branch Path
	'https://github.com/FreshyMichael/fs-divi-shortcodes',
	__FILE__,
// ***IMPORTANT*** Update this to New Repository Master Branch Path
	'fs-divi-shortcodes'
);
//Enable Releases
$myUpdateChecker->getVcsApi()->enableReleaseAssets();
//Optional: If you're using a private repository, specify the access token like this:
//
//
//Future Update Note: Comment in these sections and add token and branch information once private git established
//
//
//$myUpdateChecker->setAuthentication('your-token-here');
//Optional: Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name');

//______________________________________________________________________________
/* FS Divi Library Shortcodes End */
?>
