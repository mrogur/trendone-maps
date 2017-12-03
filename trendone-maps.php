<?php
/*
Plugin Name: TrendAir Maps Plugin
Plugin URI:  http://trendair.info
Description: TrenOne simple maps plugin
Version:     20170813
Author:      Pawel Wlazlo
Author URI:  http://trendair.info/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: trendone-maps
Domain Path: /languages
*/

require_once(plugin_dir_path(__FILE__) . '/class-trendone-maps.php');

const TRENDONE_MAPS = '_trendone_maps_';

//end TrendOne_Maps

function myplugin_init()
{
    $plugin_dir = basename(dirname(__FILE__)) . '/languages';
    load_plugin_textdomain('trendone-maps', false, $plugin_dir);
}

add_action('plugins_loaded', 'myplugin_init');

add_shortcode('trendone-maps-content', function ($attrs) {
    if (!array_key_exists('part', $attrs)) {
        return '';
    }

    if ($attrs['part'] != 'map') {
        $option = TRENDONE_MAPS . $attrs['part'];

        return get_option($option);
    } else if ($attrs['part'] == 'map') {
        $mapWidth = get_option(TRENDONE_MAPS . 'map_width');
        $mapHeight = get_option(TRENDONE_MAPS . 'map_height');
        $apiKey = get_option(TRENDONE_MAPS . 'google_maps_api_key');
        $queryString = get_option(TRENDONE_MAPS . 'google_maps_query_string');

        $mapUrl = sprintf("https://www.google.com/maps/embed/v1/place?key=%s&q=%s", $apiKey, $queryString);
        ob_start(); ?>
        <iframe
                width="<?php echo $mapWidth ?>"
                height="<?php echo $mapHeight ?>"
                frameborder="0" style="border:0"
                src="<?php echo $mapUrl ?>"
                allowfullscreen>
        </iframe>
        <?php
        $contents = ob_get_contents();
        ob_get_clean();

        return $contents;
    }

    return '';


});

/**
 * Shortcode for map presentation
 */
add_shortcode('trendone-map', function ($attrs) {
    $mapWidth = empty($attrs['width']) ? get_option(TRENDONE_MAPS . 'map_width') : $attrs['width'];
    $mapHeight = empty($attrs['height']) ? get_option(TRENDONE_MAPS . 'map_height') : $attrs['height'];
    $aspectRatio = number_format(($mapHeight / $mapWidth) * 100, 2);
    $apiKey = get_option(TRENDONE_MAPS . 'google_maps_api_key');
    $queryString = get_option(TRENDONE_MAPS . 'google_maps_query_string');

    $mapUrl = sprintf("https://www.google.com/maps/embed/v1/place?key=%s&q=%s", $apiKey, $queryString);
    ob_start(); ?>

    <div class="map-container mb-3">
        <div class="embed-responsive"
             style="min-height: <?php echo $mapHeight . "px" ?> ; padding-bottom: <?php echo "$aspectRatio%;" ?>">
            <iframe class="embed-responsive-item"
                    width="<?php echo $mapWidth ?>"
                    height="<?php echo $mapHeight ?>"
                    frameborder="0" style="border:0"
                    src="<?php echo $mapUrl ?>"
                    allowfullscreen>
            </iframe>

        </div>
    </div>
    <?php
    $contents = ob_get_contents();
    ob_get_clean();

    return $contents;
});

add_action('widgets_init', function () {
    register_widget("Trendone_Maps");
});
function enqueue_all()
{
    wp_register_style('trendone-maps-style', plugins_url('css/trendone-maps.css', __FILE__));
    wp_enqueue_style('trendone-maps-style');
}

add_action('wp_enqueue_scripts', 'enqueue_all');