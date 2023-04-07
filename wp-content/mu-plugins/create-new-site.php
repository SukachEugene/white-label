
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

add_action('wpcf7_before_send_mail', 'process_form_data');


function process_form_data()
{

  $site_title = $_POST['new-site-title'];
  $site_slug = $_POST['new-site-slug'];
  $username = $_POST['new-user-name'];
  $email = $_POST['new-user-email'];
  $password = $_POST['new-user-password'];


  $admin_id = wp_create_user($username, $password, $email);
  $user = new WP_User($admin_id);
  $user->set_role('');


  if (is_multisite()) {
    $network_domain = get_network()->domain;
    $new_site_path = '/wordpress/' . $site_slug;
    $new_site = wp_insert_site(array(
      'domain'     => $network_domain,
      'path'       => $new_site_path,
      'network_id' => get_current_network_id(),
      'title'      => $site_title,
      'slug'       => $site_slug,
      'user_id'    => $admin_id,
    ));
  }
}





?>