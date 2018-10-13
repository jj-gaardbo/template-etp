<?php

function get_accordion_DOM_news($link_html, $url, $text, $format, $before, $after){
    ob_start();
    $posts = get_posts(array(
        'post_type' => 'post',
        'date_query' => array(
            array(
                'year' => clean_string($text)
            )
        )
    ));
    ?>


        <li>
            <div class="accordion-head">
                <h5 class="mb-0">
                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapse-<?php echo clean_string($text);?>" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo $text; ?>
                    </button>
                </h5>
            </div>

            <div id="collapse-<?php echo clean_string($text);?>" class="collapse" data-parent="#accordion-archive">
                <div>
                    <ul>
                        <?php foreach($posts as $post):?>
                            <li>
                            <a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title;?></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </li>


    <?php return ob_get_clean();
}