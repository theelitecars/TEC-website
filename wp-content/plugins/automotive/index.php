<?php
/**
 * Plugin Name: Automotive Listings
 * Plugin URI: http://demo.themesuite.com/index.php?plugin=Automotive
 * Description: A well-designed inventory management system that is a breeze to setup and customize for your vehicle inventory. It also includes a completely customizable, filterable, and sortable Inventory Search to search your Vehicle Listings, as well as a complete Inventory Management System and Loan Calculator. Guaranteed compatibility with the <a href='http://themeforest.net/item/automotive-car-dealership-business-wordpress-theme/9210971?ref=themesuite' target='_blank'>Automotive Theme</a>
 * Version: 6.0
 * Author: Theme Suite
 * Author URI: http://www.themesuite.com
 * Text Domain: listings
 * Domain Path: /languages/
 */

define("AUTOMOTIVE_VERSION", "6.0");

if ( ! defined( 'ABSPATH' ) ) exit("<!-- " . AUTOMOTIVE_VERSION . " -->"); // Exit if accessed directly

// translation my (friend||péngyou||vriend||ven||ami||freund||dost||amico||jingu||prijátel||amigo||arkadas)
function automotive_load_textdomain() {
    load_plugin_textdomain('listings', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'automotive_load_textdomain' );

$icons             = array("facebook", "twitter", "youtube", "vimeo", "linkedin", "rss", "flickr", "skype", "google", "pinterest");
$other_options     = array("price" => __("Price", "listings"), "city" => __("City MPG", "listings"), "hwy" => __("Highway MPG", "listings"));
$slider_thumbnails = array('width'    => 167, 
                           'height'   => 119,
                           'slider'   => array('width'  => 762,
                                               'height' => 456
                                         ),
                            'listing' => array('width'  => 200,
                                               'height' => 150
                                         )
                           );
$lwp_options       = get_option("listing_wp");
$badge_colors      = array("theme color" => __("Theme Color", "listings"), "red" => __("Red", "listings"), "orange" => __("Orange", "listings"), "yellow" => __("Yellow", "listings"), "green" => __("Green", "listings"), "blue" => __("Blue", "listings"), "indigo" => __("Indigo", "listings"), "violet" => __("Violet", "listings"), "black" => __("Black", "listings"), "custom" => __("Custom", "listings"));

//********************************************
//  Constant Paths
//***********************************************************
if( !defined("LISTING_HOME") ){
    define("LISTING_HOME", plugin_dir_path( __FILE__ ));
}

if( !defined('LISTING_DIR') ){
    define( 'LISTING_DIR', plugins_url() . '/automotive/' );
}

if( !defined('LISTING_ADMIN_DIR') ){
    define( 'LISTING_ADMIN_DIR', LISTING_DIR . 'admin/' );
}

if( !defined("ICON_DIR") ){
    define("ICON_DIR", LISTING_DIR . "images/icons/");
}

if( !defined("JS_DIR") ){
    define("JS_DIR", LISTING_DIR . "js/");
}

if( !defined("CSS_DIR") ){
    define("CSS_DIR", LISTING_DIR . "css/");
}

if( !defined("THUMBNAIL_DIR") ){
    define("THUMBNAIL_DIR", LISTING_HOME . "images/thumbnails/");
}

if( !defined("THUMBNAIL_URL") ){
    define("THUMBNAIL_URL", LISTING_DIR . "images/thumbnails/");
}

// overwrite hooks 
$plugin_dir = trailingslashit(dirname(dirname(__FILE__)));
if(file_exists($plugin_dir . "auto_overwrite.php")){
    include_once($plugin_dir . "auto_overwrite.php");
}

// include files
include_once("classes/class.listing.php");
include_once("plugin_functions.php");
include_once("the_widgets.php");
include_once("styling.php");
include_once("shortcodes.php");
$listing_features = get_option("listing_features");

if(isset($listing_features) && $listing_features != "disabled"){
    include_once("post-type.php");
    include_once("portfolio.php");
    include_once("listing_categories.php");
    include_once("file_import.php");
    include_once("vin_import.php");
    include_once("meta_boxes.php");
    include_once("save.php");
    include_once("page-templates.php");
    include_once("installer.php");
}

$Listing = new Listing;

// image sizes
$Listing->automotive_image_sizes();

// automotive update
if(isset($_GET['action']) && $_GET['action'] == "upgrade-plugin" && isset($_GET['plugin']) && $_GET['plugin'] == "automotive/index.php"){
    delete_option('_site_transient_update_plugins');
}

// Plugin Updater
include_once('plugin_updater/plugin-update-checker.php');
$MyUpdateChecker = PucFactory::buildUpdateChecker(
    'http://files.themesuite.com/automotive-wp/secure/plugin.php',
    __FILE__,
    'automotive'
);

global $pagenow;
if( $pagenow == "plugins.php" ){

    function automotive_update_message( $plugin_data, $r ){
	    global $Listing;

	    $valid_themeforest_creds = $Listing->validate_themeforest_creds();

        if($valid_themeforest_creds){
            $major_release_check = wp_remote_get( "http://files.themesuite.com/automotive-wp/major.txt" );

            if(!empty($major_release_check) && !empty($major_release_check['body'])){
                if(version_compare(AUTOMOTIVE_VERSION, $major_release_check['body'])){
                    echo "<div class='automotive_update_message'>";
                    echo "<i class='fa fa-exclamation-triangle'></i> " . sprintf( __("This update of the plugin is a major release and will need some additional configuring in order to get your site back in working order, please read <a href='%s' target='_blank'>this</a> article before updating.", "listings"), "http://support.themesuite.com/?p=2806" );
                    echo "</div>";
                }
            }

        } elseif(!$valid_themeforest_creds){
            echo "<div class='automotive_update_message'>";
            echo "<i class='fa fa-exclamation-triangle'></i> " . sprintf( __("It doesn't look like you have entered a valid ThemeForest Username & API Key. To recieve updates for the plugin you must validate this information in the <a href='%s'>Update Settings</a> section.", "listings"), admin_url( "admin.php?page=automotive_wp&tab=7" ) );
            echo "</div>";
        }
    }
    add_action( "in_plugin_update_message-automotive/index.php", "automotive_update_message", 20, 2);
}

$MyUpdateChecker->addQueryArgFilter('auto_filter_update_checks');

function auto_filter_update_checks($queryArgs) {
    global $awp_options;

    $themeforest_name = (isset($awp_options['themeforest_name']) && !empty($awp_options['themeforest_name']) ? $awp_options['themeforest_name'] : "");
    $themeforest_api  = (isset($awp_options['themeforest_api']) && !empty($awp_options['themeforest_api']) ? $awp_options['themeforest_api'] : "");

    if ( !empty($themeforest_name) && !empty($themeforest_api) ) {
        $queryArgs['themeforest_name'] = $themeforest_name;
        $queryArgs['themeforest_api']  = $themeforest_api;
    }

    return $queryArgs;
}

function listing_fix_init(){
    global $lwp_options, $Listing;
    
    $lwp_options = get_option("listing_wp");

    // $listing_orderby = get_option("listing_orderby");
    // if(isset($listing_orderby) && !empty($listing_orderby) && isset($listing_orderby[0]) && isset($listing_orderby[1])){
    //     delete_option("listing_orderby");
    // }

    /* Generate Slugs For Listing Categories */
    $Listing->convert_listing_data();

	/* Generate dependancies for existing users */
	$Listing->generate_dependancy_option();

    if(isset($_GET['hide_install_message']) && $_GET['hide_install_message']){
        update_option( "hide_install_message", true );
    } elseif(isset($_GET['show_installer'])){
        delete_option( "hide_install_message" );
    }


    // vc
    /*$attributes = array(
        'type' => 'textfield',
        'heading' => "Row Height",
        'param_name' => 'height',
        'description' => __( "Add a row height, useful for fullwidth and parallax elements.", "listings" )
    );

    vc_add_param( 'vc_row', $attributes );

    vc_map_update( 'vc_row', array(
            'html_template' => LISTING_HOME . 'vc_row.php'
        )
    );*/
}
add_action("init", "listing_fix_init");

$Listing->load_redux();