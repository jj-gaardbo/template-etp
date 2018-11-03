<?php
$children = count(has_children(get_the_ID())) > 0 ? has_children(get_the_ID()) : has_parent();

if ( $children !== false && is_array($children) && count($children) > 0 ) : ?>

<!-- sidebar -->
<aside class="sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" role="complementary">

    <ul class="sidebar-list">

        <?php foreach ($children as $child) : ?>

            <li>
                <a href="<?php echo get_permalink($child); ?>">
                    <?php echo get_the_title($child);?>
                </a>
            </li>

        <?php endforeach; ?>

    </ul>

</aside>
<!-- /sidebar -->

<?php endif; ?>
