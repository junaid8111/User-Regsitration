<!-- profile custom post_type -->

<?php
function create_post_user_profile() {
    register_post_type('user_package', array(
        'labels' => array(
            'name' => __('Package'),
            'add_new' => 'Add New Package',
        ),
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-universal-access',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ),
        'taxonomies' => array(
            'post_tag',
            'category',
        )
            )
    );
    register_taxonomy_for_object_type('category', 'user_package');
    register_taxonomy_for_object_type('post_tag', 'user_package');
}

add_action('init', 'create_post_user_profile');

function add_your_fields_meta_box() {
    add_meta_box(
            'your_fields_meta_box', // $id
            'Your Fields', // $title
            'show_your_fields_meta_box', // $callback
            'user_package', // $screen
            'normal', // $context
            'high' // $priority
    );
}

add_action('add_meta_boxes', 'add_your_fields_meta_box');

function show_your_fields_meta_box() {
    global $post;
    $meta = json_decode(get_post_meta($post->ID, 'your_fields', true), true);
    ?>
    <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>">
    <label class="heading"><h3>Package Detail</h3></label>
    <div class="profile-detail">
       
            <label for="your_fields[price]">Price</label>
            <div class="price-field">
                <input class="form-control" type="text" name="your_fields[price]" id="your_fields[price]" value=" <?php echo $meta['price'] ?> ">
            </div>
            <label for="your_fields[features]">Features</label>
            <div class="feature-field">
                <input class="form-control" type="text" name="your_fields[features]" id="your_fields[features]" value=" <?php echo $meta['features'] ?> ">
            </div> 
            <label for="your_fields[duration]">Duration</label>
            <div class="duration-field">
               <label for="your_fields[from-date]">From</label>
               <input type="date" class="form-control" name="your_fields[from-date]" id="your_fields[from-date]" value=" <?php echo $meta['from-date'] ?> "> 
               <label for="your_fields[to-date]">To</label>
               <input type="date" class="form-control" name="your_fields[to-date]" id="your_fields[to-date]" value=" <?php echo $meta['to-date'] ?> ">
            </div>              
    </div>

<?php
}
?>

<?php
function save_your_fields_meta($post_id) {
// verify nonce
    if (isset($_POST['your_meta_box_nonce']) && !wp_verify_nonce($_POST['your_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
// check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
// check permissions
    if (isset($_POST['post_type'])) { //Fix 2
        if ('page' === $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }
    }

    $old = get_post_meta($post_id, 'your_fields', true);
    if (isset($_POST['your_fields'])) { //Fix 3
        $new = json_encode($_POST['your_fields'], JSON_UNESCAPED_UNICODE);
        if ($new && $new !== $old) {
            update_post_meta($post_id, 'your_fields', $new);
        } elseif ('' === $new && $old) {
            delete_post_meta($post_id, 'your_fields', $old);
        }
    }

    //inserting post data in meta fields function

                                // $package_name = get_the_title();
                                // $package_content = get_the_content();
                                // $package_price =  $meta['price'];
                                // $package_feature = $meta['features'];
                                // $from_date = $meta['from_date'];
                                // $to_date = $meta['to_date'];

                                // $_SESSION['package-content'] = $package_content; 
                                // $_SESSION['package-price'] = $package_price;
                                // $_SESSION['packages-features'] = $package_feature;
                                // $_SESSION['packages-fromDate'] = $from_date;
                                // $_SESSION['packages-toDate'] = $to_date;

                                // insertion into package table
                                // global $wpdb;
                                // $package_success = $wpdb->insert("wp_package", array(
                                //  "package_name" => $package_name,
                                //  "package_desc" => $package_content,
                                //  "package_price" => $package_price,
                                //  "package_feature" => $package_feature ,
                                //  // "package_fromDate" => $from_date ,
                                //  // "package_toDate" => $to_date ,
                                //   ));
                                // if($package_success) {
                                //  echo ' Inserted successfully';
                                //       } 
                                //   else {
                                //    echo 'not';
                                //    }                                
}

add_action('save_post', 'save_your_fields_meta');

// Add Shortcode for profile custom posttype
function user_profile_shortcode($atts) {
  if ($atts) {
        extract(shortcode_atts(array('user' => null), $atts));
        $event_ids = explode(",", strval($user));
    }
    ob_start();
    include(plugin_dir_path(__FILE__) . "inc/user_loop.php");
    $content = ob_get_clean();
    return $content;
}
?>

<?php
add_shortcode( 'profile-code', 'user_profile_shortcode' );
?>