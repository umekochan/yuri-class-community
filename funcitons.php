<?php
//Titleタグの有効化
function setup_my_theme() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'setup_my_theme');
function add_files() {
    wp_enqueue_style("reset", get_theme_file_uri("/assets/css/lib/reset.css"),[],0,1);
}
add_aciton("wp_enqueue_scripts","add_files");
?>