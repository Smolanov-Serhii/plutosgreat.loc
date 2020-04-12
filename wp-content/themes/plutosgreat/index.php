<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plutosgreat
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="categories_items" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/our_productipon_bg.jpg);">
                <h3 class="our_products">Наша продукция</h3>
                <ul class="categories_items__container">
                    <?php

                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'include' => '2,3,4,5,6',
//                      'exclude' => '11',
                        'order' => 'ASC'
                    ));
                    foreach ($categories as $args) : ?>
                        <li class="categories_items__container__item" style="background-image:url(<?php echo z_taxonomy_image_url($args->term_id); ?>" data-aos="zoom-in-up">
                            <a href="<?php echo get_category_link($args->term_id); ?>"></a>
                            <div class="desc">
                                <span class="title"><?php echo $args->cat_name; ?></span>
                                <span class="description">
                                    <?php echo category_description($args->term_id); ?>
                                </span>
                            </div>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <section class="metal_items">
                <img src="<?php echo get_template_directory_uri() . '/src/img/devider_vintage.svg' ?>;" data-aos="flip-up">
                <h3 class="metal_items__article">Изделия из метала</h3>
                <div class="metal_items__container">
                    <?php
                    $args = array(
                        'category__in' => 11, //из какой категории вывести (удалите эту строку, если хотите, чтобы показовало последние материалы из всех рубрик сразу)
                        'showposts' => 4, //сколько показать статей
                        'orderby' => "data", //сортировка по дате
                        'caller_get_posts' => 1);
                    $my_query = new wp_query($args);
                    if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                    $my_query->the_post(); ?>
                    <div class="single_news_item" data-aos="fade-up">
                        <a class="item_lnk" href="<?php the_permalink(); ?>"></a>
                        <div class="single_news_item_container">
                            <div class="single_news_item__img" style="background-image: url('<?php
                            the_post_thumbnail_url( 'full' );
                            ?>');">
<!--                            --><?php //the_post_thumbnail(); ?>
                        </div>
                        <div class="single_news__title">
                            <?php the_title(); ?>
                        </div>
                    </div>
<!--                    <div class="single_news_item__content">-->
<!--                        --><?php //the_excerpt(); ?>
<!--                    </div>-->
                </div>
                <?php }
                }
                wp_reset_query(); ?>
                </div>
                <div class="category_description" data-aos="fade-left">
                    <?php echo category_description(11); ?>
                </div>
            </section>
            <section class="recent_items" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/retro1.jpg);">
                <h3 class="recent_items__article">Последние публикации</h3>
                <div class="recent_items__container">
                    <?php
                    $args = array(
                        'showposts' => 5, //сколько показать статей
                        'orderby' => "data", //сортировка по дате
                        'exclude' => '',
                        'caller_get_posts' => 1);
                    $my_query = new wp_query($args);
                    if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                    $my_query->the_post(); ?>
                    <div class="single_news_item">
                        <a class="item_lnk" href="<?php the_permalink(); ?>"></a>
                        <div class="single_news_item_container">
                            <div class="single_news_item__img" style="background-image: url('<?php
                            the_post_thumbnail_url( 'full' );
                            ?>');">
                        </div>
                        <div class="single_news__title">
                            <?php the_title(); ?>
                        </div>
                    </div>
                    <!--                    <div class="single_news_item__content">-->
                    <!--                        --><?php //the_excerpt(); ?>
                    <!--                    </div>-->
                </div>
                <?php }
                }
                wp_reset_query(); ?>
                </div>
            </section>
            <section class="carousel">
                <h3 class="carousel__article">Галерея работ</h3>
                <?php echo do_shortcode('[slick-carousel-slider limit="5"variablewidth="true" centermode="true"]'); ?>

            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();



//<?php
//		if ( have_posts() ) :
//
//			if ( is_home() && ! is_front_page() ) :
//				?>
<!--				<header>-->
<!--					<h1 class="page-title screen-reader-text">--><?php //single_post_title(); ?><!--</h1>-->
<!--				</header>-->
<!--				--><?php
//			endif;
//
//			/* Start the Loop */
//			while ( have_posts() ) :
//				the_post();
//
//				/*
//				 * Include the Post-Type-specific template for the content.
//				 * If you want to override this in a child theme, then include a file
//				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
//				 */
//				get_template_part( 'template-parts/content', get_post_type() );
//
//			endwhile;
//
//			the_posts_navigation();
//
//		else :
//
//			get_template_part( 'template-parts/content', 'none' );
//
//		endif;
//		?>