<?php

// Sign Up User
?>

<!DOCTYPE html>
    <html>
    <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                </div>

                <div class="col-md-4">
                <div class="form-wrapper">                   
                    <form class="ajax-auth" method="post" name="st-register-form">
                         <h3>Already have an account? <a id="pop_login" href="http://localhost/wordpress/sign-in/">Login</a></h3>
                      <hr />
                     <div class="form-label"><label for="st-username"><?php _e( 'Username', 'debate' ); ?></label></div>
                     <div class="field"><input type="text" autocomplete="off" name="username" id="st-username" /></div>
                     
                    <div class="form-label"><label for="st-email"><?php _e( 'Email', 'debate' ); ?></label></div>
                     <div class="field"><input type="text" autocomplete="off" name="mail_id" id="st-email" /></div>
                     
                    <div class="form-label"><label for="st-psw"><?php _e( 'Password', 'debate' ); ?></label></div>
                     <div class="field"><input type="password" name="password" id="st-psw" /></div>

                     <div class="form-label"><label for="st-cpsw"><?php _e( 'Confirm Password', 'debate' ); ?></label></div>
                     <div class="field"><input type="password" name="cpassword" id="st-cpsw" /></div>
                     
                    <div class="frm-button"><input class="submit_button" type="button" id="register-me" value="Register" /></div>
                    </form>
                    
                    <div id="error-message"><p class="status alert-danger"></p></div>
                    <div id="success-message"><p class=" success alert-success"></p></div>   
                </div>
                </div>

                <div class="col-md-4">
                </div>
            </div>
        </div>
          
       <!--  <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
            <form id="wp_signup_form" method="POST">

                <div>
                <h2 class="heading-signIn">Sign Up</h2>
                </div>
                <label>User Name</label>
                <div>
                    <input type="text" class="form-control" name="txtUsername"
                        id="name" placeholder="Enter your name">
                        <span id="name_error" class="error"> <?php echo $error['username_empty'].$error['username_space'].$error['username_exists'];  ?> </span>

                </div>
         
                <label>Email</label>
                <div>
                    <input type="email" class="form-control" name="txtEmail" id="email"
                        class="form-control"
                        placeholder="Enter your Email ID">
                        <span id="email_error" class="error"> <?php echo $error['email_valid'].$error['email_existence'];  ?></span>

                </div>
                     
                <label>Password</label>
                <div>
                    <input type="Password" class="form-control" name="txtPassword" id="password"
                        class="form-control"
                        placeholder="Enter your password">
                        <span id="password_error" class="error"><?php echo  $error['password']; ?></span>

                </div>
              
                <label>Confirm Password</label>
                <div>
                    <input type="password" class="form-control" name="txtConfirmPassword"
                        id="confirm_pasword" class="form-control"
                        placeholder="Re-enter your password">
                        <span id="confirm_password_error" class="error"> </span>

                </div>
              
                <div class="btns" align="center">
                    <button style="margin-top: 10px" type="submit" name="submit" class="btn sign-up-btn">Sign Up</button>
                        
                    <a href="http://localhost/wordpress/sign-in/"><button style="margin-top: 10px" type="button" name="submit" class="btn">Login</button></a>

                </div>
                <div class="success-message text-center">
                    <br>
                    <p><?php echo $error['suucess']; ?></p>
                </div>

            </form>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div> -->
    </body>
    </html>      

<script type="text/javascript">

$(document).ready(function(){

/* Registration Ajax */
    jQuery('#register-me').on('click',function(){
    var action = 'register_action';   
    var username = jQuery("#st-username").val();
    var mail_id = jQuery("#st-email").val();
    var passwrd = jQuery("#st-psw").val();
    var cpasswrd = jQuery("#st-cpsw").val();
     
    var ajaxdata = {
     
    action: 'register_action',

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