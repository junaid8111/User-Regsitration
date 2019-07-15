<?php
// loop for profile_custom_post

// function wpb_adding_styles() {
//     wp_register_style('my_stylesheet', plugins_url('myCss.css', _FILE_));
//     wp_enqueue_style('my_stylesheet');
// }
// add_action ('wp_enqueue_scripts', 'wpb_adding_styles');

// function wpb_adding_scripts() {
//     wp_register_script('my_amazing_script', plugins_url('jquery.js', _FILE_), array('jquery'), '1.1', true);
//     wp_enqueue_script('my_amazing_script');
// }
// add_action ('wp_enqueue_scripts', 'wpb_adding_scripts');
wp_register_style( 'Font_Awesome', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js' );
wp_enqueue_style('Font_Awesome');

if (empty($member_ids)) {
    $args = array('post_type' => 'user_package', 'posts_per_page' => -1);
} else {
    $args = array('post_type' => 'user_package', 'post__in' => $member_ids);
}


$loop = new WP_Query($args);
if ($loop->have_posts()):
    while ($loop->have_posts()):
        $loop->the_post();
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <style type="text/css">

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
input {
   border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
button:hover, a:hover {
  opacity: 0.7;
}

</style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">

                            <div class="card">
                            <?php
                            $meta = json_decode(get_post_meta(get_the_ID(), 'your_fields', true), true);
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            ?>

                            <h1>
                                <div class="name">
                                <?php
                                echo get_the_title();
                                ?>
                                </div>
                            </h1>

                            <p>
                                <div class="description">
                                <?php
                                echo get_the_content();
                                // $content = apply_filters('the_content', get_the_content());
                                // echo $content;
                                ?>
                                </div>
                            </p>
                              <p>
                                <div class="price">
                                <?php
                                echo $meta['price'];
                                ?>
                            </div>
                            </p>

                            <p>
                                <div class="features">
                                <?php
                                echo $meta['features'];
                                ?>
                                </div>
                            </p>

                              <p>
                                <div class="duration">
                                <?php
                                  $from_date = get_post_meta(get_the_ID(), 'from-date', true);                 
                                  $from_date = date("Y -M -d", strtotime($from_date));
                                  echo "<span> <b> From </b>  </span>". $from_date ;
                                  $to_date = get_post_meta(get_the_ID(), 'to-date', true);                 
                                  $to_date = date("Y -M -d", strtotime($to_date));
                                  echo "<span> <b> To </b>  </span>". $to_date;
                                ?>
                                </div>
                            </p>
                            
<?php
//inserting post data on post display page

                                if ($_POST) {
                                if(isset($_POST['submit'])){
                                $package_name = get_the_title();
                                $package_content = get_the_content();
                                $package_price =  $meta['price'];
                                $package_feature = $meta['features'];

                                // $from_date = $meta['from_date'];
                                // $to_date = $meta['to_date'];

                                // $_SESSION['package-content'] = $package_content; 
                                // $_SESSION['package-price'] = $package_price;
                                // $_SESSION['packages-features'] = $package_feature;
                                // $_SESSION['packages-fromDate'] = $from_date;
                                // $_SESSION['packages-toDate'] = $to_date;

                              //  insertion into package table
                                global $wpdb;
                                $package_success = $wpdb->insert("wp_package", array(
                                 "package_name" => $package_name,
                                 "package_desc" => $package_content,
                                 "package_price" => $package_price,
                                 "package_feature" => $package_feature ,
                                 "package_fromDate" => $from_date ,
                                 "package_toDate" => $to_date ,
                                  ));
                                if($package_success) {
                                 echo ' Inserted successfully';
                                 wp_redirect("http://localhost/wordpress/sign-up/");
                                 exit();
                                      } else {
                                   echo 'not';
                                   }
                                }
                            }

?>

                              <form  action="" method="post">
                              <input class="btn btn-primary buy-btn" type="submit" id="submitbtn" name="submit" value="Buy">
                              </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">

         $(document).ready(function(){
          $(".buy-btn").click(function(){
          $(this).hide();
          alert('YEss')''
  });
});

        </script>
        <?php
    endwhile;
else:
    echo '<pre>';
    var_dump($loop);
    echo '</pre>';
endif;
?>