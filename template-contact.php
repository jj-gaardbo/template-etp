<?php /* Template Name: Contact Page */ get_header(); ?>

<?php
$employees = new WP_Query(array(
    'post_type' => 'employees',
    'posts_per_page' => -1
));

?>
<section class="section-contact row">

    <div class="push"></div>

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 page-content-inner">

                <h1><?php the_title(); ?></h1>

                <?php if ($employees->have_posts()): ?>

                    <ul>

                        <?php while ($employees->have_posts()) : $employees->the_post(); ?>

                            <li>
                                <div class="employee">

                                    <?php the_title(); ?>

                                </div>
                            </li>

                        <?php endwhile; ?>

                    </ul>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php get_footer(); ?>
