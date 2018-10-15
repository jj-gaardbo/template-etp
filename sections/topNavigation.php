<div class="top-navigation row">

    <div class="<?php echo get_full_width_classes();?>">

        <div class="container">

            <ul class="language-switcher">
                <?php pll_the_languages(array(
                    'show_flags' => 0,
                    'show_names' => 1,
                    'display_names_as' => 'slug'
                ));?>
            </ul>

            <div class="searchform-wrapper">

                <?php get_template_part('searchform'); ?>

            </div>

        </div>

    </div>

</div>