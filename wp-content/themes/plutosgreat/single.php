<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package plutosgreat
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div id="site-main_single_page" class="site-main_single_page">
            <div class="breadcrumbs">
                <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
            </div>
            <span class="title">

                <?php
                if( is_category() )
                    echo get_queried_object()->name;

                ?>

            </span>
		<?php
		while ( have_posts() ) :?>
            <div class="rubrick_description" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/single_desl_bg.png);">
                <div class="container">
                    <?php if ( get_field('opisanie_rubrikivzapisebriki_v_zapise') ) { ?>
                        <?php the_field('opisanie_rubrikivzapisebriki_v_zapise'); ?>
                    <?php } ?>
                </div>
            </div>
            <div class="main_article_decription">

                <h1 class="main_article_decription__title">
                    <?php the_title(); ?>
                </h1>
                <div class="main_article_decription__image">
                    <?php the_post_thumbnail('large' ); ?>
                </div>
                <div class="main_article_decription__content">
                    <?php the_content(); ?>
                </div>
                <?php

			the_post();

//			get_template_part( 'template-parts/content', get_post_type() );

//			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>
            </div>
                <?php

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
        <div class="similar_posts">
            <?php
            if( $my_related_post_ids = get_post_meta($post->ID, 'my_related_posts', true)) :
            $related_args = array(
            'posts_per_page' => -1, // сколько постов будет указано в админке, столько и выведется
            'post__in'=> explode(',', $my_related_post_ids), // в качестве значения нужно будет передать массив
            'orderby' => 'post__in' // посты будут сортироваться в том же порядке, в котором они перечислены в админке
            );
            $misha_query = new WP_Query( $related_args );

            // если посты, удовлетворяющие нашим условиям, найдены
            if( $misha_query->have_posts() ) :

            // выводим заголовок блока похожих постов
            echo '<h3>Похожие изделия</h3>';

            // запускаем цикл
            while( $misha_query->have_posts() ) : $misha_query->the_post(); ?>
            <li class="similar_posts__item">
                <?php
                echo '<img src="' . get_the_post_thumbnail( $misha_query->post->ID ) . '';
                echo '<a href="' . get_permalink( $misha_query->post->ID ) . '">' . $misha_query->post->post_title . '</a>';

                ?>
            </li>
            <?php
            endwhile;
            endif;

            // не забудьте про эту функцию, её отсутствие может повлиять на другие циклы на странице
            wp_reset_postdata();
            endif;
            ?>
        </div>
            <section class="reviews" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/category_descriptions_bg.jpg);">
                <div class="global_container">
                    <img src="<?php echo get_template_directory_uri() . '/src/img/devider_vintage.svg' ?>;" data-aos="flip-up">
                    <h3 class="our_pluses__article">Отзывы наших клиентов</h3>
                    <div class="reviews__container">
                        <div class="reviews__item">
                            <div class="reviews__pers">
                                <div class="date">
                                    10 мая 2020
                                </div>
                                <div class="name">
                                    Алина Самойлова
                                </div>
                                <div class="subj">
                                    Заказали новый забор для дачного участка. Работу выполнили очень быстро! Нам все понравилось!
                                </div>
                            </div>
                            <div class="image" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/rev1.png);">
                            </div>
                        </div>
                        <div class="reviews__item">
                            <div class="reviews__pers">
                                <div class="date">
                                    15 сентября 2019
                                </div>
                                <div class="name">
                                    Оксана Макаренко
                                </div>
                                <div class="subj">
                                    Обратились в эту компанию не случайно! Друзья очень хорошо отзывались о PLUTOS great. Мастера сделали нам прекрасную беседку, теперь каждое утро пьем кофе на свежем воздухе!
                                </div>
                            </div>
                            <div class="image" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/rev2.png);">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
