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


if ( ! class_exists( 'TrendOne_Maps' ) ) {
	class TrendOne_Maps extends WP_Widget {

		private $title = '';

		private $trendoneName = '';

		private $streetAddr = '';

		private $postalCode = '';

		private $city = '';

		private $directionTips = '';

		private $emails = '';

		private $phones = '';

		private $mapWidth = 610;

		private $mapHeight = 450;

		private $queryString = '';

		private $apiKey = '';

		private $cssFormInputClasses = "widefat trendone-maps-input-field";

		public function __construct() {
			$widget_ops = array(
				'classname'   => 'TrendOne_Maps',
				'description' => 'Google Maps Support Widget',
			);

			parent::__construct( 'TrendOne_Maps', __( 'TrendOne Google Maps Widget', 'trendone-maps' ), $widget_ops );
		}

		public function widget( $args, $instance ) {
			$this->init_fields_from_instance( $instance );
			echo $args['before_widget'];
			if ( ! empty( $this->title ) ) {
				echo $args['before_title'] .
				     apply_filters( 'widget_title', $this->title ) .
				     $args['after_title'];
			}
            include( plugin_dir_path( __FILE__ ) . '/trendone-widget.php');

			echo $args['after_widget'];
		}


		public function update( $new_instance, $old_instance ) {
			$i                             = $old_instance;
			$i['title']                    = esc_attr( $new_instance['title'] );
			$i['name']                     = esc_attr( $new_instance['name'] );
			$i['street_addr']              = esc_attr( $new_instance['street_addr'] );
			$i['postal']                   = esc_attr( $new_instance['postal'] );
			$i['city']                     = esc_attr( $new_instance['city'] );
			$i['direction_tips']           = esc_attr( $new_instance['direction_tips'] );
			$i['emails']                   = esc_attr( $new_instance['emails'] );
			$i['phones']                   = esc_attr( $new_instance['phones'] );
			$i['map_width']                = esc_attr( $new_instance['map_width'] );
			$i['map_height']               = esc_attr( $new_instance['map_height'] );
			$i['google_maps_api_key']      = esc_attr( $new_instance['google_maps_api_key'] );
			$i['google_maps_query_string'] = esc_attr( $new_instance['google_maps_query_string'] );

			return $i;
		}

		public function form( $instance ) {
			if ( $instance ) {
				$this->init_fields_from_instance( $instance );
			}
            include( plugin_dir_path( __FILE__ ) . '/trendone-settings-form.php');
		}

		/**
		 * @param $instance
		 */
		public function init_fields_from_instance( $instance ) {
			$this->title         = esc_attr( $instance['title'] );
			$this->trendoneName  = esc_attr( $instance['name'] );
			$this->streetAddr    = esc_attr( $instance['street_addr'] );
			$this->postalCode    = esc_attr( $instance['postal'] );
			$this->city          = esc_attr( $instance['city'] );
			$this->directionTips = esc_attr( $instance['direction_tips'] );
			$this->emails        = esc_attr( $instance['emails'] );
			$this->phones        = esc_attr( $instance['phones'] );
			$this->mapWidth      = ! empty( $instance['map_width'] ) ? $instance['map_width'] : $this->mapWidth;
			$this->mapHeight     = ! empty( $instance['map_height'] ) ? $instance['map_height'] : $this->mapHeight;
			$this->apiKey        = esc_attr( $instance['google_maps_api_key'] );
			$this->queryString   = esc_attr( $instance['google_maps_query_string'] );
		}

		public function prepare_direction_tips() {
			return nl2br($this->directionTips);
		}

		public function prepare_maps_url(  ) {
			//https://www.google.com/maps/embed/v1/place?key=AIzaSyAYCNo-jLXCmXKeqJeJ1noJb2bxEOcXw6s&q=Bogucicka+2,+Katowice
			return sprintf("https://www.google.com/maps/embed/v1/place?key=%s&q=%s", $this->apiKey, $this->queryString);

		}
	}


	function myplugin_init() {
		$plugin_dir = basename( dirname( __FILE__ ) ) . '/languages';
		load_plugin_textdomain( 'trendone-maps', false, $plugin_dir );
	}

	add_action( 'plugins_loaded', 'myplugin_init' );

	add_action( 'widgets_init', function () {
		register_widget( "Trendone_Maps" );
	} );

	wp_register_style ( 'trendone-maps-style', plugins_url ( 'css/trendone-maps.css', __FILE__ ) );
	wp_enqueue_style( 'trendone-maps-style' );
}