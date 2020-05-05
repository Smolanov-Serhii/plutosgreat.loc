<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plutosgreat
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="curent_category_description" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/category_bg.png);">
                <div class="left_container">
                    <header class="page-header">
                    <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                    </header>
                    <div class="list">
                        <?php
                        $infocat = get_the_category();
                        $info = $infocat[0]->cat_ID;
                        $array = "orderby=rand&amp;showposts=10&amp;cat=$info";
                        query_posts($array);
                        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <li><a class="permlinccat" href="<?php the_permalink() ?>" title="Перейти к посту: <?php the_title(); ?>" ><?php the_title(); ?></a></li>
                        <?php endwhile; else: ?>
                            Постов не найдено
                        <?php endif; wp_reset_query(); ?>
                    </div>
                </div>
                <div class="right">
                    <div class="description">
                        <?php
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </div>
                    <div class="description_slider">
                        <?php if (have_posts()) : ?>
                            <?php
                            while (have_posts()) :
                                ?>
                                <div class="single_item"><?php
                                the_post();
                                get_template_part('template-parts/content', get_post_type());
                                ?></div><?php
                            endwhile;
                            else :
                                get_template_part('template-parts/content', 'none');
                            endif;
                            ?>
                    </div>

                </div>
            </div>
            <div class="curent_category_items">
                <?php if (have_posts()) : ?>
                <ul class="curent_category_items__list">
                    <?php
                    while (have_posts()) :
                        ?>
                        <li class="single_item"><?php
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


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
