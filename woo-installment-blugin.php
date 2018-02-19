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
    
        $parent_id = wp_get_post_parent_id( $this->get_id() );
        
    
        print(parent_id);
    
    }};

add_action( 'woocommerce_after_add_to_cart_button',		'installment_warp',	 	1  );