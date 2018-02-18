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


        echo "  gitcatname";



        /*************************************************** */


        function get_parent_terms($term) {
            if ($term->parent > 0){
                $term = get_term_by("id", $term->parent, "product_cat");
                return get_parent_terms($term);
            }else{
                return $term->term_id;
            }
        }
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $Root_Cat_ID = get_parent_terms($cat_obj);

        print_r($cat_obj);

        print($Root_Cat_ID);
    
    }
            }
       

add_action( 'woocommerce_after_add_to_cart_button',		'installment_warp',	 	1  );

