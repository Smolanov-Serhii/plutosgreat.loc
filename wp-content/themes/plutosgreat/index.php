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

if (is_home()) {
    get_header();
} elseif (is_404()) {
    get_header('404');
} else {
    get_header();
}


?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="categories_items" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/our_productipon_bg.jpg);">
                <h3 class="our_products">Наша продукция</h3>
                <div class="vintage_element_left" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/category_itm_vintage.png);">
                </div>
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
                <div class="vintage_element_right" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/category_itm_vintage.png);">
                </div>
            </div>
            <section class="metal_items">
                <div class="global_container">
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
                </div>

            </section>
            <section class="category_descriptions" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/category_descriptions_bg.jpg);">
                <div class="container global_container">
                    <div class="image_container">
                        <div class="image" style="background-image:url(<?php echo get_template_directory_uri(); ?>/src/img/category_descriptions.png);">
                        </div>


                        <div class="category_desc">
                            <p>Компания предлагает такие услуги как разработка и изготовление
                                индивидуальных изделий из метала по Вашим или своим эскизам.
                                Такие виды изделий как цветы, винтажные ограды и решотки,
                                сложные формы и эллементы к ним.</p>
                            <p>
                                На сайте компании предостален перечень продукции, где Вы обязательно найдёте то что Вам понравится.
                                Перейдите в соответствующую категорию для просмотра. Если у Вас возникли трудности в поиске то можете обратится к специалистам компании и они Вам обязательно помогут.
                            </p>
                            </div>
                    </div>
                    <div class="categoty_list_container">
                        <h3 class="title">Наши предложения</h3>
                        <ul>
                        <?php

                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'include' => '2,3,4,5,6',
//                      'exclude' => '11',
                        'order' => 'ASC'
                    ));
                    foreach ($categories as $args) : ?>

                        <li class="categories_items__container__item">
                            <a class="cat_name" href="<?php echo get_category_link($args->term_id); ?>">
                            <div class="desc">
                                <span class="title"><?php echo $args->cat_name; ?></span>
                                <span class="description">
                                    <?php echo category_description($args->term_id); ?>
                                </span>
                            </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="our_pluses">
                <div class="global_container">
                    <img src="<?php echo get_template_directory_uri() . '/src/img/devider_vintage.svg' ?>;" data-aos="flip-up">
                    <h3 class="our_pluses__article">Преимущества</h3>
                    <div class="our_pluses__container">
                        <div class="our_pluses__item">
                            <div class="title">
                                6 лет<br>
                                на рынке
                            </div>
                            <div class="desc">
                                Долгое время компания занимает одно из лидирующих мест на рынке предоставления услуг по изготовлению изделий из метала.
                            </div>
                        </div>
                        <div class="our_pluses__item">
                            <div class="title">
                                Лазерная <br>
                                резка
                            </div>
                            <div class="desc">
                                Такое оборудование значительно сокращает время на производство изделий, а также позволяет снизить его итоговую стоимость.
                            </div>
                        </div>
                        <div class="our_pluses__item">
                            <div class="title">
                                Дробеструйная <br>
                                обработка
                            </div>
                            <div class="desc">
                                Технология применяется для: чистки и защиты металла, удаления окалин после ковки, зачистки после сварки и другого.
                            </div>
                        </div>
                        <div class="our_pluses__item">
                            <div class="title">
                                Создание <br>
                                эскизных проектов
                            </div>
                            <div class="desc">
                                Наши художники смогут нарисовать эскиз "с нуля" или по готовому варианту. После утверждения мы сможем предоставить расчеты прочности, комфортности и практичного использования изделий.
                            </div>
                        </div>
                        <div class="our_pluses__item">
                            <div class="title">
                                Художественное <br>
                                нанесение патины
                            </div>
                            <div class="desc">
                                Такой вид оформления значительно влияет на внешний вид изделия, поэтому практически ко всей нашей продукции применяется художественное нанесение патины.

                            </div>
                        </div>
                        <div class="our_pluses__item">
                            <div class="title">
                                Индидуальный<br>
                                подход
                            </div>
                            <div class="desc">
                                Мы предлагаем уникальные, а не шаблонные изделия исходя из пожеланий клиента и его материальных возможностей.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
