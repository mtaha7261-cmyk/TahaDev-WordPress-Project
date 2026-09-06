<?php function taha_astra_child_enqueue_styles() { wp_enqueue_style( 'taha-astra-child-style', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), '1.0' ); } add_action('wp_enqueue_scripts', 'taha_astra_child_enqueue_styles');
function taha_custom_footer_message() {
echo '<p style="text-align:center;">Taha Dev Project, Custom Footer Message</p>';
}

add_action('wp_footer', 'taha_custom_footer_message');
function taha_custom_top_notice() {
echo '<div style="background:#f0f0f0; padding:10px; text-align:center;">Taha Dev Project, Custom Top Notice</div>';
}

add_action('wp_body_open', 'taha_custom_top_notice');
function taha_admin_notice() {
echo '<div class="notice notice-success is-dismissible"><p>Taha Dev Project, Custom Admin Notice is working.</p></div>';
}

add_action('admin_notices', 'taha_admin_notice');

function taha_custom_init_message() {
if (current_user_can('manage_options')) {
// Custom initialization hook
}
}

add_action('init', 'taha_custom_init_message');
function taha_create_custom_role() {
if (!get_role('taha_content_manager')) {
add_role(
'taha_content_manager',
'Taha Content Manager',
array(
'read' => true,
'edit_posts' => true,
'publish_posts' => true,
'delete_posts' => true,
'upload_files' => true
)
);
}
}

add_action('init', 'taha_create_custom_role');
function taha_modify_title($title) {
if (is_admin()) {
return $title;
}

if (is_singular('post')) {
    return $title . ' | Taha Dev';
}

return $title;

}

add_filter('the_title', 'taha_modify_title');
function taha_modify_excerpt($excerpt) {
if (is_admin()) {
return $excerpt;
}

return $excerpt . ' This content is part of the Taha Dev Project.';

}

add_filter('the_excerpt', 'taha_modify_excerpt');
function taha_modify_content($content) {
if (is_singular('post') && in_the_loop() && is_main_query()) {
$content .= '<p style="text-align:center;">Developed with Taha Astra Child Theme.</p>';
}

return $content;

}

add_filter('the_content', 'taha_modify_content');