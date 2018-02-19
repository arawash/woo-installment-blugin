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
        ?>
        <div class="container">
        <?php /* The loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php the_post_thumbnail(); ?>
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
        <?php endwhile; ?>
     </div>
     <!-- woocommerce Heading h1-->
         <div class="container">
             <div class="row">
                 <div class="col-lg-12 woocomh1">
                     <h1><i class="fa fa-diamond"></i>Featured products</h1>
                 </div>
             </div>
         </div>
     <!-- ends here-->
     
     <div class="container">
        <div class="row product_row">
     
           
     <?php
     $taxonomy     = 'product_cat';
     $orderby      = 'name';
     $show_count   = 0;      // 1 for yes, 0 for no
     $pad_counts   = 0;      // 1 for yes, 0 for no
     $hierarchical = 1;      // 1 for yes, 0 for no
     $title        = '';
     $empty        = 0;
     $args = array(
       'taxonomy'     => $taxonomy,
       'orderby'      => $orderby,
       'show_count'   => $show_count,
       'pad_counts'   => $pad_counts,
       'hierarchical' => $hierarchical,
       'title_li'     => $title,
       'hide_empty'   => $empty
       );
       ?>
     <?php $all_categories = get_categories( $args );
           foreach ($all_categories as $cat) {  
               if($cat->category_parent == 0) {?>
     <?php   
             $category_id = $cat->term_id;
             $thumbnail_id   = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
             $image = wp_get_attachment_url( $thumbnail_id );
             $prod_term    =    get_term($category_id,'product_cat');
             $description=    $prod_term->description;
             $term_link = get_term_link( $cat );
               
             
             echo "<div class='col-lg-3 col-md-4 col-sm-6 pro-setting'>";
             echo "<div class='feature-product'>";
             echo "<img style='width:100%;height:100%;' src=".$image.">";
             echo "<div class='bg-hover d-n' data-anim-in='zoomIn animated' data-anim-out='zoomOut animated'>
             <h1 style='font-size:16px;color:white;'>$cat->name</h1>
             <p>$description</p>
             <a href=".$term_link." class='enter-here'>Enter HEre <i class='fa fa-angle-right'></i></a>
             </div>";
     ?>
     </div>
     </div>
     <?php   }  } ?>
     
     
     
        </div>
     </div>
     
     
     
     
     
     <!-- paralaxbacksection -->
     <div class="shop-now" style="background: url(http://localhost/shinevikas/wp-content/uploads/2015/10/PL.jpg) no-repeat center center fixed;">
        <div class="container">
           <div class="row">
              <div class="col-lg-6">
                 <h1>Underline your personality</h1>
                 <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                 <a href="#" class="button-inner">Shop Now</a>
              </div>
              <div class="col-lg-6">
                 <img src="wp-content/uploads/2015/10/ring.png" class="img img-responsive rings">
              </div>
           </div>
        </div>
     </div>
<?php
    }};

add_action( 'woocommerce_after_add_to_cart_button',		'installment_warp',	 	1  );