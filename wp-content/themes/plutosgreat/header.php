<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plutosgreat
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" type="text/css" href="<?php get_template_directory_uri()?> . /slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php get_template_directory_uri()?> ./slick/slick-theme.css"/>
<!--    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>-->
<!--    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
<!--    <script type="text/javascript" src="--><?php //get_template_directory_uri()?><!-- ./src/js/slick.js"></script>-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header id="masthead" class="site-header" data-aos="zoom-in">
        <?php echo do_shortcode('[metaslider id="48"]'); ?>
        <div class="pre_header">
            <div class="container">
                <div class="global_container">
                    <div class="logotype">
                        <?php the_custom_logo(); ?>
                    </div>
                    <div class="company_name">
                        <div class="company">
                            PLUTOS GREAT
                        </div>
                        <div class="description">
                            изделия из метала
                        </div>
                    </div>
                    <div class="contacts">
                        <div class="phone">
                            +38 (067) 225-31-01
                        </div>
                        <div class="phone">
                            +38 (067) 225-31-01
                        </div>
                        <div class="email">
                            plutosmetal@gmail.com
                        </div>
                    </div>
                </div>

            </div>
            <nav class="main_navigation">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'MainMenu',
                        'menu_id' => 'Главное меню',
                    )); ?>
            </nav>
        </div>

    </header><!-- #masthead -->

    <div id="content" class="site-content">
