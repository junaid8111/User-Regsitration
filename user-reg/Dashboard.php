<?php 

if (session_status() == PHP_SESSION_ACTIVE) {

// user info  
      global $wpdb;

      $user_session= $_SESSION['user-session'];
      $pass_session= $_SESSION['pass-session'];

// billing detail
      $billing_userName = $_SESSION['bill-name-session'];
      $billing_amount = $_SESSION['amount-session'];

     $result = $wpdb->get_results("SELECT user_email, user_pass,user_login,ID FROM wp_users WHERE user_login = '$user_session' ");
        foreach($result as $row) {
     } 
   }

 else {
  echo "Session is not active ";
 }
?>

<!DOCTYPE html>
<html>
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif};

/*navbar*/
.card {
  font-family: arial;
}

.main-container{
  margin-top: -50px;
}

.profile-icon {
  font-size: 155px;
  width: 100%;
}

.profile-card{
  text-align: center;
}

.account-img{
  width: 100%;
}

.bill-img {
  width: 100%;
}

.title {
  color: grey;
  font-size: 18px;
}

.profile-btn {
  border: none;
  outline: 0;
  padding: 8px;
  color: white;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  background-color: #e25c4c;
}

.profile-btn:hover, a:hover {
  opacity: 0.7;
}

#contact{
  display: none;
}

.billing-btn,.package-btn {
   background-color: #e25c4c !important;
   color: white !important;
}

</style>

<body class="w3-theme-l5">

<!-- Navbar -->
<!-- <div class="">
 <div class=" w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right  w3-large" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <img src="" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
  </a>
 </div>
</div>
 -->
<!-- Navbar on small screens -->
<!-- <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">ACCOUNTS</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">PAYMENTS</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">ABOUT</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">CONTACT</a>
</div> -->

<!-- Page Container -->
<div class="w3-container w3-content main-container" style="max-width:1400px;">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Sidebar/menu -->
    <nav class="w3-animate-left" id="mySidebar"><br>

      <div class="w3-bar-block">
        <a href="#mid-right-inner" onclick="myDashboard();" class="w3-bar-item w3-button w3-padding w3-text-teal"><h4><i class="fa fa-info fa-fw w3-margin-right"></i>MY DASHBOARD</h4></a> 
        <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>ACCOUNTS</a> 
        <a href="#payment" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dollar fa-fw w3-margin-right"></i>PAYMENTS</a>
        <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
        <a href="#contact" onclick="myContact()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>

      </div>
    </nav>    
      <br>
      
    <!-- End Left Column -->
    </div>

    <div class="mid-right-col w3-col m9">

    <div class="mid-right-inner" id="mid-right-inner"> 
    <!-- Middle Column -->
    <div class="w3-col m6">
    
      <div class="w3-row-padding">
        
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding profile-card">
                 <!-- Profile -->
                 <div class="card ">
                  <i class="fa fa-user profile-icon fa-fw w3-margin-right"></i>
                  <!-- <img src="profile.JPG" alt="Profile Picture" style="width:100%"> -->
                  <h1> <?php echo $row->user_login;  ?> </h1>
                  <p class="title"><span>ID: </span><?php echo $row->ID ?></p>
                  <p><span>Email: </span> <?php echo $row->user_email ?></p>
<?php
$_SESSION['user_id'] = $row->ID;
$_SESSION['edit-username'] = $row->user_login;
$_SESSION['edit-email'] = $row->user_email;
$_SESSION['edit-pass'] = $row->user_pass;
?>
                  <a href="http://localhost/wordpress/user-updation/"><button class="profile-btn">Edit Profile</button></a>
                </div>

            </div>
          </div>
        
      </div>
      <br>
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m6">
    <div class="w3-row-padding">

      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Package:</p>
          <img src="#" class="acount-img" alt="Forest">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4 package-btn">Package Info</button></p>
        </div>
      </div>
      <br>
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>My bills:</p>
          <p><strong><?php echo $billing_userName; ?></strong></p>
          <p><?php echo $billing_amount; ?></p>
          <p><button class="w3-button w3-block w3-theme-l4 billing-btn">Billing Detail</button></p>
        </div>
      </div>

      </div>
      <br>
    <!-- End Right Column -->
    </div>
    </div>

    <!-- About Section -->
     <div class="w3-col m12">
     <div class="w3-row-padding">

      <div class="w3-card w3-round w3-white" id="contact">
         <h4><b>Contact Me</b></h4>
        <div class="w3-container w3-center">
          <p>My bills:</p>
          <img src="#" alt="Forest" class="bill-img">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      </div>
    <!-- End About Column -->
      </div>

    <!-- End of mid-right-col -->
    </div>

    <!-- End of w3-row -->
      </div>

<!-- End Page Container -->
</div>
<br>
<script>

// Used to toggle the menu on smaller screens when clicking on the menu button

function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
// function w3_close() {
//     document.getElementById("mySidebar").style.display = "none";
//     document.getElementById("myOverlay").style.display = "none";
// }

function myDashboard() {
  var right_mid_col = document.getElementById("mid-right-inner");
  var contact = document.getElementById("contact");
    right_mid_col.style.display = "block";
    contact.style.display= "none";
  
}

function myContact() {
  var right_mid_col = document.getElementById("mid-right-inner");
  var contact = document.getElementById("contact");
    contact.style.display = "block";
    right_mid_col.style.display= "none";
}

</script>

</body>
</html> 