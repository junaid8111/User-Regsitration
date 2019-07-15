<?php
session_start();
/**
 * Plugin Name: Registration-Form-WP
 * Description: User registration form 
 * Version: 2.0
 * Author: junaid
 * Text Domain: user-registration
 */
?>
<?php

include(plugin_dir_path(__FILE__) . "register-scripts.php");

include(plugin_dir_path(__FILE__)  . "validate-ajax.php" );

//short code for Sign Up
function register_member_shortcode(){
    include(plugin_dir_path(__FILE__) . "user-signUp.php");
}
?>
<?php
add_shortcode('register-member-code', 'register_member_shortcode');
?>

<?php
//short code for Sign In 
function signIn_member_shortcode(){
    include(plugin_dir_path(__FILE__) . "user-login.php");
}
?>

<?php
add_shortcode( 'signIn-member-code', 'signIn_member_shortcode' );
?>

<?php
//short code  New Dashboard
function Newdashboard_member_shortcode(){
    include(plugin_dir_path(__FILE__) . "dashboardd.php");
}
?>

<?php
add_shortcode( 'Newdashboard-member-code', 'Newdashboard_member_shortcode' );
?>

<?php 
//short code for dashboard
function dashboard_member_shortcode(){
    include(plugin_dir_path(__FILE__) . "dashboard.php");
}
?>

<?php
add_shortcode( 'dashboard-member-code', 'dashboard_member_shortcode' );
?>

<?php
//short code for profile custom_post_type
    include(plugin_dir_path(__FILE__) . "profile_custom _post.php");
?>

<?php
//short code  Billing
function billing_member_shortcode(){
    include(plugin_dir_path(__FILE__) . "Billing.php");
}
?>

<?php
add_shortcode( 'billing-member-code', 'billing_member_shortcode' );
?>

<?php
//short code  userUpdate
function userUpdate_shortcode(){
    include(plugin_dir_path(__FILE__) . "updateUser.php");
}
?>

<?php
add_shortcode( 'userUpdate-code', 'userUpdate_shortcode' );
?>

<?php
//for create table

function package_create_table() {
 global $wpdb;

$table_name = $wpdb->prefix . 'package';

 if( $wpdb->get_var('SHOW TABLES LIKE' . $table_name) != $table_name ){ 
 $charset_collate = $wpdb->get_charset_collate();
 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );


 //* Create the package table
 
 $sql = "CREATE TABLE $table_name (
 package_id INTEGER NOT NULL AUTO_INCREMENT,
 package_name TEXT NOT NULL,
 package_desc TEXT NOT NULL,
 package_price TEXT NOT NULL,
 package_feature TEXT NOT NULL,
 package_fromDate TEXT NOT NULL,
 package_toDate TEXT NOT NULL,
 PRIMARY KEY (package_id)
 ) $charset_collate;";
 dbDelta( $sql );

}
else {
	echo "table doneee";
}
}
register_activation_hook( __FILE__, 'package_create_table' );
?>

<style type="text/css">
	<style type="text/css">
	
form.ajax-auth{
    
	background-color: #FFFFFF;
    border-radius: 8px;
    font-family: Arial, Helvetica, sans-serif;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);   
    color: #878787;
    font-size: 11px;
}

.ajax-auth h1, .ajax-auth h3{
    font-family: 'Georgia', 'Times New Roman', Times, serif;
    font-weight: 100;
    color: #333333;    
	line-height: 1;    
}

.ajax-auth h3{
    font-size: 18px;
    text-align: left;
    margin: 0;
}

.ajax-auth h3 a{
	color: #e25c4c;
}

.ajax-auth hr {
    background-color: rgba(0, 0, 0, 0.1);
    border: 0 none;
    height: 1px;
    margin: 20px 0;
}

.ajax-auth input#st-username,
.ajax-auth input#st-psw,
.ajax-auth input#st-email,
.ajax-auth input#st-cpsw,
.ajax-auth input#bill-name,
.ajax-auth input#b-amount{
    border: 1px solid #EDEDED;
    border-radius: 3px 3px 3px 3px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1) inset;
    color: #333333;
    font-size: 15px;
    margin: 7px 0 20px 0;
    background-color: #F9F9F9;
    font-family: 'Georgia', 'Times New Roman', Times, serif;
}

.ajax-auth input#st-username:focus,
.ajax-auth input#st-psw:focus,
.ajax-auth input#st-email:focus,
.ajax-auth input#st-cpsw:focus,
.ajax-auth input#bill-name:focus,
.ajax-auth input#b-amount:focus{
    background-color: #FFF;
}

.ajax-auth label.error{
	display: none !important;
}

.ajax-auth input.error{
	border: 1px solid #FF0000 !important;
}

.ajax-auth input.submit_button{
    font-size: 13px;
    color: #FFF;
    border: 1px solid #b34336;
    background-color: #e25c4c;
    border-radius: 3px;
    text-shadow: 0 1px 0 #ba3f31;
    padding: 9px 31px 9px 31px;
    background: -moz-linear-gradient(top, #ea6656, #df5949);
    border-top: 1px solid #bb483a;
    border-bottom: 1px solid #a63b2e;
    float: right;
    box-shadow: 0 1px 0 #E87A6E inset
}

.ajax-auth input.billing_button{
    font-size: 13px;
    color: #FFF;
    border: 1px solid #b34336;
    background-color: #e25c4c;
    border-radius: 3px;
    text-shadow: 0 1px 0 #ba3f31;
    padding: 9px 31px 9px 31px;
    background: -moz-linear-gradient(top, #ea6656, #df5949);
    border-top: 1px solid #bb483a;
    border-bottom: 1px solid #a63b2e;
    float: right;
    box-shadow: 0 1px 0 #E87A6E inset;

}
.ajax-auth input.login_back{
    font-size: 13px;
    color: #FFF;
    border: 1px solid #b34336;
    background-color: #e25c4c;b
    border-radius: 3px;
    text-shadow: 0 1px 0 #ba3f31;
    padding: 9px 31px 9px 31px;
    background: -moz-linear-gradient(top, #ea6656, #df5949);
    border-top: 1px solid #bb483a;
    border-bottom: 1px solid #a63b2e;
    float: left;
    box-shadow: 0 1px 0 #E87A6E inset;

}
.ajax-auth input.billing_button:hover{
    
    background-color: #e25c4c;
    background: -moz-linear-gradient(top, #ea6656, #df5949);
 
}
.ajax-auth input.login_back:hover{
    
    background-color: #e25c4c;
    background: -moz-linear-gradient(top, #ea6656, #df5949);
 
}


.ajax-auth a{
    text-decoration: none;
}


#error-message,#success-message{
    margin-top: 60px;
}



</style>