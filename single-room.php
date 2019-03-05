<?php
/**
 * The template for displaying single Room
 * */

get_header(); ?>

<!-- page-title -->
<section class="page-title centred" style="background-image: url(/yasnyy/wp-content/themes/yasnyy/images/background/yasnyy-page-title-min.jpg);">
        <div class="container">
            <div class="content-box">
                <div class="title"><?php the_title(); ?></div>
                <ul class="bread-crumb">
                    <li><a href="/yasnyy/">Главный</a></li>
                    <li><?php the_title(); ?></li>
                </ul>
            </div>
        </div>
</section>
<!-- page-title end -->

<!-- room-details -->
<section class="room-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 column">
                    <div class="room-details-content">
                        <div class="contnt-style-one">
                            <h2><?php the_title(); ?></h2>
                            
                            <div class="single-item-carousel">
                                <?php 

                                    $images = get_field('room_slider-images');

                                    if( !empty($images) ): 
                                        foreach( $images as $image ): ?>
                                            <figure class="img-box">
                                                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                                            </figure>
                                            <?php endforeach; ?>
                                    <?php else: ?>
                                        <figure class="img-box"><img src="images/resource/room-details.jpg" alt=""></figure>
                                    <?php endif; ?>
                                
                            </div>
                            <div class="text">
                                <?php while ( have_posts() ) : the_post(); 
                                    the_content();
                                endwhile; ?>
                            </div>
                        </div>
                        <?php 
                            $amenities = get_field('amenities_field');
                            if($amenities):
                        ?>
                        <div class="content-style-two">
                            <h3>Удобства в номере</h3>
                            <div class="table-outer">
                                <ul>
                                    <?php 
                                        foreach($amenities as $amenitie):
                                            list($text, $icon) = explode(' | ', $amenitie);
                                        ?>
                                            <li>
                                                <div class="icon-box"><i class="fas fa-<?php echo $icon;?>"></i></div>
                                                <div class="table-text"><?php echo $text ?></div>
                                            </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- room-details end -->
<?php get_footer(); ?>