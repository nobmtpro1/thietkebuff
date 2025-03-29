<?php
// Add custom Theme Functions here

define('THEME_URL', get_stylesheet_directory_uri());

function add_favicon()
{
?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= THEME_URL . "/assets" ?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= THEME_URL . "/assets" ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= THEME_URL . "/assets" ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= THEME_URL . "/assets" ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= THEME_URL . "/assets" ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= THEME_URL . "/assets" ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= THEME_URL . "/assets" ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= THEME_URL . "/assets" ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= THEME_URL . "/assets" ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= THEME_URL . "/assets" ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= THEME_URL . "/assets" ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= THEME_URL . "/assets" ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= THEME_URL . "/assets" ?>/favicon-16x16.png">
    <link rel="manifest" href="<?= THEME_URL . "/assets" ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= THEME_URL . "/assets" ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
<?php
}
add_action('wp_head', 'add_favicon', 0);

function add_styles()
{
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<?php
}
add_action('wp_head', 'add_styles', 999999999);

function add_js()
{
?>
    <!-- jQuery 1.8 or later, 33 KB -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->

    <!-- Fotorama from CDNJS, 19 KB -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
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
