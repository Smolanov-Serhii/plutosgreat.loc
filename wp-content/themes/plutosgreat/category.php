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
                 style="background-size: auto; background-repeat: repeat; background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/2447104b84281c8c4b6089.jpg);">
                <div class="global_container_catalog_page">
                    <div class="global_container_category_list" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/uzor_menu.svg);">
                        <div class="page-header">
                            <h2 class="page-title">Каталог</h2>
                        </div>
                        <ul class="list">
                            <?php
                            global $post;
                            $category = get_the_category( get_the_ID() );
                            $cat = get_category(get_query_var('cat'),false);
                            $cat_parent = $cat->parent; // ID родительской категории
                            $current_cat = get_query_var('cat'); // ID текущей категории
                            $cat_top = $category[0]->parent;
                            $ancestors = get_ancestors($cat_top, 'category');
                            $ancestors_cat = $ancestors[0];
                            if ($cat_parent == 0) {
                                wp_list_categories('depth=2&hide_empty=0&title_li=&show_count=0&child_of='.$current_cat);
                            }
                            elseif ($ancestors[0]) {
                                wp_list_categories('depth=2&hide_empty=0&title_li=&show_count=0&child_of='.$ancestors_cat);
                            }
                            else {
                                wp_list_categories('depth=2&hide_empty=0&title_li=&show_count=0&child_of='.$cat_parent);
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="right_container_category">
                        <div class="content_of_page">
                            <div class="parrent_block">

                                <?php

                                $term = get_category(get_query_var('cat'));
                                $cat_id = $term->cat_ID;
                                $image_id = get_term_meta($cat_id, 'id-cat-images', true);
                                echo '<div class="image_id">'.wp_get_attachment_image($image_id, 'full').'</div>'.'<div class="desc_content">'.category_description().'</div>';
                                ?>
                            </div>
                            <div class="dotter_list">
                                    <ul class="dotter_list_items">
                                            <?php if (have_posts()) : ?>

                                                <?php
                                                while (have_posts()) :
                                                    ?>
                                                    <li class="dotter_list_item">
                                                    <?php
                                                        the_post();
                                                        get_template_part('template-parts/content', get_post_type());
                                                    ?>
                                                    </li>
                                                <?php
                                                endwhile;
                                                wp_pagenavi();

                                                else :
                                                    get_template_part('template-parts/content', 'none');
                                                endif;
                                                ?>

                                    </ul>
                            </div>
                        </div>
<!--                        <section class="our_pluses">-->
<!--                            <div class="our_pluses_container">-->
<!--                                <img src="--><?php //echo get_template_directory_uri() . '/src/img/devider_vintage.svg' ?><!--;" data-aos="flip-up">-->
<!--                                <h3 class="our_pluses__article">Преимущества</h3>-->
<!--                                <div class="our_pluses__container">-->
<!--                                    <div class="our_pluses__item">-->
<!--                                        <div class="title">-->
<!--                                            6 лет<br>-->
<!--                                            на рынке-->
<!--                                        </div>-->
<!--                                        <div class="desc">-->
<!--                                            Долгое время компания занимает одно из лидирующих мест на рынке предоставления услуг по изготовлению изделий из метала.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="our_pluses__item">-->
<!--                                        <div class="title">-->
<!--                                            Лазерная <br>-->
<!--                                            резка-->
<!--                                        </div>-->
<!--                                        <div class="desc">-->
<!--                                            Такое оборудование значительно сокращает время на производство изделий, а также позволяет снизить его итоговую стоимость.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="our_pluses__item">-->
<!--                                        <div class="title">-->
<!--                                            Дробеструйная <br>-->
<!--                                            обработка-->
<!--                                        </div>-->
<!--                                        <div class="desc">-->
<!--                                            Технология применяется для: чистки и защиты металла, удаления окалин после ковки, зачистки после сварки и другого.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="our_pluses__item">-->
<!--                                        <div class="title">-->
<!--                                            Создание <br>-->
<!--                                            эскизных проектов-->
<!--                                        </div>-->
<!--                                        <div class="desc">-->
<!--                                            Наши художники смогут нарисовать эскиз "с нуля" или по готовому варианту. После утверждения мы сможем предоставить расчеты прочности, комфортности и практичного использования изделий.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="our_pluses__item">-->
<!--                                        <div class="title">-->
<!--                                            Художественное <br>-->
<!--                                            нанесение патины-->
<!--                                        </div>-->
<!--                                        <div class="desc">-->
<!--                                            Такой вид оформления значительно влияет на внешний вид изделия, поэтому практически ко всей нашей продукции применяется художественное нанесение патины.-->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="our_pluses__item">-->
<!--                                        <div class="title">-->
<!--                                            Индидуальный<br>-->
<!--                                            подход-->
<!--                                        </div>-->
<!--                                        <div class="desc">-->
<!--                                            Мы предлагаем уникальные, а не шаблонные изделия исходя из пожеланий клиента и его материальных возможностей.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </section>-->
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
