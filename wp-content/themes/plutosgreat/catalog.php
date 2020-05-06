<?php
/**
 * The template for displaying archive pages
 * Template Name: Категория
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plutosgreat
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="curent_category_description"
                 style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/category_bg.png);">
                <div class="global_container">
                    <div class="left_container">
                        <header class="page-header">
                            <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                        </header>
                        <ul class="list">
                            <?php
                            if (have_posts()) {
                                while (have_posts()) {
                                    the_post(); ?>

                                    <li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                    <span class="hover_marker">
                                <svg width="60" height="51" viewBox="0 0 60 51" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M42.9414 10.1639C43.3455 10.617 43.7595 11.0813 44.2537 11.6351C44.9958 9.49827 45.6984 7.47051 46.4546 5.29173C44.2903 5.97977 42.2261 6.63704 40.0703 7.32228C40.511 7.80474 40.894 8.22428 41.2573 8.62004C40.7124 9.41156 40.1252 10.1443 39.6676 10.9485C37.7653 14.2879 38.3384 17.7645 41.3038 20.4006C44.0186 22.8143 47.2614 23.8449 50.89 23.5946C51.7912 23.5331 52.698 23.3457 53.5682 23.0968C54.1132 22.9401 54.651 22.6311 55.0932 22.2703C56.7223 20.9404 56.6998 19.3042 55.0876 18.019C56.3098 17.1562 57.8882 17.3813 58.9542 18.5994C60.037 19.8384 60.32 21.2578 59.6258 22.7486C59.178 23.7107 58.5388 24.5833 57.9713 25.5203C58.474 26.3524 59.1189 27.2432 59.5765 28.2207C60.3904 29.9576 59.8117 31.8497 58.2642 32.9097C57.2532 33.6019 56.1845 33.6201 55.0974 32.953C55.3607 32.7209 55.6466 32.5181 55.8733 32.2622C56.4224 31.6427 56.4773 30.7547 56.0957 29.9771C55.3002 28.3577 53.8414 27.7089 52.1939 27.4725C49.0412 27.018 46.0279 27.5103 43.2653 29.1423C40.9222 30.5253 39.1579 32.3797 38.6664 35.1654C38.3384 37.0253 38.8678 38.7146 39.8253 40.2851C40.2477 40.9787 40.756 41.6206 41.2686 42.345C40.9123 42.731 40.5237 43.1519 40.0689 43.647C42.2007 44.328 44.2706 44.9895 46.456 45.6887C45.7111 43.5267 45.0113 41.4962 44.2453 39.2726C43.782 39.867 43.3864 40.3746 42.9639 40.913C41.3686 39.3649 40.4251 37.7525 40.8588 35.7178C41.3136 33.5823 42.8583 32.3461 44.8662 31.6986C49.1426 30.3198 53.9766 33.4858 54.4933 37.9399C54.8989 41.4766 53.6077 44.4371 51.3195 47.0074C47.581 51.2084 42.9301 51.7957 37.7977 50.1484C34.5844 49.1163 31.802 47.3011 29.2224 45.195C26.5977 43.0512 24.0153 40.8515 21.4836 38.6C17.0509 34.6605 12.1325 31.4567 6.81974 28.829C4.58229 27.7228 2.3378 26.6279 0.00177988 25.4811C1.26202 24.87 2.45326 24.2575 3.67266 23.7093C11.5664 20.1614 18.5561 15.3116 24.8658 9.42974C27.6693 6.81604 30.6488 4.38694 34.024 2.50602C36.774 0.973326 39.6789 -0.0517405 42.8949 0.00279849C46.6292 0.0657299 49.5467 1.69772 51.8236 4.54776C53.5457 6.70137 54.5792 9.14026 54.5891 11.9246C54.606 16.2612 50.9351 19.7922 46.5827 19.5979C44.5649 19.507 42.871 18.6469 41.646 17.0205C40.1013 14.9662 40.6378 11.9973 42.9414 10.1639Z"
                                      fill="#3F1B07"/>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect x="60" y="51" width="60" height="51" transform="rotate(-180 60 51)" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                            </span><a class="permlinccat" href="<?php the_permalink() ?>"
                                      title="Перейти к посту: <?php the_title(); ?>"><?php the_title(); ?></a></li>
                                    </li>

                                <?php } /* конец while */ ?>
                                <?php
                            } // конец if
                            ?>
                        </ul>
                    </div>
                    <div class="right_container">
                        <div class="description">
                            <?php
                            the_archive_description('<div class="archive-description">', '</div>');
                            ?>
                        </div>
                        <div class="description_slider">
                            <div class="sample-posts">
                                <ul class="slick_list">
                                    <?php if (have_posts()) {
                                        while (have_posts()) {
                                            the_post(); ?>

                                            <li style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                                                <a href="<?php the_permalink() ?>"></a></li>
                                        <?php } /* конец while */ ?>


                                        <?php
                                    } // конец if
                                    ?>
                                </ul>
                                <div class="next_button">
                                    <img src="<?php echo get_template_directory_uri() . '/src/img/arrow_cat_slider.svg' ?>">
                                </div>
                                <div class="prev_button">
                                    <img src="<?php echo get_template_directory_uri() . '/src/img/arrow_cat_slider.svg' ?>">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="curent_category_items">
                <img class="devider" src="<?php echo get_template_directory_uri() . '/src/img/devider_vintage.svg' ?>;" data-aos="flip-up">
                <?php the_archive_title('<div class="rubric_title">', '</div>'); ?>
                <?php if (have_posts()) : ?>
                <ul class="curent_category_items__list">
                    <?php
                    while (have_posts()) :
                        ?>
                        <li class="single_item" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/category_bg_articles.png);"><?php
                        ?>
                        <img class="item_cat_dev" src="<?php echo get_template_directory_uri(); ?>/src/img/item_cat_dev.png);">
                        <?php
                        the_post();
                        get_template_part('template-parts/content', get_post_type());
                        ?></li><?php
                    endwhile;
                    the_posts_navigation();
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>
                </ul>
            </div>
            <section class="carousel">
                <h3 class="carousel__article">Галерея работ</h3>
                <?php echo do_shortcode('[slick-carousel-slider limit="5"variablewidth="true" centermode="true"]'); ?>

            </section>
            <section class="category_description_footer" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/category_descriptions_bg.jpg);">
                <div class="global_container">
                    <img src="<?php echo get_template_directory_uri() . '/src/img/devider_vintage.svg' ?>;" data-aos="flip-up">
                    <h3 class="metal_items__article">Описание категории</h3>
                    <div class="main_content_wrapper">
                        <div class="image_box">
                            <img src="<?php echo get_template_directory_uri() . '/src/img/footer_1.jpg' ?>;" data-aos="flip-up">
                            <img src="<?php echo get_template_directory_uri() . '/src/img/footer_2.jpg' ?>;" data-aos="flip-up">
                            <img src="<?php echo get_template_directory_uri() . '/src/img/footer_3.jpg' ?>;" data-aos="flip-up">
                        </div>
                        <div class="description_box">
                            <div class="personal">
                                с уважением персонал компании
                            </div>
                            <div class="personal_descripton">
                                "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account. "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
