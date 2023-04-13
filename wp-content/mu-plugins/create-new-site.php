
<?php


// $data = json_decode(file_get_contents("php://input"));


// if (isset($data->site_name) && isset($data->site_url)) {

//     define('WP_USE_THEMES', false);
//     require('./wp-load.php');


//     $new_site = wpmu_create_blog($data->site_url, '/', $data->site_name, get_current_user_id(), array('public'=>1), 1);


//     if (!is_wp_error($new_site)) {

//         http_response_code(200);
//         echo json_encode(array("message" => "Новий сайт успішно створено з ID " . $new_site));
//     } else {

//         http_response_code(500);
//         echo json_encode(array("message" => "Помилка при створенні нового сайту: " . $new_site->get_error_message()));
//     }
// } else {

//     http_response_code(400);
//     echo json_encode(array("message" => "Недостатньо даних для створення нового сайту"));
// }





// add_action( 'rest_api_init', function () {
//     register_rest_route( 'myapi/v1', '/myposts', array(
//       'methods' => 'GET',
//       'callback' => 'my_custom_endpoint',
//     ) );
//   } );


//   function my_custom_endpoint( $request ) {
//     $args = array(
//       'post_type' => 'post',
//       'posts_per_page' => 10,
//     );
//     $posts = get_posts( $args );
//     $data = array();
//     foreach ( $posts as $post ) {
//       $data[] = array(
//         'id' => $post->ID,
//         'title' => $post->post_title,
//         'content' => $post->post_content,
//       );
//     }
//     return new WP_REST_Response( $data, 200 );
//   }









// add_action( 'wp_ajax_create_new_site', 'create_new_site' );
// add_action( 'wp_ajax_nopriv_create_new_site', 'create_new_site' );

// function create_new_site() {

//     $site_title = $_POST['site_title'];
//     $site_url = $_POST['site_url'];
//     $admin_email = $_POST['admin_email'];
//     $admin_username = $_POST['admin_username'];
//     $admin_password = $_POST['admin_password'];


//     $response = wp_remote_post( 
//         get_site_url(null, '/wp-json/wp/v2/sites'), 
//         array(
//             'method' => 'POST',
//             'headers' => array(
//                 'Content-Type' => 'application/json',
//             ),
//             'body' => json_encode( array(
//                 'title' => $site_title,
//                 'url' => $site_url,
//                 'options' => array(
//                     'admin_email' => $admin_email,
//                 ),
//                 'admin_user' => $admin_username,
//                 'admin_password' => $admin_password,
//             ) ),
//         ) 
//     );


//     if ( is_wp_error( $response ) ) {
//         echo $response->get_error_message();
//     } else {
//         echo $response['body'];
//     }
//     wp_die();
// }




// $url = 'http://whitelabel.local/wp-json/wp/v2/sites';
// $data = array(
//     'title' => 'Назва нового сайту',
//     'slug' => 'новий-сайт',
//     'parent_id' => 1 

// );
// $options = array(
//     'method' => 'POST',
//     'headers' => array(
//         'Content-Type' => 'application/json',
//         'Authorization' => 'Bearer ' . $access_token 
//     ),
//     'body' => json_encode( $data )
// );
// $response = wp_remote_request( $url, $options );
// if ( !is_wp_error( $response ) ) {
//     $body = wp_remote_retrieve_body( $response );
//     $site = json_decode( $body );

// }




// function my_api_custom_route_sites()
// {
//   $args = array(
//     'public'    => 1,
//     'archived'  => 0,
//     'mature'    => 0,
//     'spam'      => 0,
//     'deleted'   => 0,
//   );

//   $sites_query = new WP_Site_Query($args);
//   $sites = $sites_query->get_sites();
//   return $sites;
// }

// add_action('rest_api_init', function () {
//   register_rest_route('wp/v2', 'sites', [
//     'methods' => 'POST',
//     'callback' => 'my_api_custom_route_sites'
//   ]);
// });





// $site_name = $_POST['site_name'];
// $site_url = $_POST['site_url'];
// $admin_username = $_POST['admin_username'];
// $admin_email = $_POST['admin_email'];

// $site_name = 'test_name_1';
// $site_title = 'test_title_1';
// $site_url = 'test_url_1';
// $admin_username = 'admin1';
// $admin_email = '1@1';
// $admin_password = '1111111';


// if ( ! function_exists( 'wpmu_create_blog' ) ) {
//     require_once ABSPATH . 'wp-admin/includes/ms.php';
// }
// if ( ! function_exists( 'wp_create_user' ) ) {
//     require_once ABSPATH . 'wp-includes/user.php';
// }


// $new_site = wp_insert_site(array(
//   'domain' => $site_url,
//   'path' => 'http://whitelabel.local/wordpress',
//   'network_id' => get_current_network_id(),
//   'site_name' => $site_title,
// ));


// $new_user_id = wp_create_user($admin_username, $admin_password, $admin_email);

// add_user_to_blog($new_site, $new_user_id, 'administrator');

// add_action( 'admin_post_my_form', 'process_form_data' );
// add_action( 'admin_post_nopriv_my_form', 'process_form_data' );

// add_action('wpcf7_validate_text*', 'validate_form');


// function validate_form() {

// }

// add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );

// function custom_email_confirmation_validation_filter( $result, $tag ) {
//   if ( 'new-user-email-confirm' == $tag->name ) {
//     $your_email = isset( $_POST['new-user-email'] ) ? trim( $_POST['new-user-email'] ) : '';
//     $your_email_confirm = isset( $_POST['new-user-email-confirm'] ) ? trim( $_POST['new-user-email-confirm'] ) : '';

//     if ( $your_email != $your_email_confirm ) {
//       $result->invalidate( $tag, "Are you sure this is the correct address?" );
//     }
//   }

//   return $result;
// }




// function custom_text_validation( $result, $tag ) {
//   $name = $tag['name'];

//   if ( isset( $_POST[$name] ) ) {
//       $value = trim( wp_unslash( strtr( (string) $_POST[$name], "\n", " " ) ) );

//       if ( strlen( $value ) < 10 ) {
//         wpcf7_add_validation_error( $tag, 'Мінімальна кількість символів - 10' );
//     }

//     if ( strlen( $value ) > 100 ) {
//         wpcf7_add_validation_error( $tag, 'Максимальна кількість символів - 100' );
//     }
//   }

//   return $result;
// }


// function wpcf7_add_validation_error( $tag, $message ) {
//   if ( ! is_object( $tag ) ) {
//       return;
//   }

//   $tag->set_validation_error( $message );
// }








// add_filter('wpcf7_validate_text*', 'custom_username_validation', 20, 2);

// function custom_username_validation($result, $tag)
// {

//   $tag = new WPCF7_FormTag( $tag );

//   if ('new-user-name' === $tag['name']) {

//     $name = $tag->name;
//     $value = isset($_POST[$name]) ? trim($_POST[$name]) : '';
//     $error_messages = array();

//     if (strlen($value) < 4) {
//       $error_messages[] = 'Username must contain at least 4 characters';
//     }

//     if (strlen($value) > 50) {
//       $error_messages[] = 'Username must contain 50 or less characters';
//     }

//     if (!preg_match('/^[a-z]+$/', $value)) {
//       $error_messages[] = 'Username must contain only lowercase letters (a-z)';
//     }

//     global $wpdb;

//     $table_name = $wpdb->prefix . 'users';
//     $username_exists = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $table_name WHERE user_login = %s", $value ) );

//     if ( $username_exists > 0 ) {
//         $error_messages[] = 'This username is already taken. Please choose another username';
//     }

//     if (!empty($error_messages)) {
//         $error_message = implode(' | ', $error_messages);
//         $result->invalidate( $tag, $error_message );
//     }

//   }

//   return $result;
// }



















add_filter('wpcf7_validate_text*', 'custom_username_validation', 20, 2);
add_filter('wpcf7_validate_text*', 'custom_slug_validation', 20, 2);
add_filter('wpcf7_validate_email*', 'custom_email_validation', 20, 2);
add_filter('wpcf7_validate_password*', 'custom_password_validation', 20, 2);

function custom_password_validation($result, $tag)
{
  $tag = new WPCF7_FormTag($tag);

  if ('new-user-password-confirm' === $tag['name']) {
    $confirm_pass = $tag->name;
    $confirm_pass_value = isset($_POST[$confirm_pass]) ? trim($_POST[$confirm_pass]) : '';
    $original_pass_value = isset($_POST['new-user-password']) ? trim($_POST['new-user-password']) : '';

    if ($confirm_pass_value != $original_pass_value) {
      $result->invalidate($tag, "The confirm password is different");
    }
  }

  return $result;
}


function custom_email_validation($result, $tag)
{
  $tag = new WPCF7_FormTag($tag);

  if ('new-user-email' === $tag['name']) {

    $email = $tag->name;
    $value = isset($_POST[$email]) ? trim($_POST[$email]) : '';


    global $wpdb;

    $table_name = $wpdb->prefix . 'users';
    $username_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE user_email = %s", $value));

    if ($username_exists > 0) {
      $result->invalidate($tag, 'This email is already registered. Please choose another email');
      return $result;
    }
  }

  return $result;
}

function custom_slug_validation($result, $tag)
{

  if ('new-site-slug' === $tag['name']) {

    $slug = $tag->name;
    $value = isset($_POST[$slug]) ? trim($_POST[$slug]) : '';


    if (!preg_match('/^[a-z0-9\-]+$/', $value)) {
      $result->invalidate($tag, 'Slug must contain only lowercase letters (a-z), numbers (0-1), and hyphens');
      return $result;
    }

    if (strlen($value) < 4) {
      $result->invalidate($tag, 'Slug must contain at least 4 characters');
      return $result;
    }

    if (strlen($value) > 50) {
      $result->invalidate($tag, 'Slug must contain 50 or less characters');
      return $result;
    }


    $sites = get_sites(array('network_id' => 1));

    foreach ($sites as $site) {
      $site_details = get_blog_details($site->blog_id);
      if ($site_details->path === '/wordpress/' . $value . '/') {
        $result->invalidate($tag, 'This slug is already taken. Please choose another site slug');
        return $result;
      }
    }
  }

  return $result;
}


function custom_username_validation($result, $tag)
{

  $tag = new WPCF7_FormTag($tag);

  if ('new-user-name' === $tag['name']) {

    $name = $tag->name;
    $value = isset($_POST[$name]) ? trim($_POST[$name]) : '';


    if (!preg_match('/^[a-z\s]+$/', $value)) {
      $result->invalidate($tag, 'Username must contain only lowercase letters (a-z)');
      return $result;
    }

    if (strlen($value) < 4) {
      $result->invalidate($tag, 'Username must contain at least 4 characters');
      return $result;
    }

    if (strlen($value) > 50) {
      $result->invalidate($tag, 'Username must contain 50 or less characters');
      return $result;
    }

    global $wpdb;

    $table_name = $wpdb->prefix . 'users';
    $username_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE user_login = %s", $value));

    if ($username_exists > 0) {
      $result->invalidate($tag, 'This username is already taken. Please choose another username');
      return $result;
    }
  }

  return $result;
}




// $new_site_url = '';
// $example = 'start';


add_action('wpcf7_before_send_mail', 'process_form_data');


function process_form_data()
{

  $site_title = $_POST['new-site-title'];
  $site_slug = $_POST['new-site-slug'];
  $username = $_POST['new-user-name'];
  $email = $_POST['new-user-email'];
  $password = $_POST['new-user-password'];
  $theme = $_POST['new-site-theme'];


  $new_site = null;

  if (is_multisite()) {
    $network_domain = get_network()->domain;
    $new_site_path = '/wordpress/' . $site_slug;
    $new_site = wp_insert_site(array(
      'domain'     => $network_domain,
      'path'       => $new_site_path,
      'network_id' => get_current_network_id(),
      'title'      => $site_title,
      'slug'       => $site_slug,
    ));
  }

  $new_user = null;

  if ($new_site) {

    switch_to_blog($new_site);

    $new_user_id = wp_create_user($username, $password, $email);
    $new_user = get_user_by('id', $new_user_id);
    $new_user->set_role('administrator');


    $user_data = array(
      'user_login'    => $username,
      'user_password' => $password,
      'remember'      => true
    );
    $user_signon = wp_signon($user_data, false);

    wp_insert_user($new_user);

    if ($theme == 'Theme 1') {
    switch_theme('estore-child-1');
    } else if ($theme == 'Theme 2') {
      switch_theme('estore-child-2');
    } else if ($theme == 'Theme 3') {
      switch_theme('estore-child-3');
    } else {
      switch_theme('neve');
    }


    restore_current_blog();
  }
}





?>