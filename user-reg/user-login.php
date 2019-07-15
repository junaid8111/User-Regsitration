<?php 

// Sign In 

get_header(); ?>
<?php

?>    
    <!DOCTYPE html>
    <html>
    <head>
    <title>Login</title>
    </head>
    <body>

            <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                <div class="form-wrapper">                   
                    <form id="login" class="ajax-auth" method="post" name="st-register-form" action="login">
                        <h3>New to site? <a id="pop_signup" href="http://localhost/wordpress/sign-up/">Create an Account</a></h3>
                        <hr />
                    <div class="form-label"><label for="st-username"><?php _e( 'Username', 'debate' ); ?></label></div>
                    <div class="field"><input type="text" autocomplete="off" name="username" id="st-username" /></div>
                     
                    <div class="form-label"><label for="st-psw"><?php _e( 'Password', 'debate' ); ?></label></div>
                    <div class="field"><input type="password" name="password" id="st-psw" /></div>

                    <div>
                    <label> 
                    <input class="myremember" id="remeber_me" name="rememberme" type="checkbox" value="forever"><span class="hey">Remember me</span></label> 
                    </div>
                     
                    <div class="frm-button"><input class="submit_button" type="button" id="register_login" value="Login" /></div>
                    </form>
                    
                    <div id="error-message"><p class="status alert-danger"></p></div>
                    <div id="success-message"><p class="alert-success"></p></div>  

                    
                </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
          
<!--         <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <form id="wp_signin_form" action="" method="post"> 
                            <p><?php echo $invalid_login; ?></p>
                            <h2 class="heading-signIn">Sign In</h2>

                            <label class="my-username" >Username</label>
                            <div>
                               <input type="text" name="username" class="text" value="">
                               <p id="username_error" ></p>
                            </div>

                            <label class="my-password" >Password</label>  
                            <div>
                               <input type="password" name="password" class="text" value="">
                                 <p id="password_error"></p>
                            </div>
                             
                             <div>
                            <label> 
                            <input class="myremember" name="rememberme" type="checkbox" value="forever"><span class="hey">Remember me</span></label> 
                            </div>

                            <div>
                            <input class="btn btn-primary" type="submit" id="submitbtn" name="submit" value="Login">
                            <a href="http://localhost/wordpress/sign-up/"><input class="btn btn-primary" type="submit" id="signupbtn" name="signupbtn"  value="Sign Up"></a>  
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
    jQuery('#register_login').on('click',function(){
    var action = 'register_login';   
    var username = jQuery("#st-username").val();
    var passwrd = jQuery("#st-psw").val();

    var ajaxdata = {     
    action: 'register_login',
     username: username,
     passwrd: passwrd,     
    };
     
    jQuery.post( ajaxurl, ajaxdata, function(res){ // ajaxurl must be defined previously
     
    jQuery(".status").html(res);

        });
    });

});

</script>