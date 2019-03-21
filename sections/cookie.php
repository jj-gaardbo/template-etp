<div class="cookie-box row" id="cookie">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 cookie-box-content">

                <?php echo get_field('cookie_'.pll_current_language( 'slug' ),'options');?>

                <br/>

                <a href="<?php echo get_field('cookie_page_'.pll_current_language( 'slug' ),'options');?>"><?php _e('Read More','etp-consult');?></a>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 cookie-box-button">

                <button id="allow_link" class="btn-theme btn-theme-dark-blue">
                    <?php echo get_field('cookie_btn_'.pll_current_language( 'slug' ),'options');?>
                </button>

            </div>

        </div>

    </div>

</div>