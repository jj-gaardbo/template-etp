<?php /* Template Name: Contact Page */ get_header(); ?>

<?php

$employees = array();
if( have_rows('employees_overview') ):
    while ( have_rows('employees_overview') ) : the_row();
        $employees[] = get_sub_field('employee_overview');
    endwhile;
else :
    $employees = new WP_Query(array(
        'post_type' => 'employees',
        'posts_per_page' => -1
    ));
    $employees = $employees->posts;
endif;




?>
<section class="section-contact page-content row">

    <div class="push"></div>

        <div class="container">

            <div class="page-content-inner">

                <h1>
                    <?php the_title(); ?>
                    <?php edit_post_link(""); // Always handy to have Edit Post Links available ?>
                </h1>

            <?php
            $content = $post->post_content;
            if(clean_string($content) !== ''){
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                echo $content;
            }?>

            <?php if (!empty($employees)): ?>

                <?php foreach ($employees as $employee): ?>

                    <div class="employee contact-content">

                        <div class="contact-item row">

                            <div class="<?php echo get_full_width_classes(); ?>">
                                <strong class="contact-name">
                                    <?php echo $employee->post_title; ?>
                                </strong>
                            </div>

                            <?php
                            $thumbnailURL = get_the_post_thumbnail_url($employee->ID); ?>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">

                                <?php if($thumbnailURL):?>

                                    <img src="<?php echo $thumbnailURL; ?>" alt="<?php echo $employee->post_title;?>"/>

                                <?php else :?>

                                    <i class="fas fa-user"></i>

                                <?php endif;?>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">

                                <ul>
                                    <?php if( get_field('emp_title', $employee->ID) ): ?>
                                        <li><?php the_field('emp_title', $employee->ID); ?></li>
                                    <?php endif;?>

                                    <?php if( get_field('emp_education', $employee->ID) ): ?>
                                        <li><?php the_field('emp_education', $employee->ID); ?></li>
                                    <?php endif;?>

                                    <?php if( get_field('emp_phone', $employee->ID) ): ?>
                                        <li><a href="tel:<?php echo str_replace(' ', '', get_field('emp_phone', $employee->ID)); ?>"><?php the_field('emp_phone', $employee->ID); ?></a></li>
                                    <?php endif;?>

                                    <?php if( get_field('emp_email', $employee->ID) ): ?>
                                        <li><a href="mailto:<?php echo str_replace(' ', '', get_field('emp_email', $employee->ID)); ?>"><?php _e('Send email', 'etp-consult')?></a></li>
                                    <?php endif;?>

                                </ul>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">

                                <?php if( get_field('emp_description', $employee->ID) ): ?>

                                        <p>
                                            <?php the_field('emp_description', $employee->ID);?>
                                        </p>

                                <?php endif;?>

                                <?php if( $cv = get_field('emp_cv', $employee->ID) ): ?>

                                        <a href="<?php echo $cv['url'];?>" target="_blank">
                                            <?php echo $cv['title'];?>
                                        </a>

                                <?php endif;?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</section>

<?php get_footer(); ?>
