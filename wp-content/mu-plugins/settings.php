
<?php

function global_enqueue_files() {
    wp_enqueue_script( 'scripts', plugins_url() . '/js/scripts.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'global_enqueue_files' );



?>