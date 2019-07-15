<?php

function st_ajaxurl(){ ?>
 
<script>
 
var ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';
 
</script>
 
<?php

}
add_action('wp_head','st_ajaxurl');


// sign up

function st_handle_registration(){

if( $_POST['action'] == 'register_action' ) {

$error = '';

$uname = trim( $_POST['username'] );
$email = trim( $_POST['mail_id'] );
$pswrd = $_POST['passwrd'];
$cpswrd = $_POST['cpasswrd'];

if( empty( $_POST['username'] ) ){
	$error .= '<p class="error">Enter Username</p>';
}

 if (strpos($uname, ' ') !== FALSE) {
 	$error .= '<p class="error">Username has Space</p>';
}

if (username_exists($uname)) {
    $error .= '<p class="error">Username already exists</p>';
}

if( empty( $_POST['mail_id'] ) ){
	$error .= '<p class="error">Enter Email Id</p>';
}
 elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
	$error .= '<p class="error">Enter Valid Email</p>';
}

if( empty( $_POST['passwrd'] ) ){
	$error .= '<p class="error">Password should not be blank</p>';
}

if (strcmp($pswrd, $cpswrd) !== 0) {
    $error .= '<p class="error">Password did not match</p>';
}

if( empty( $error ) ){

$status = wp_create_user( $uname, $pswrd ,$email );

if( is_wp_error($status) ){

$msg = '';

 foreach( $status->errors as $key=>$val ){

 foreach( $val as $k=>$v ){

 $msg = '<p class="error">'.$v.'</p>';
 }
 }

echo $msg;

 }else{

$msg = '<p class="success alert-success">Registration Successful</p>';

 echo $msg;
 }

}
 else{

echo $error;
 }
 die(1);
 }
}
add_action( 'wp_ajax_register_action', 'st_handle_registration');
add_action( 'wp_ajax_nopriv_register_action', 'st_handle_registration');

// sign in 

function st_handle_login(){

if( $_POST['action'] == 'register_login' ) {
$error = '';

$uname = trim( $_POST['username'] );
$pswrd = $_POST['passwrd'];

if( empty( $_POST['username'] ) ){
	$error .= '<p class="error">Enter Username</p>';
}

 if (strpos($uname, ' ') !== FALSE) {
 	$error .= '<p class="error">Username has Space</p>';
}

if( empty( $_POST['passwrd'] ) )
 $error .= '<p class="error">Password should not be blank</p>';

if( empty( $error ) ){

global $wpdb; 
//We shall SQL escape all inputs 
$username = $wpdb->escape($_REQUEST['username']); 
$password = $wpdb->escape($_REQUEST['passwrd']); 
$remember = $wpdb->escape($_REQUEST['rememberme']); 

if($remember) $remember = "true"; 
else $remember = "false"; 

$login_data = array(); 
$login_data['user_login'] = $username; 
$login_data['user_password'] = $password; 
$login_data['remember'] = $remember; 

$user_verify = wp_signon( $login_data, false ); 

if ( is_wp_error($user_verify) ) 
{   
	$msg='';
    $msg = '<p class="error">Invlaid Login Details</p>';
	echo $msg;;
} 
else
{ 
    $_SESSION['user-session'] = $username; 
    $_SESSION['pass-session'] = $password;

echo "<script type='text/javascript'>window.location.href='http://localhost/wordpress/billing/'</script>"; 
exit();

} 

}
 else{

echo $error;
 }
 die(1);
 }
}
add_action( 'wp_ajax_register_login', 'st_handle_login');
add_action( 'wp_ajax_nopriv_register_login', 'st_handle_login');

 // billing

function st_handle_billing(){

if( $_POST['action'] == 'register_billing' ) {

$error = '';

$bill_name = ( $_POST['username'] );
$amount = $_POST['amount'];

if( empty( $_POST['username'] ) ){
	$error .= '<p class="error">Enter Bill Name</p>';
}

 if (strpos($bill_name, ' ') !== FALSE) {
 	$error .= '<p class="error">Name has Space</p>';
}

if( empty( $_POST['amount'] ) )
 $error .= '<p class="error">Enter Amount</p>';

if( empty( $error ) ){
 
    $_SESSION['bill-name-session'] = $bill_name; 
    $_SESSION['amount-session'] = $amount;

echo "<script type='text/javascript'>window.location.href='http://localhost/wordpress/dashboard/'</script>"; 
exit();

}
 else{

echo $error;
 }
 die(1);
 }
}
add_action( 'wp_ajax_register_billing', 'st_handle_billing');
add_action( 'wp_ajax_nopriv_register_billing', 'st_handle_billing');

function st_handle_update_user(){

// updation

if( $_POST['action'] == 'register_update_user' ) {

$user_id = $_SESSION['user_id'];

$error = '';

$uname = trim( $_POST['username'] );
$email = trim( $_POST['mail_id'] );
$pswrd = $_POST['passwrd'];
$cpswrd = $_POST['cpasswrd'];

if( empty( $_POST['username'] ) ){
	$error .= '<p class="error">Enter Username</p>';
}

 if (strpos($uname, ' ') !== FALSE) {
 	$error .= '<p class="error">Username has Space</p>';
}

if( empty( $_POST['mail_id'] ) ){
	$error .= '<p class="error">Enter Email Id</p>';
}
 elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
	$error .= '<p class="error">Enter Valid Email</p>';
}

if( empty( $_POST['passwrd'] ) ){
	$error .= '<p class="error">Password should not be blank</p>';
}

if (strcmp($pswrd, $cpswrd) !== 0) {
    $error .= '<p class="error">Password did not match</p>';
}

if( empty( $error ) ){

global $wpdb; 
//We shall SQL escape all inputs 
$username = $wpdb->escape($_REQUEST['username']); 
$email = $wpdb->escape($_REQUEST['mail_id']);
$password = $wpdb->escape($_REQUEST['passwrd']); 
 
       //user updation
    $edit_result = $wpdb->update('wp_users', array('user_login' => $username,'user_email' => $email,'user_pass' => md5($password) ),array('ID' => $user_id));
    echo "<script type='text/javascript'>window.location.href='http://localhost/wordpress/sign-in/'</script>";
    exit(); 
}
 else{

echo $error;
 }
 die(1);
 }
}
add_action( 'wp_ajax_register_update_user', 'st_handle_update_user');
add_action( 'wp_ajax_nopriv_register_update_user', 'st_handle_update_user');