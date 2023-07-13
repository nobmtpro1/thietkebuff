<?php
// Add custom Theme Functions here

define('THEME_URL', get_stylesheet_directory_uri());

function add_styles()
{
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<?php
}
add_action('wp_head', 'add_styles', 999999999);

function add_js()
{
?>
    <script src="<?= THEME_URL . '/assets/js/main.js' ?>"></script>
<?php
}
add_action('wp_footer', 'add_js', 999999999);

function client_comments_slider($args, $content)
{
    ob_start();
    include __DIR__ . '/components/client_comments_slider.php';
    $file_content = ob_get_contents();
    ob_end_clean();
    echo $file_content;
}
add_shortcode('client_comments_slider', 'client_comments_slider');

function home_projects($args, $content)
{
    ob_start();
    include __DIR__ . '/components/home_projects.php';
    $file_content = ob_get_contents();
    ob_end_clean();
    echo $file_content;
}
add_shortcode('home_projects', 'home_projects');

function popup_contact($args, $content)
{
    ob_start();
    include __DIR__ . '/components/popup_contact.php';
    $file_content = ob_get_contents();
    ob_end_clean();
    echo $file_content;
}
add_shortcode('popup_contact', 'popup_contact');
