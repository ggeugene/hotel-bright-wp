<?php
/**
 * Template Name: About
 * */

get_header(); ?>

<section class="page-title centred" style="background-image: url(/yasnyy/wp-content/themes/yasnyy/images/background/yasnyy-page-title-min.jpg);">
        <div class="container">
            <div class="content-box">
                <div class="title"><?php the_title(); ?></div>
                <?php custom_breadcrumbs(); ?>
            </div>
        </div>
</section>

<section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="single-item-carousel">
                        <?php $about_images = get_field('about_images');

                         if( !empty($about_images) ): 
                            foreach( $about_images as $image ): ?>
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

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 column">
                <div class="about-content">
                    <div class="sec-title left">Отель "Ясный"</div>
                </div>
            <?php while ( have_posts() ) : the_post(); 
                                    the_content();
                                endwhile; ?>
            </div>
        </div>
    </div>
</section>

<!-- contact-info -->
<section class="contact-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 column">
                    <div class="single-item">
                        <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text"><?php the_field('contact_address') ?></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 column">
                    <div class="single-item">
                        <div class="icon-box"><i class="fas fa-phone"></i></div>
                        <div class="text"><a href="tel:<?php the_field('contact_phone-1') ?>"><?php the_field('contact_phone-1') ?></a><br/><a href="tel:<?php the_field('contact_phone-2') ?>"><?php the_field('contact_phone-2') ?></a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 column">
                    <div class="single-item">
                        <div class="icon-box"><i class="far fa-envelope"></i></div>
                        <div class="text"><a href="mailto:<?php the_field('contact_mail-1') ?>"><?php the_field('contact_mail-1') ?></a><br /><a href="mailto:<?php the_field('contact_mail-2') ?>"><?php the_field('contact_mail-2') ?></a></div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- contact-info end -->

<?php get_footer(); ?>