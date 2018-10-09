<?php
$testimonial = get_field('fp_quote');
$videoLink = get_field('video_link');
if(trim($testimonial) == '' && $videoLink != ''){return;}

?>
<section class="testimonial-section row">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 testimonial">

                <blockquote class="clearfix">
                    <i class="fas fa-quote-left"></i>
                    <?php echo $testimonial;?>
                </blockquote>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 presentation">

                <i class="fas fa-play-circle modal-trigger" data-modal="video-presentation-modal"></i>

            </div>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal video-lightbox" id="video-presentation-modal">
        <div class="modal-sandbox"></div>
        <div class="modal-box">
            <div class="modal-header">
                <span>ETP Consult - Præsentation</span>
                <i class="fas fa-times close-modal"></i>
            </div>
            <div class="modal-body">

                <?php echo wp_oembed_get( $videoLink );?>

                <?php echo wpautop(get_field('video_description'));?>

                <button class="btn-theme btn-theme-dark-blue close-modal"><?php _e('Close', 'etp-consult')?></button>
            </div>
        </div>
    </div>

</section>