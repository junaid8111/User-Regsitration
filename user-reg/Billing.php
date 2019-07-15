
<!DOCTYPE html>
<html>
<title>Billing</title>
<meta charset="UTF-8">
<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">

                <div class="form-wrapper">                   
                    <form id="login" class="ajax-auth" method="post" name="st-register-form" action="login">
                        
                        <h1>Billing Info</h1>
                        <hr />             
                    <div class="form-label"><label for="bill-name"><?php _e( 'Bill Name', 'debate' ); ?></label></div>
                    <div class="field"><input type="text" name="bname" id="bill-name" /></div>
                     
                    <div class="form-label"><label for="b-amount"><?php _e( 'Amount', 'debate' ); ?></label></div>
                    <div class="field"><input type="text" name="amount" id="b-amount" /></div>

                    <div class="frm-button"><a href="http://localhost/wordpress/sign-in/"><input class="login_back" type="button" value="Go Back" /></a></div>
                    <div class="frm-button"><input class="billing_button" type="button" id="register_billing" value="Add Billing" /></div>
                    </form>
                    
                    <div id="error-message"><p class="status alert-danger"></p></div>
                    <div id="success-message"><p class="alert-success"></p></div>  
        
                </div>
            <!-- <form id="wp_signup_form" method="POST">

                <div>
                <h2 class="heading-signIn">Billing Info</h2>
                </div>
                <label>User Name</label>
                <div>
                    <input type="text" class="form-control" name="userName"
                        id="userName" placeholder="Enter user name">
                        <span id="name_error" class="error"> <?php echo $error['billName'] ?> </span>

                </div>
         
                <label>Amount</label>
                <div>
                    <input type="text" class="form-control" name="amount"
                        id="amount" placeholder="Enter amount">
                        <span id="name_error" class="error"> <?php echo $error['billAmount'] ?>  </span>

                </div>
          
              
                <div class="btns" align="center">
                    <a href="http://localhost/wordpress/dashboard/"><button style="margin-top: 10px" type="submit" name="submit" class="btn sign-up-btn">Add Billing</button></a>
                        
                    <a href="http://localhost/wordpress/sign-in/"><button style="margin-top: 10px" type="button" name="submit" class="btn">Go Back</button></a>

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
    jQuery('#register_billing').on('click',function(){
    var action = 'register_billing';   
    var username = jQuery("#bill-name").val();
    var amount = jQuery("#b-amount").val();

    var ajaxdata = {     
    action: 'register_billing',
     username: username,
     amount: amount,     
    };
     
    jQuery.post( ajaxurl, ajaxdata, function(res){ // ajaxurl must be defined previously
     
    jQuery(".status").html(res);

        });
    });

});

</script>