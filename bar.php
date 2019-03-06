<?php
/**
 * Template Name: Bar
 * */

get_header(); ?>

<section class="page-title centred" style="background-image: url(/yasnyy/wp-content/themes/yasnyy/images/background/yasnyy-page-title-min.jpg);">
        <div class="container">
            <div class="content-box">
                <div class="title"><?php the_title(); ?></div>
                <ul class="bread-crumb">
                    <li><a href="/yasnyy/">Главная</a></li>
                    <li><?php the_title(); ?></li>
                </ul>
            </div>
        </div>
</section>

<section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 column">
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
            </div>
        </div>
</section>

<section class="mb-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 column">
            <?php while ( have_posts() ) : the_post(); 
                       the_content();
                  endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>