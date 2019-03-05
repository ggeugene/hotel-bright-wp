<?php
/**
 * Template Name: Contact
 * */

get_header(); ?>

<section class="page-title sec-pad centred" style="background-image: url(/yasnyy/wp-content/themes/yasnyy/images/background/yasnyy-page-title-min.jpg);">
        <div class="container">
            <div class="content-box">
                <div class="title"><?php the_title() ?></div>
                <ul class="bread-crumb">
                    <li><a href="/yasnyy/">Главная</a></li>
                    <li><?php the_title() ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- contact-info -->
    <section class="contact-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 column">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-placeholder"></i></div>
                        <div class="text"><?php the_field('contact_address') ?></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 column">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-mobile"></i></div>
                        <div class="text"><a href="tel:<?php the_field('contact_phone-1') ?>"><?php the_field('contact_phone-1') ?></a><br/><a href="tel:<?php the_field('contact_phone-2') ?>"><?php the_field('contact_phone-2') ?></a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 column">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-mail"></i></div>
                        <div class="text"><a href="mailto:<?php the_field('contact_mail-1') ?>"><?php the_field('contact_mail-1') ?></a><br /><a href="mailto:<?php the_field('contact_mail-2') ?>"><?php the_field('contact_mail-2') ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info end -->


    <!-- contact-section -->
    <section class="contact-section gray-bg sec-pad">
        <div class="container">
            <div class="title centred"><h2>Свяжитесь с нами</h2></div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2 column">
                    <div class="default-form">
                        <?php echo do_shortcode('[contact-form-7 id="70" title="Форма обратной связи"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->


    <!-- google-map -->
    <section class="google-map-section">
        <div class="google-map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2649.0762789940354!2d35.066084502258434!3d48.39747826539277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbfb7e89b16861%3A0xc278e14cdc9c5b82!2z0JzQvtGC0LXQu9GMINCv0YHQvdGL0Lk!5e0!3m2!1sru!2sua!4v1551687340502" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </section>
    <!-- google-map end -->
<?php get_footer(); ?>