<?php
/**
 * The template for displaying pages
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

<section class="sec-pad">
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