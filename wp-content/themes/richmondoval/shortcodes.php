<?php
//[book_event_iframe url=""]
function book_event_iframe( $atts, $content ){

    extract( shortcode_atts( array(
        'url' => '#',
    ), $atts, 'book_event_iframe' ) );

    $result = '<div class="pm"><iframe width="100%" height="600px" src="'.$url.'"></iframe></div>';

    return $result;

}
add_shortcode( 'book_event_iframe', 'book_event_iframe' );


//[faq question="Do you have 'navave'?"]Content[/faq]
function faq_shortcode( $atts, $content ){

    extract( shortcode_atts( array(
        'question' => 'Question',
    ), $atts, 'faq' ) );

    $result = '<h4 class="questionNtoggler">'.$question.'</h4>
        <div class="answerBox">'.$content.'</div>';

    return $result;

}
add_shortcode( 'faq', 'faq_shortcode' );


//SHOW MORE
function show_more_shortcode( $atts, $content ){

    extract( shortcode_atts( array(
        'title' => 'Title',
    ), $atts, 'show_more' ) );

    $result = '<h4 class="showMoreToggler">'.$title.'</h4>
        <div class="moreText">'.$content.'</div>';

    return $result;

}
add_shortcode( 'show_more', 'show_more_shortcode' );


//COLUMN
function col_shortcode( $atts, $content ){

    extract( shortcode_atts( array(
        'width' => '12',
    ), $atts, 'col' ) );

    $result = '<div class="col col-md-'.$width.'">'.do_shortcode($content).'</div>';


    return $result;

}
add_shortcode( 'col', 'col_shortcode' );


//ROW
function row_shortcode( $atts, $content ){


    $result = '<div class="row">'.do_shortcode($content).'</div>';


    return $result;

}
add_shortcode( 'row', 'row_shortcode' );


//QUICK LINKS
function qlink_shortcode( $atts, $content ){

    extract( shortcode_atts( array(
        'title' => 'link',
        'url' => '#'
    ), $atts, 'qlink' ) );

    $result = '<li><a title="'.$title.'" href="'.$url.'">'.$title.'</a></li>';


    return $result;

}
add_shortcode( 'qlink', 'qlink_shortcode' );



