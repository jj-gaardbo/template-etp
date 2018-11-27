<?php
$copyright = get_field('copyright','options');
$linkedIn = get_field('social_li','options');
$facebook = get_field('social_fb','options');
$twitter = get_field('social_tw','options');
$instagram = get_field('social_in','options');
if(!$copyright && !$linkedIn && !$facebook && !$twitter && !$instagram){return;}
?>
<div class="social row">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <ul>

                    <?php if($linkedIn !== ''):?>
                    <li class="social-icon social-li">
                        <a href="<?php echo $linkedIn;?>" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php
                    if($facebook !== ''):?>
                    <li class="social-icon social-fb">
                        <a href="<?php echo $facebook;?>" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php
                    if($twitter !== ''):?>
                    <li class="social-icon social-tw">
                        <a href="<?php echo $twitter;?>" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php
                    if($instagram !== ''):?>
                    <li class="social-icon social-in">
                        <a href="<?php echo $instagram;?>" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>

                <?php if($copyright !== ''):?>
                    <p><?php echo $copyright;?></p>
                <?php endif; ?>

            </div>

        </div>

    </div>

</div>