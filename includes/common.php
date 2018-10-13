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

function get_current_page_post_type($pageID){
    $pagePost = get_field('pt_post','options');
    $pageCase = get_field('pt_case','options');

    if($pageID == $pagePost){
        return 'post';
    }

    else if($pageID == $pageCase){

        return "cases";

    }

    return "";
}

function clean_string($string){
    $string = sanitize_text_field($string);
    $string = urlencode($string);
    return $string;

}
