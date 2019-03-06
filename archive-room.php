<?php
/**
 * The template for displaying Rooms Archive
 * */

get_header(); ?>

<section class="page-title centred" style="background-image: url(/yasnyy/wp-content/themes/yasnyy/images/background/yasnyy-page-title-min.jpg);">
        <div class="container">
            <div class="content-box">
                <div class="title">Номера</div>
                <?php custom_breadcrumbs(); ?>
            </div>
        </div>
</section>

<section class="room-list overlay-style-one sec-pad-2">
    <div class="container">

        <?php if ( have_posts() ) :
            while(have_posts()) : the_post(); ?>
                    
        <div class="single-room-list inner-box">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 img-column">
                
                    <figure class="image-box" style="background-image:url(<?php the_post_thumbnail_url('full') ?>)">
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="content">
                                    <a href="<?php the_permalink() ?>" class="link"><i class="icon fas fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                    <div class="content-box clearfix">
                        <div class="left-content">
                            <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                            <div class="text"><?php the_field('room_excerpt'); ?></div>
                        </div>
                            <div class="right-content">
                                <div class="price">₴<?php the_field('room_price') ?><span>в сутки</span></div>
                                <div class="link"><a href="<?php the_permalink() ?>" class="theme-btn">Подробнее</a></div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>  
        <?php endif; ?>  
    </div>
</section>
<?php get_footer(); ?>