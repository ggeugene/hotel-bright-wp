<?php
/**
 * Template Name: Homepage
**/

get_header(); ?>

<section class="main-slider slider-style-one">
        <div class="container-fluid">
            <ul class="main-slider-carousel owl-carousel owl-theme slide-nav">
            <?php 
                $images = get_field('slider_images');

                if( !empty($images) ): 
                    foreach( $images as $image ): ?>
                        <li class="slider-wrapper">
                        <div class="image"><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"></div>
                        <div class="slide-overlay"></div>
                        </li>
                        <?php endforeach; ?>
                <?php else: ?>
                    <li class="slider-wrapper">
                        <div class="image"><img src="/yasnyy/wp-content/themes/yasnyy/images/main-slider/5.jpg" alt=""></div>
                        <div class="slide-overlay"></div>
                    </li>
                <?php endif; ?>
                </ul>
            <div class="slider-caption centred">
                <div class="container">
                    <img src="/yasnyy/wp-content/themes/yasnyy/images/yasnyy-sun.svg" alt="">
                    <div class="text"><?php echo get_field('slider-small_text'); ?></div>
                    <div class="tp-title"><?php echo get_field('slider-large_text'); ?></div>
                    <div class="text text-large"><?php echo get_field('slider-medium_text'); ?></div>
                </div>                             
            </div>
        </div>
</section>

<section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-content">
                        <div class="sec-title left">Отель "Ясный"</div>
                        <div class="text"><?php echo get_field('short_desc'); ?></div>
                        <div class="link"><a href="/yasnyy/o-nas" class="theme-btn-two">О Нас</a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 clearfix">
                    <div class="img-box">
                        <figure class="img-three wow zoomIn animated"><img src="<?php echo get_field('about_image-1'); ?>" alt=""></figure>
                        <figure class="img-two wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms"><img src="<?php echo get_field('about_image-3'); ?>" alt=""></figure>
                        <figure class="img-one wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms"><img src="<?php echo get_field('about_image-2'); ?>" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="room-section overlay-style-one gray-bg sec-pad">
        <div class="container">
            <div class="top-title">
                <div class="sec-title">Наши комнаты</div>
                <div class="title-text">Lorem Ipsum - это текст-"рыба"</div>
            </div>
            <div class="three-column-carousel">
                <?php echo get_rooms_slider(); ?>
            </div>

        </div>
</section>

<section class="fact-counter sec-pad centred">
    <div class="container">
            <div class="top-title">
                <div class="sec-title">Наши преимущества</div>
                <div class="title-text">Lorem Ipsum - это текст-"рыба"</div>
            </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 column">
                <div class="single-item">
                    <div class="content-box">
                        <div class="icon-box"><i class="flaticon-bed"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="5">0</span></div>
                        </article>
                        <div class="text">Комнат</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 column">
                <div class="single-item">
                    <div class="content-box">
                        <div class="icon-box"><i class="flaticon-bell-boy"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="10">0</span></div>
                        </article>
                        <div class="text">Сотрудников</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 column">
                <div class="single-item">
                    <div class="content-box">
                        <div class="icon-box"><i class="flaticon-swimming-pool"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span>0</span><span class="count-text" data-speed="1500" data-stop="3">0</span></div>
                        </article>
                        <div class="text">Басейн</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 column">
                <div class="single-item">
                    <div class="content-box">
                        <div class="icon-box"><i class="flaticon-medal"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="3">0</span></div>
                        </article>
                        <div class="text">Награды</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-section">
        <div class="container">
            <div class="top-title">
                <div class="sec-title">Наши услуги</div>
                <div class="title-text">Lorem Ipsum - это текст-"рыба"</div>
            </div>
            <div class="custom-tab-title">
                <ul class="tab-title clearfix">
                    <li data-tab-name="restaurant" class="active">
                        <div class="single-btn">
                            <div class="icon-box"><i class="fas fa-utensils"></i></div>
                            <div class="text">Ресторан</div>
                        </div>
                    </li>
                    <li data-tab-name="bar">
                        <div class="single-btn">
                            <div class="icon-box"><i class="fas fa-glass-cheers"></i></div>
                            <div class="text">Бар</div>
                        </div>
                    </li>
                    <li data-tab-name="carwash">
                        <div class="single-btn">
                            <div class="icon-box"><i class="fas fa-car"></i></div>
                            <div class="text">Мойка</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-details-content">
                <div class="tab-content" id="restaurant">
                    <div class="single-tab-content">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="single-item-carousel">
                                        <?php $restaurant_images = get_field('restaurant_images');

                                        if( !empty($restaurant_images) ): 
                                            foreach( $restaurant_images as $image ): ?>
                                            <figure class="img-box"><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"></figure>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <figure class="img-box"><img src="/yasnyy/wp-content/themes/yasnyy/images/resource/service-2.jpg" alt=""></figure>
                                        <?php endif; ?>
                                    </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="content">
                                    <div class="title">Ресторан</div>
                                    <div class="text">
                                        <?php the_field('restaurant_text'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="bar">
                    <div class="single-tab-content">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="single-item-carousel">
                                        <?php $bar_images = get_field('bar_images');

                                        if( !empty($bar_images) ): 
                                            foreach( $bar_images as $image ): ?>
                                            <figure class="img-box"><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"></figure>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <figure class="img-box"><img src="/yasnyy/wp-content/themes/yasnyy/images/resource/service-2.jpg" alt=""></figure>
                                        <?php endif; ?>
                                    </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="content">
                                    <div class="title">Бар</div>
                                    <div class="text">
                                        <?php the_field('bar_text'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="carwash">
                    <div class="single-tab-content">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="single-item-carousel">
                                        <?php $carwash_images = get_field('carwash_images');

                                        if( !empty($carwash_images) ): 
                                            foreach( $carwash_images as $image ): ?>
                                            <figure class="img-box"><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"></figure>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <figure class="img-box"><img src="/yasnyy/wp-content/themes/yasnyy/images/resource/service-2.jpg" alt=""></figure>
                                        <?php endif; ?>
                                    </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="content">
                                    <div class="title">Мойка</div>
                                    <div class="text">
                                        <?php the_field('carwash_text'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="testimonial-section sec-pad centred">
        <div class="container">
            <div class="top-title">
                <div class="sec-title">Отзывы из гостевой</div>
                <div class="title-text">Lorem Ipsum - это текст-"рыба"</div>
            </div>
            <div class="three-column-carousel">
                <div class="testimonial-content">
                    <div class="author">John Doe</div>
                    <div class="text">
                        <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="author">John Doe</div>
                    <div class="text">
                        <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="author">John Doe</div>
                    <div class="text">
                        <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</p>
                    </div>
                </div>
            </div>
        </div>
</section>



<?php get_footer(); ?>