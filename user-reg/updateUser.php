<?php 

$edit_username = $_SESSION['edit-username'];
$edit_email = $_SESSION['edit-email'];
$edit_pass = $_SESSION['edit-pass'];
$user_id = $_SESSION['user_id'];  

if($_POST) 
{
    global $wpdb;
    $username = $wpdb->escape($_POST['txtUsername']);
    $email = $wpdb->escape($_POST['txtEmail']);
    $password = $wpdb->escape($_POST['txtPassword']);
    $ConfPassword = $wpdb->escape($_POST['txtConfirmPassword']);

    $error = array();
    if (strpos($username, ' ') !== FALSE) {
        $error['username_space'] = "Username has Space";
    }

    if (empty($username)) {
        $error['username_empty'] = "Needed Username must";
    }

    if (!is_email($email)) {
        $error['email_valid'] = "Email has no valid value";
    }

    if (strcmp($password, $ConfPassword) !== 0) {
        $error['password'] = "Password didn't match";
    }

    if(empty($password)){
        $error['password'] = "Please Enter Password";
    }

    if (count($error) == 0) {

       //user updation
    $edit_result = $wpdb->update('wp_users', array('user_login' => $username,'user_email' => $email,'user_pass' => md5($password) ),array('ID' => $user_id));
    echo "<script type='text/javascript'>window.location.href='http://localhost/wordpress/sign-in/'</script>";
    exit(); 
    
    }  
}

?>
<!DOCTYPE html>
<html>
<title>Upadate User</title>
<meta charset="UTF-8">
<body>
<div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                <div class="form-wrapper">                   
                    <form class="ajax-auth" method="post" name="st-register-form">
                        <h1>Update User Detail</h1>
                      <hr />
                     <div class="form-label"><label for="st-username"><?php _e( 'Username', 'debate' ); ?></label></div>
                     <div class="field"><input type="text" autocomplete="off" name="username" id="st-username" value="<?php echo $edit_username ?>" /></div>
                     
                    <div class="form-label"><label for="st-email"><?php _e( 'Email', 'debate' ); ?></label></div>
                     <div class="field"><input type="text" autocomplete="off" name="mail_id" id="st-email" value="<?php echo $edit_email ?>"</div>
                     
                    <div class="form-label"><label for="st-psw"><?php _e( 'Password', 'debate' ); ?></label></div>
                     <div class="field"><input type="password" name="password" id="st-psw" /></div>

                     <div class="form-label"><label for="st-cpsw"><?php _e( 'Confirm Password', 'debate' ); ?></label></div>
                     <div class="field"><input type="password" name="cpassword" id="st-cpsw" /></div>
                     
                     <div class="frm-button"><a href="http://localhost/wordpress/dashboard/"><input class="login_back" type="button" value="Go Back" /></a></div>

                    <div class="frm-button"><input class="submit_button" type="button" id="register-update" value="Update" /></div>
                    </form>
                    
                    <div id="error-message"><p class="status alert-danger"></p></div>
                    <div id="success-message"><p class=" success alert-success"></p></div>   
                </div>

<!--             <form id="wp_signup_form" method="POST">

                <div>
                <h2 class="heading-signIn">Update User Detail</h2>
                </div>
                <label>User Name</label>
                <div>
                    <input type="text" class="form-control" name="txtUsername"
                        id="name" value="<?php echo $edit_username  ?>">
                        <span id="name_error" class="error"> <?php echo $error['username_empty'].$error['username_space'].$error['username_exists'];  ?> </span>

                </div>
         
                <label>Email</label>
                <div>
                    <input type="email" class="form-control" name="txtEmail" id="email"
                        class="form-control" value="<?php echo $edit_email  ?>">
                        <span id="email_error" class="error"><?php echo $error['email_valid'].$error['email_existence'];  ?> </span>

                </div>
                     
                <label>Password</label>
                <div>
                    <input type="Password" class="form-control" name="txtPassword" id="password"
                        class="form-control" value="">
                        <span id="password_error" class="error"><?php echo  $error['password']; ?></span>

                </div>
              
                <label>Confirm Password</label>
                <div>
                    <input type="password" class="form-control" name="txtConfirmPassword"
                        id="confirm_pasword" class="form-control" value="">
                        <span id="confirm_password_error" class="error"></span>

                </div>
              
                <div class="btns" align="center">
                    <button style="margin-top: 10px" type="submit" name="submit" class="btn sign-up-btn">Update</button>
                        
                    <a href="http://localhost/wordpress/dashboard/"><button style="margin-top: 10px" type="button" name="submit" class="btn">Go Back</button></a>

                </div>
                <div class="success-message text-center">
                    <br>
                    <p><?php echo $error['suucess']; ?></p>
                </div>

            </form> -->
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
</body>
</html> 

<script type="text/javascript">

$(document).ready(function(){

/* Registration Ajax */
    jQuery('#register-update').on('click',function(){
    var action = 'register_update_user';   
    var username = jQuery("#st-username").val();
    var mail_id = jQuery("#st-email").val();
    var passwrd = jQuery("#st-psw").val();
    var cpasswrd = jQuery("#st-cpsw").val();
     
    var ajaxdata = {
     
    action: 'register_update_user',

     username: username,
     mail_id: mail_id,
     passwrd: passwrd,
     cpasswrd: cpasswrd,
     
    };
     
    jQuery.post( ajaxurl, ajaxdata, function(res){ // ajaxurl must be defined previously
     
    jQuery(".status").html(res);

        });
    });

});

</script>
