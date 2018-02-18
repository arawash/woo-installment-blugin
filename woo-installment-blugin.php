<?php
/*
Plugin Name: woo-installment-blugin
Plugin URI: www.rawash.com
Description: Installment blugin for WooCommerce.
Version: 1.0
Author:      Amr Rawash
Author URI:  www.rawash.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: woo-installment-blugin
Domain Path: /languages
*/


if ( ! function_exists( 'installment_warp' ) ) {           
    function installment_warp() {
        global $product;
       
        $response = wp_remote_get( plugin_dir_url( __FILE__ ).'/a.json' );
        $resBody = wp_remote_retrieve_body( $response );
       
        $gitcatname= $product->get_categories();
        echo $gitcatname;

        /* $pr = $product;
        echo $pr;
 */
       
        $a =    the_widget( 'Woothemes_Widget_Project_Categories', 'title=&hierarchical=0&count=1' );
        echo $a;
       

            }
        }

add_action( 'woocommerce_after_add_to_cart_button',		'installment_warp',	 	1  );

