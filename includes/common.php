<?php
function get_full_width_classes(){
    return "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12";
}


function get_cases_cols($count){
    if($count == 0){
        return;
    }

    switch($count){
        case 1:
            return "cases-col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12";
            break;
        case 2:
            return "cases-col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6";
            break;
        case 3:
            return "cases-col col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4";
            break;
        case 4:
            return "cases-col col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3";
            break;
    }
}

function truncate_text($text, $length){
    if (strlen($text) > $length)
    {
        $lastPos = ($length - 3) - strlen($text);
        return substr($text, 0, strrpos($text, ' ', $lastPos)) . '...';
    }
    return $text;
}

function get_current_page_post_type($pageID, $child = false){
    $pagePost = get_field('pt_post_'.pll_current_language( 'slug' ),'options');
    $pageCase = get_field('pt_cases_'.pll_current_language( 'slug' ),'options');
    $pageReferences = get_field('pt_references_'.pll_current_language( 'slug' ),'options');
    $pageExpertises = get_field('pt_expertises_'.pll_current_language( 'slug' ),'options');

    if($pageID == $pagePost){
        return 'post';
    }
    else if($pageID == $pageCase){
        return 'cases';
    }
    else if($pageID == $pageReferences){
        return 'references';
    }
    else if($pageID == $pageExpertises){
        return 'expertises';
    }

    if($child){
        return '';
    }
    return get_post_type();
}

function clean_string($string){
    $string = sanitize_text_field($string);
    $string = urlencode($string);
    return $string;

}

function get_the_page_children($postID){
    $args = array(
        'post_parent' => $postID,
    );
    $children = get_children( $args );

    if ( ! empty($children) ) {
        $childArray = array();
        foreach($children as $child){
            $childArray[] = $child;
        }
        return $childArray;
    } else {
        return false;
    }
}

function has_children($postID) {
    $children = get_pages( array( 'child_of' => $postID, 'hierarchical' => 1 ) );
    if( count( $children ) == 0 ) {
        return false;
    } else {
        return $children;
    }
}

function has_parent() {
    global $post;
    if($post->post_parent === 0){
        return false;
    }
    $children = get_pages( array( 'child_of' => $post->post_parent ) );
    if( count( $children ) == 0 ) {
        return false;
    } else {
        return $children;
    }
}

function get_all_references(){
    $list = get_field('control_sidebar_ref', get_the_ID());
    $args = array(
        'post_type' => 'references',
        'posts_per_page' => -1,
    );
    $id = array();
    if(!empty($list) && is_array($list)){
       foreach ($list as $link){
           $id[] = url_to_postid($link);
       }
       $args['orderby'] = 'post__in';
       $args['post__in'] = $id;
    }
    $refs = new WP_Query($args);
    return $refs->posts;
}