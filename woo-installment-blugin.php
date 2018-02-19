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
      

        

// gets product cat id
$product_cat_id = $prod_term->term_id;

// gets an array of all parent category levels
$product_parent_categories_all_hierachy = get_ancestors( $product_cat_id, 'product_cat' ); 

print_r( $product_parent_categories_all_hierachy);

    }};

add_action( 'woocommerce_after_add_to_cart_button',		'installment_warp',	 	1  );