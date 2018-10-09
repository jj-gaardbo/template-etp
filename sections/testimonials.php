<?php
$testimonial = get_field('fp_quote');
if(trim($testimonial) == ''){return;}
?>
<section class="testimonial-section row">

    <div class="container">

        <div class="row">

            <div class="<?php echo get_full_width_classes();?> testimonial">

                <blockquote>
                    <i class="fas fa-quote-left"></i>
                    <?php echo $testimonial;?>
                </blockquote>

            </div>

        </div>

    </div>

</section>