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
        global $post;
       
        $response = wp_remote_get( plugin_dir_url( __FILE__ ).'/a.json' );
        $resBody = wp_remote_retrieve_body( $response );
       
        $gitcatname= $product->get_categories();
        echo $gitcatname;

        global $post;
        $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
        if ( ! empty( $terms ) ) {
            $main_term = $terms[0];
            $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
            if ( ! empty( $ancestors ) ) {
                $ancestors = array_reverse( $ancestors );
                // first element in $ancestors has the root category ID
                // get root category object
                $root_cat = get_term( $ancestors[0], 'product_cat' );
            }
            else {
                // root category would be $main_term if no ancestors exist
            }
        }
        else {
            // no category assigned to the product
        }
    }

            }
        }

add_action( 'woocommerce_after_add_to_cart_button',		'installment_warp',	 	1  );

