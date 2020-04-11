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
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header id="masthead" class="site-header">
        <?php echo do_shortcode('[metaslider id="48"]'); ?>
        <div class="pre_header">
            <div class="container">
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
            <nav class="main_navigation">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'MainMenu',
                        'menu_id' => 'Главное меню',
                    )); ?>
            </nav>
        </div>

    </header><!-- #masthead -->

    <div id="content" class="site-content">
