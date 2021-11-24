<?php

/*
Plugin Name: SWA Test Plugin
Plugin URI: https://swissacademy.eu
Description: This is a wordpress implementation of a demo plugin
Author: Mihai 2
Version: 1.2
Author URI: https://swissacademy.eu
*/

function swa_lightslider_shortcode( $atts) {

    $param = shortcode_atts(
        array(
            'category' => '',
            'autoplay' => 'true'
        ),
        $atts
    );
?> 

<link type="text/css" rel="stylesheet" href="<?php echo plugins_url('css/lightslider.css', __FILE__); ?>" />

<script src="<?php echo plugins_url('js/lightslider.js', __FILE__); ?>"></script>



    <ul id="image-gallery<?php ?>" class="gallery list-unstyled cS-hidden">
<?php
    $args = array(
        'post_type' => 'lightslider',
        'category_name' => $param['category'],
        'posts_per_page'    => -1 //cate postari sa scoata din query
    );

    $the_query = new WP_Query($args);

    echo '<div class="owl-carousel owl-theme home-slider">';

    if( $the_query->have_posts() ) {
        while( $the_query->have_posts() ) {
            $the_query->the_post();
?>
        <li data-thumb="<?php echo get_the_post_thumbnail_url(); ?>"> 
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
        </li>
        
    


<?php
        }
    }
?>
    
</ul>

<?php
}

add_shortcode('swa_lightslider','swa_lightslider_shortcode');
