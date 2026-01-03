<?php
/**
 * Plugin Name: Custom Shape Product Option
 * Plugin URI: https://fiverr.com/blackash_web
 * Author: Jaber (blackash_web)
 * Author URI: https://fiverr.com/blackash_web
 * Description: Adds custom shape product options to WooCommerce products.
 * Version: 2.3
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add custom metabox to product post type
function custom_product_metabox() {
    add_meta_box(
        'custom_shapes_metabox',
        'Custom Shapes Settings',
        'custom_shapes_metabox_callback',
        'product',
        'side', // Position of the metabox
        'default' // Priority
    );
}
add_action('add_meta_boxes', 'custom_product_metabox');

// Metabox callback function
function custom_shapes_metabox_callback($post) {
    // Retrieve existing values
    $enable_custom_shapes = get_post_meta($post->ID, '_enable_custom_shapes', true);
    $selected_shape = get_post_meta($post->ID, '_selected_shape', true);
    
    // Checkbox for Enable Custom Shapes
    echo '<label for="enable_custom_shapes">';
    echo '<input type="checkbox" id="enable_custom_shapes" name="enable_custom_shapes" value="yes"' . checked($enable_custom_shapes, 'yes', false) . ' />';
    echo ' Enable Custom Shapes';
    echo '</label><br><br>';

    // Dropdown for Select Shape
    $shapes = ['Square-Two', 'Square', 'Love-Two', 'Love']; // Example shapes
    echo '<label for="selected_shape">Select Shape:</label>';
    echo '<select id="selected_shape" name="selected_shape">';
    echo '<option value="">-- Select a Shape --</option>';
    foreach ($shapes as $shape) {
        echo '<option value="' . esc_attr($shape) . '"' . selected($selected_shape, $shape, false) . '>' . esc_html($shape) . '</option>';
    }
    echo '</select>';
}
function wk_add_to_cart_validation( $passed, $product_id, $quantity, $variation_id = null ) {
    if(get_post_meta($product_id, '_enable_custom_shapes', true) != 'yes')   return $passed;
    if ( empty( $_POST['name_1'] ) ) {
        $passed = false;
        wc_add_notice( __( 'VYPLŇTE VAŠE ÚDAJE', 'webkul' ), 'error' );
    }
    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'wk_add_to_cart_validation', 10, 4 );
function wk_add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
    if ( isset( $_POST['name_1'] ) ) {
        $cart_item_data['name_1'] = sanitize_text_field( $_POST['name_1'] );
    }
    if ( isset( $_POST['b_text'] ) ) {
        $cart_item_data['b_text'] = sanitize_text_field( $_POST['b_text'] );
    }
    if(isset($_POST['name_2'])){
        $cart_item_data['name_2'] = sanitize_text_field( $_POST['name_2'] );
    }
    if(isset($_POST['shape_name'])){
        $cart_item_data['shape_name'] = sanitize_text_field( $_POST['shape_name'] );
    }
    
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'wk_add_cart_item_data', 10, 3 );

function wk_get_item_data( $item_data, $cart_item_data ) {
   /* if ( isset( $cart_item_data['name_1'] ) ) {
        $item_data[] = array(
            'key'   => __( 'Name 1', 'webkul' ),
            'value' => wc_clean( $cart_item_data['name_1'] ),
        );
    }*/
    if (isset( $cart_item_data['name_1'] ) ) {
       /* $item_data[] = array(
            'key'   => __( 'Bottom text', 'webkul' ),
            'value' => wc_clean( $cart_item_data['b_text'] ),
        );*/
        $shape =  $cart_item_data['shape_name'];
        $name_1 = $cart_item_data['name_1'];
        $name_2 =   isset($cart_item_data['name_2']) ? $cart_item_data['name_2'] : '';
        $b_text = isset($cart_item_data['b_text']) ? $cart_item_data['b_text'] : '';
      
       $item_data[] = array(
            'key'   => __( 'prev', 'webkul' ),
            'value' => get_preloaded_shaped_image_love( $name_1,  $b_text, $name_2,  false, 'Preview', $shape),
        );

    }
    return $item_data;
}
// Add custom meta to order item
add_action('woocommerce_add_order_item_meta', 'add_custom_order_item_meta', 10, 3);
function add_custom_order_item_meta($item_id, $values, $order_id) {
    // Assuming you want to store a URL for the order item
    //if (empty($shape)) {
           //return;
   // } 
   $product_id = wc_get_order_item_meta($item_id, '_product_id', true);
   if(get_post_meta($product_id, '_enable_custom_shapes', true) == 'yes'){
    $ajax_url = admin_url('admin-ajax.php?action=show_desing_imae&item_id=' . $item_id);
    $meta = '<a class="customer_design_opener" href="'.$ajax_url.'">See Customer Design</a>';
    wc_add_order_item_meta($item_id, 'Design Image', $meta);
   }
}
// Handle AJAX request
add_action('wp_ajax_show_desing_imae', 'handle_custom_ajax_action');
function handle_custom_ajax_action() {
    // Check for item_id parameter
    if (isset($_GET['item_id'])) {
        $item_id = intval($_GET['item_id']);
        // Perform your desired operations here
        $name_1 = wc_get_order_item_meta($item_id, 'Name 1', true);
        $shape =  wc_get_order_item_meta($item_id, 'Shape', true);
        $name_2 =   wc_get_order_item_meta($item_id, 'Name Two', true);
        //var_dump($name_1);
        $b_text = wc_get_order_item_meta($item_id, 'Bottom Text', true);
        $custom_html =    get_preloaded_shaped_image_love( $name_1,  $b_text, $name_2,  false, null, $shape);
        echo  $custom_html;
        exit();
        // For example, just return a response
        //wp_send_json_success(['message' => 'Custom data for item ID ' . $item_id]);
    } else {
        wp_send_json_error('No item ID provided.');
    }
}
add_filter( 'woocommerce_get_item_data', 'wk_get_item_data', 10, 2 );
function wk_checkout_create_order_line_item( $item, $cart_item_key, $values, $order ) {
    if ( isset( $values['shape_name'] ) ) {
        $item->add_meta_data(
            __( 'Shape', 'webkul' ),
            $values['shape_name'],
            true
        );
    }
    if ( isset( $values['name_1'] ) ) {
        $item->add_meta_data(
            __( 'Name 1', 'webkul' ),
            $values['name_1'],
            true
        );
    }
    if ( isset( $values['name_2'] ) ) {
        $item->add_meta_data(
            __( 'Name Two', 'webkul' ),
            $values['name_2'],
            true
        );
    }
    if ( isset( $values['b_text'] ) ) {
        $item->add_meta_data(
            __( 'Bottom Text', 'webkul' ),
            $values['b_text'],
            true
        );
    }
}
add_action( 'woocommerce_checkout_create_order_line_item', 'wk_checkout_create_order_line_item', 10, 4 );
// Save the metabox data
function save_custom_shapes_metabox($post_id) {
    // Check for nonce and permissions
    if (!isset($_POST['enable_custom_shapes']) || !isset($_POST['selected_shape'])) {
        return;
    }

    // Save Enable Custom Shapes
    $enable_custom_shapes = isset($_POST['enable_custom_shapes']) ? 'yes' : 'no';
    update_post_meta($post_id, '_enable_custom_shapes', $enable_custom_shapes);

    // Save Selected Shape
    $selected_shape = sanitize_text_field($_POST['selected_shape']);
    update_post_meta($post_id, '_selected_shape', $selected_shape);
}
add_action('save_post', 'save_custom_shapes_metabox');

// Save the custom options
function cs_save_product_option_meta($post_id) {
    if (isset($_POST['_custom_product_option'])) {
        update_post_meta($post_id, '_custom_product_option', 'yes');
    } else {
        delete_post_meta($post_id, '_custom_product_option');
    }

    if (isset($_POST['_full_name_1'])) {
        update_post_meta($post_id, '_full_name_1', sanitize_text_field($_POST['_full_name_1']));
    }

    if (isset($_POST['_full_name_2'])) {
        update_post_meta($post_id, '_full_name_2', sanitize_text_field($_POST['_full_name_2']));
    }
}
//add_action('woocommerce_process_product_meta', 'cs_save_product_option_meta');
add_action('woocommerce_before_add_to_cart_button', 'display_shaped_popup_cssasdas');
function display_shaped_popup_cssasdas(){
    $post_id = get_the_ID();
    if ( !is_product())  return;
    if(get_post_meta($post_id, '_enable_custom_shapes', true) == 'yes')
    {
        // /var_dump('asdasd');

    ?>
    <div class="customize_btn_holder">
    <a href="#" id="open_ib_popup">PRISPÔSOBIŤ TU</a>
</div>
    <?php
        if(get_post_meta($post_id, '_selected_shape', true) != ""){
            $selected_shape = get_post_meta($post_id, '_selected_shape', true);
            if( $selected_shape == "Love"){
                require(plugin_dir_path( __FILE__ ) . 'shapes/love.php');
            }
            elseif($selected_shape == "Love-Two"){
                require(plugin_dir_path( __FILE__ ) . 'shapes/love-two.php');
            }
            elseif($selected_shape == "Square"){
                require(plugin_dir_path( __FILE__ ) . 'shapes/square.php');
            }
            elseif($selected_shape == "Square-Two"){
                require(plugin_dir_path( __FILE__ ) . 'shapes/square-two.php');
            }
            else{
            
            }
        }
        ?>
        <style>
body.no-scroll {
  overflow: hidden !important;
  position: fixed  !important;
  width: 100% !important;
  top: 0 !important;
}
@media screen and (max-device-width:599px){
    .popup_container {
    align-content: baseline !important;
  }
}

.popup_container {
    position: fixed;
    top: 0;
    background: #0000004a;
    width: 100%;
    height: 100vh;
    left: 0;
    display: grid;
    align-items: center;
    justify-items: center;
    z-index: 10002;
    overflow: scroll;
}

a#cloe_mama {
    color: #000;
    position: absolute;
    right: 20px;
    font-size: 20px;
    text-decoration: none;
    font-weight: bold;
    top: 5px;
    cursor: pointer;
}
.popup_container .the_content {
    width: 420px;
    margin: auto;
    background: #fff;
    padding: 20px;
    position: relative;
    top: 20px;
}
button.single_add_to_cart_button.button.alt {
    opacity: 0;
}

.input-grp {
    margin: 10px 0px;
    position: relative;
}
input[name="quantity"] {
    display: none;
}
a#c_add_cto_cart_btn,a#open_ib_popup {
    width: 100%;
    background: #000;
    display: block;
    text-align: center;
    color: #fff;
    text-decoration: none;
    padding: 10px;
    font-weight: bold;
}
span.charCount {
    /* position: absolute; */
    /* right: 0px; */
    /* top: 0; */
    /* font-size: 14px; */
    position: absolute;
    right: 10px;
    top: 70%;
    transform: translateY(-50%);
    color: #666;
    pointer-events: none;
    font-size: 0.9em;
}
.svg_holder {
    border: 1px solid #ddd;
}
.input-grp input {
    width: 100%;
    padding: 10px;
    margin-bottom: 0;
    padding-right: 40px;
}
.input-grp label{
    margin-bottom: 0;
}
@media only screen and (max-width: 600px){
    .popup_container .the_content {
    width: 90vw !important;
}
}

        </style>
        
        <?php
    }
}
function get_preloaded_shaped_image_love($name_1, $b_text, $name_2 = '', $return=false, $preview = 'Preview', $shape = 'Love'){
    ob_start();
    if($shape == 'Love'){
        require(plugin_dir_path( __FILE__ ) . 'shapes/love-svg.php');
    }
    else if($shape == 'Love-Two'){
        require(plugin_dir_path( __FILE__ ) . 'shapes/love-two-svg.php');
    }
    else if($shape == 'Square'){
        require(plugin_dir_path( __FILE__ ) . 'shapes/square-svg.php');
    }
    else if($shape == 'Square-Two'){
        require(plugin_dir_path( __FILE__ ) . 'shapes/square-two-svg.php');
    }
    if($return == false){
    echo  ob_get_clean();
    }
    else{
        return ob_get_clean();
    }
}
add_action('wp_footer', 'display_not_dsad');
function display_not_dsad (){
    ?>
    <style>
        dt.variation-prev {
    display: none !important;
}
    </style>
    <?php
}
add_action('admin_footer', 'print_some_good_old_jsd');
function print_some_good_old_jsd(){
    ?>
    <script>
        jQuery(document).ready(function($){
            $(document).on('click', '.customer_design_opener', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
             
                $.get( url, function( data ) {
                    //console.log(data);   
                    var wrapper = '';
                    if($('.admin_modal_design').length > 0){
                        wrapper = data;
                        $('.admin_modal_design').html(wrapper);
                    }
                    else{
                        wrapper = '<div class="admin_modal_design">'+data+'</div>';
                        $('body').append(wrapper);
                    }
                 
                });
            });
            $(document).on('click', '.closer_modal_design', function(e){
                console.log('asdasd');
                $(this).parent().parent('.admin_modal_design').remove();
            });
            
        })
    </script>
    <style>
        .admin_modal_design div#capture {
    max-width: 50VW;
    margin: auto;
    width: 100%;
    background: #fff;
    /* max-height: 90vh; */
    height: auto;
    position: relative;
}
.admin_modal_design {
    position: fixed;
    width: 100%;
    height: 100vh;
    display: grid;
    align-items: center;
    justify-items: center;
    top: 0;
    left: 0;
    background: #00000052;
    z-index: 999999;
}

.admin_modal_design .closer_modal_design {
    display: block !important;
    position: absolute;
    right: 10px;
    top: 50px;
    cursor:pointer;
}
.admin_modal_design .closer_modal_design{
    display: block !important;
}
    </style>
    <?php
}
