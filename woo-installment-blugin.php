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

// اعمل بانل فى الوو كومرس
add_action('woocommerce_product_write_panel_tabs', 'woo_add_custom_admin_product_tab');

function woo_add_custom_admin_product_tab()
{
    ?>
    <li class="custom_tab">
        <a href="#custom_tab_data">
            <?php _e('Installment Option', 'woocommerce');?>
        </a>
    </li>
    <?php
}
// Add installment Settings
add_action('woocommerce_product_data_panels', 'woo_add_custom_general_fields');
/**
 * Create new fields for installments
 *
 */
function woo_add_custom_general_fields()
{
    global $post;
    // Get the selected value  <== <== (updated)
    $value = get_post_meta($post->ID, '_select', true);
    if (empty($value)) {
        $value = '';
    }

    // Select
    ?>
        <div id="custom_tab_data" class="panel custom_tab_data" style="padding-left:160px;">
            <div class="options_group">
                <p class="form-field">
                    <?php
woocommerce_wp_select(
        array(
            'id' => '_select',
            'label' => __('Choose the installment type', 'woocommerce'),
            'description' => __('Choose the installment type for the product.', 'woocommerce'),
            'value' => get_post_meta($value, '_select', true),
            'options' => array(
                'one' => __('AIR-CONDITIONING', 'woocommerce'),
                'two' => __('phones', 'woocommerce'),
                'three' => __('home', 'woocommerce'),
            ),
        )
    );
    ?>
                </p>
            </div>
        </div>
    <?php
}
// Save installment Settings
/**
 * Save new fields for installments
 *
 */
add_action('woocommerce_process_product_meta', woo_add_custom_general_fields_save);
function woo_add_custom_general_fields_save($post_id)
{
    // Select
    $select = $_POST['_select'];
    if (!empty($select)) {
        update_post_meta($post_id, '_select', esc_attr($select));
    } else {
        update_post_meta($post_id, '_select', '');
    }}?>
<?php
if (!function_exists('installment_warp')) {
    function installment_warp()
    {global $product;
        $response = wp_remote_get(plugin_dir_url(__FILE__) . '/a.json');
        $resBody = wp_remote_retrieve_body($response);
        ?>
<div id="installment_table" class="alert alert-success">
            <br>        
                <?php
// Display Custom Field Value;
        global $post;
        echo get_post_meta($post->ID, '_select', true);
        ?>
        <p class="price"><?php
echo $product->get_price_html();
        echo $product->price;
        ?>
        </p>
    <div ng-app="installment">
        <div ng-controller="ctrl">
            <div class="input-group input-group-lg">
                <p>Input something in the input box:</p>
                <input type="text" ng-model="inAdvance" class="form-control" placeholder="inAdvance" aria-describedby="sizing-addon1">
                        <!--        <li ng-repeat="dur in body.durs">
                                <a ng-click="do($index)" href="">{{dur.monthes}} monthes</a>
                            </li> -->

<!--                                 Price   The Rest amount   ng-repeat="i in body.categs[body.xyz].installmentDuration
-->
                
                <div ng-repeat="dur in body.durs">
                    <div class="" >
                            <div class=" col-xs-4" style="">{{dur.monthes}}</div>
                            <div class=" col-xs-4" style="">4444</div>
                            <div class=" col-xs-4" style="" ng-bind ="Monthly_payment($index)" ></div>
                        </div>
                    <div class="alert alert-warning" ng-show="showAlert">
                        <strong>تحزير!</strong> برجاء ادخال مبلغ اكبر من او يساوى 20% من المبلغ الاصلى.
                    </div>
                </div>
                </div>
            <script>
                angular.module("installment", []).controller('ctrl', function ($scope) {
                            $scope.price = parseInt(<?php echo json_encode($product->price) ?>);
                            $scope.body = JSON.parse(<?php echo json_encode($resBody) ?>);
                            $scope.body.xyz = "<?php $postmetacat = get_post_meta($post->ID, '_select', true);
                            echo $postmetacat; ?>";
                            $scope.inAdvance = 0;
                            $scope.Monthly_payment = ($index) => {
                            

                                            //استخلاص نسبة المؤخر سدادة
                                            $scope.principalAmountBorrowed = () => {
                                            return $scope.price - $scope.inAdvance;
                                            };
                                            console.log($scope.principalAmountBorrowed() + "باقى");
                                            //استخلاص نسبة الفائدة على كل شهر
                                            $scope.periodicInterestRateDivided = (rate) => {
                                                return (rate / 100) / 12;
                                            };
                                            console.log("rsten " + $scope.rate);

                                            console.log($scope.periodicInterestRateDivided);
                                            
                                            $scope.totalNumberOfPayments = $scope.body.durs[$index].monthes;
                                            console.log($scope.totalNumberOfPayments);
                                            $scope.rate = ($index) => {
                                    let x = $scope.body.categs["<?php $postmetacat = get_post_meta($post->ID, '_select', true);
                                                                    echo $postmetacat; ?>"].installmentDuration[$index];
                                    return x;
                                    }
                                console.log($scope.rate($index) + "the rate");
                                console.log("last");                    
                                a = ($scope.principalAmountBorrowed() / $scope.totalNumberOfPayments) +  $scope.periodicInterestRateDivided($scope.rate($index)) ;
                                return a; 
                                                                };
            })
            </script>
                </div>
            </div>
        </div>
            <!-- /.single-product-installment-wrapper -->
            <script>
                document.getElementById('installment_table').style.visibility = 'hiddin'
            </script>
    </div>
</div></div>
</div></div>
</div>
            <?php
}}
;
add_action('woocommerce_after_add_to_cart_button', 'installment_warp', 1);





/*<comment>    start of admin install ment page page           </comment>*/




function wporg_options_page()
{
    add_menu_page(
        'Installment Rawash Plugin',
        'installment Options',
        'manage_options',
        'installment',
        'wporg_options_page_html',
        plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}
add_action('admin_menu', 'wporg_options_page');

add_action('init', 'load');
function load(){
    wp_enqueue_script( 'angularjs', plugin_dir_url( __FILE__ ) . '/angular.min.js', array ( 'jquery' ), all, false);
    wp_enqueue_script( 'angularjs', plugin_dir_url( __FILE__ ) . '/angular.min.js', array ( 'jquery' ), all, false);
    wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . '/bootstrap.min.css');
    
    
    


}

function wporg_options_page_html()
{
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?= esc_html(get_admin_page_title()); ?></h1>
            <?php
            $response = wp_remote_get(plugin_dir_url(__FILE__) . '/a.json');
            $resBody = wp_remote_retrieve_body($response);
            echo "Instalment Option Page ";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<body ng-app="installment2">

    <div ng-controller="ctrl2">
    <div class="container">
    <div class="row" >
        <div class="col-md-3 col-xs-6" ng-repeat="categ in body1.categs">
    <h4>{{categ.type}}</h4>
             <h2>{{body.categ.one.type}}</h2> 
             <div class="row" ng-repeat="dur in body1.durs">
                <div class="col-xs-6 input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1">{{body1.durs[$index].monthes}} monthes </span>
                 <input type="text" ng-model="categ.installmentDuration[$index]" class="form-control" placeholder="">               
                </div>
            </div> 
        </div>

        <!-- <button class="btn btn-default dropdown-toggle" ng-click="print()" type="button" id="dropdownMenu1" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="true">
 -->
            <div class="alert alert-warning" ng-show="showAlert">
                <strong>تحزير!</strong> برجاء ادخال مبلغ اكبر من او يساوى 20% من المبلغ الاصلى.
            </div>
            </div>
    </div>
    
    <script>
        angular.module('installment2', [])
            .controller('ctrl2', function ($scope) {
                $scope.body1 = JSON.parse(<?php echo json_encode($resBody) ?>);
                console.log($scope.body1);
                //////////////////////////////////////////////////////////////////////////////////////////////////
                $scope.print = () => {
                    console.log($scope.categs)
                }
                  
                $scope.getper = (idx) => {
                    $scope.per = $scope.categs[0].installmentDuration[idx]
                    $scope.monthes = $scope.durs[idx].monthes
                    let amount = 5000;
                    if ($scope.inAdvance > 0.2 * amount && $scope.inAdvance < amount) {
                        $scope.showAlert = false;

                        $scope.restAmount = amount - $scope.inAdvance
                        $scope.interest = $scope.restAmount * $scope.per
                        $scope.eachMonth = ($scope.restAmount + $scope.interest) / $scope.monthes
                    } else {
                        $scope.showAlert = true;
                    }
                }

            });
    </script>installmentrate
</body>


<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // output save settings button
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}


/* function wporg_options_page_html()
{
 */    // check user capabilities*/