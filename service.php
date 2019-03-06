<?php
/**
 * Template Name: Service
 * */

get_header(); ?>

<section class="page-title centred" style="background-image: url(/yasnyy/wp-content/themes/yasnyy/images/background/yasnyy-page-title-min.jpg);">
        <div class="container">
            <div class="content-box">
                <div class="title">Услуги</div>
                <ul class="bread-crumb">
                    <li><a href="/yasnyy/">Главная</a></li>
                    <li>Услуги</li>
                </ul>
            </div>
        </div>
</section>

<section class="service-section sec-pad">
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

<?php get_footer() ?>