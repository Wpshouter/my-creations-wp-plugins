<?php
/*
Plugin Name: Advertising Manager
Plugin URI: https://radios.altyra.com/
Description: This is a custom add manager 
Version: 1.1
Author: Jaber (blackash_web)
Author URI: https://fiverr.com/blackash_web
License: custom Lisence
Text Domain: sp_s_l_sx
*/
require plugin_dir_path(__FILE__) . 'front-end-functions.php';
add_action('init', 'create_advertisers_post_type');
function create_advertisers_post_type()
{
    $labels = array(
        'name' => 'Adzones',
        'singular_name' => 'Adzone',
        'search_items' => 'Search Adzones',
        'popular_items' => 'Popular Adzones',
        'all_items' => 'All Adzones',
        'parent_item' => 'Parent Adzone',
        'parent_item_colon' => 'Parent Adzone:',
        'edit_item' => 'Edit Adzone',
        'update_item' => 'Update Adzone',
        'add_new_item' => 'Add New Adzone',
        'new_item_name' => 'New Adzone Name',
        'menu_name' => 'Adzones',
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'adzones'), // Customize the slug as needed
    );

    register_taxonomy('adzones', 'banners', $args);

    register_post_type(
        'advertisers',
        array(
            'labels' => array(
                'name' => __('Advertisers'),
                'singular_name' => __('Advertiser'),
                'add_new'               => __('Add Advertiser', 'textdomain'),
                'add_new_item'          => __('Add New Advertiser', 'textdomain'),
                'new_item'              => __('New Advertiser', 'textdomain'),
                'edit_item'             => __('Edit Advertiser', 'textdomain'),
                'view_item'             => __('View Advertiser', 'textdomain'),
                'all_items'             => __('All Advertisers', 'textdomain'),
                'search_items'          => __('Search Advertisers', 'textdomain'),

            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'custom-fields')
        )
    );
    register_post_type(
        'campaigns',
        array(
            'labels' => array(
                'name' => __('Campaigns'),
                'singular_name' => __('Campaign'),
                'add_new'               => __('Add Campaign', 'textdomain'),
                'add_new_item'          => __('Add New Campaign', 'textdomain'),
                'new_item'              => __('New Campaign', 'textdomain'),
                'edit_item'             => __('Edit Campaign', 'textdomain'),
                'view_item'             => __('View Campaign', 'textdomain'),
                'all_items'             => __('All Campaigns', 'textdomain'),
                'search_items'          => __('Search Campaigns', 'textdomain'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'custom-fields')
        )
    );

    register_post_type(
        'banners',
        array(
            'labels' => array(
                'name' => __('Banners'),
                'singular_name' => __('Banner'),
                'add_new'               => __('Add Banner', 'textdomain'),
                'add_new_item'          => __('Add New Banner', 'textdomain'),
                'new_item'              => __('New Banner', 'textdomain'),
                'edit_item'             => __('Edit Banner', 'textdomain'),
                'view_item'             => __('View Banner', 'textdomain'),
                'all_items'             => __('All Banners', 'textdomain'),
                'search_items'          => __('Search Banners', 'textdomain'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'custom-fields'),
            'taxonomies' => array('adzones'), // Add this line
        )
    );
}
function wpb_change_title_text( $title ){
    $screen = get_current_screen();
  
    if  ( 'advertisers' == $screen->post_type || 'banners' == $screen->post_type || 'campaigns' == $screen->post_type ) {
         $title = 'Name';
    }

    
  
    return $title;
}
function add_custom_taxonomy_column($columns) {
    $columns['shortcode'] = 'Shortcode';
    return $columns;
}
add_filter('manage_edit-adzones_columns', 'add_custom_taxonomy_column');
function display_custom_taxonomy_column($content, $column_name, $term_id) {
    if ($column_name === 'shortcode') {
        // Retrieve and display data for your custom column
        // Example: Get term meta or other relevant information
        // $content = 'Your custom content here';
        $term = get_term( $term_id , 'adzones' );
        echo '[add_display location='.$term_id.']';
    }
    return $content;
}
add_filter('manage_adzones_custom_column', 'display_custom_taxonomy_column', 10, 3);
function custom_admin_post_thumbnail_html( $content ) {
    if(get_post_type(get_the_ID()) === 'banners'){
        $content = str_replace( __( 'Remove featured image' ), __( 'Change Banner image' ), $content); 
        $content = str_replace( __( 'Set featured image' ), __( 'Set Banner image' ), $content); 
    }
        return $content;
}
add_filter( 'admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html' );
add_filter( 'enter_title_here', 'wpb_change_title_text' );
function makePrintContentsSaySaved()
{
    global $pagenow;
    //var_dump( $pagenow);
    //global $post;
    //var_dump($post);
    if (
        isset($pagenow) && $pagenow == 'post-new.php'
        && isset($_GET['post_type']) && $_GET['post_type'] === 'advertisers'
    ) {
        add_filter(
            'gettext',
            function ($translated, $text_domain, $original) {
                if ($translated === 'Publish') {
                    return __('Add Advertiser', 'print-my-blog');
                }
                if ($translated === 'Update') {
                    return __('Update Advertiser', 'print-my-blog');
                }
                return $translated;
            },
            10,
            3
        );
    }
    //var_dump(get_post_type($_GET['post']));
    if (
        isset($pagenow) && $pagenow == 'post.php'
        && get_post_type($_GET['post']) === 'advertisers'
    ) {
        add_filter(
            'gettext',
            function ($translated, $text_domain, $original) {
                if ($translated === 'Publish') {
                    return __('Add Advertiser', 'print-my-blog');
                }
                if ($translated === 'Update') {
                    return __('Update Advertiser', 'print-my-blog');
                }
                return $translated;
            },
            10,
            3
        );
    }
        //banners
        if (
            isset($pagenow) && $pagenow == 'post-new.php'
             && $_GET['post_type'] === 'banners'
        ) {
            add_filter(
                'gettext',
                function ($translated, $text_domain, $original) {
                    if ($translated === 'Publish') {
                        return __('Add Banner', 'print-my-blog');
                    }
                    if ($translated === 'Update') {
                        return __('Save Banner', 'print-my-blog');
                    }
                    if ($translated === 'Featured image') {
                        return __('Banner Image', 'print-my-blog');
                    }
                    return $translated;
                },
                10,
                3
            );
        }
    
    //var_dump(get_post_type($_GET['post']));
    if (
        isset($pagenow) && $pagenow == 'post.php'
        && get_post_type($_GET['post']) === 'banners'
    ) {
        add_filter(
            'gettext',
            function ($translated, $text_domain, $original) {
                if ($translated === 'Publish') {
                    return __('Add Banner', 'print-my-blog');
                }
                if ($translated === 'Update') {
                    return __('Save Banner', 'print-my-blog');
                }
                if ($translated === 'Featured image') {
                    return __('Banner Image', 'print-my-blog');
                }
                return $translated;
            },
            10,
            3
        );
    }
        //campaigns
        if (
            isset($pagenow) && $pagenow == 'post-new.php'
            && isset($_GET['post_type']) && $_GET['post_type'] === 'campaigns'
        ) {
            add_filter(
                'gettext',
                function ($translated, $text_domain, $original) {
                    if ($translated === 'Publish') {
                        return __('Add Campaign', 'print-my-blog');
                    }
                    if ($translated === 'Update') {
                        return __('Save Campaign', 'print-my-blog');
                    }
                    return $translated;
                },
                10,
                3
            );
        }
    
    //var_dump(get_post_type($_GET['post']));
    if (
        isset($pagenow) && $pagenow == 'post.php'
        && get_post_type($_GET['post']) === 'campaigns'
    ) {
        add_filter(
            'gettext',
            function ($translated, $text_domain, $original) {
                if ($translated === 'Publish') {
                    return __('Add Campaign', 'print-my-blog');
                }
                if ($translated === 'Update') {
                    return __('Save Campaign', 'print-my-blog');
                }
                return $translated;
            },
            10,
            3
        );
    }
   
}
add_action('admin_init', 'makePrintContentsSaySaved');
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'advertisers') return false;
    if ($post_type === 'campaigns') return false;
    if ($post_type === 'banners') return false;
    return $current_status;
}
add_action('add_meta_boxes', 'advertisers_meta_box_add');
function advertisers_meta_box_add()
{
    add_meta_box('advertisers-id', 'Advertiser Details', 'advertisers_meta_box_cb', 'advertisers', 'normal', 'high');
}

function advertisers_meta_box_cb()
{
    global $post;
    $values = get_post_custom($post->ID);
    // /$name = isset($values['meta_box_name']) ? esc_attr($values['meta_box_name'][0]) : '';
    $email = isset($values['meta_box_email']) ? esc_attr($values['meta_box_email'][0]) : '';

    // echo '<p><label for="meta_box_name">Name</label> <input type="text" id="meta_box_name" name="meta_box_name" value="' . $name . '" /></p>';
    echo '<p><label for="meta_box_email">Email</label> <input type="email" id="meta_box_email" name="meta_box_email" value="' . $email . '" /></p>';
}

add_action('save_post', 'advertisers_meta_box_save');
function advertisers_meta_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    //if (isset($_POST['meta_box_name']))
    // update_post_meta($post_id, 'meta_box_name', esc_attr($_POST['meta_box_name']));
    if (isset($_POST['meta_box_email']))
        update_post_meta($post_id, 'meta_box_email', esc_attr($_POST['meta_box_email']));
    if (isset($_POST['begin_date_hour']))
        update_post_meta($post_id, 'begin_date_hour', esc_attr($_POST['begin_date_hour']));
    if (isset($_POST['end_date_hour']))
        update_post_meta($post_id, 'end_date_hour', esc_attr($_POST['end_date_hour']));


    if (isset($_POST['meta_box_campaign_ID']))
        update_post_meta($post_id, 'meta_box_campaign_ID', esc_attr($_POST['meta_box_campaign_ID']));
    if (isset($_POST['banner_url_ss_sr']))
        update_post_meta($post_id, 'banner_url_ss_sr', esc_attr($_POST['banner_url_ss_sr']));
    if (isset($_POST['banner_url_height_ss']))
        update_post_meta($post_id, 'banner_url_height_ss', esc_attr($_POST['banner_url_height_ss']));
    if (isset($_POST['banner_url_width_ss']))
        update_post_meta($post_id, 'banner_url_width_ss', esc_attr($_POST['banner_url_width_ss']));
    if (isset($_POST['banner_url_open_type']))
        update_post_meta($post_id, 'banner_url_open_type', esc_attr($_POST['banner_url_open_type']));

    if (isset($_POST['_adsense_code_banners'])) {
        $editor_content = sanitize_post_field('post_content', $_POST['_adsense_code_banners'], $post_id, 'db');
        update_post_meta($post_id, '_adsense_code_banners', $editor_content);
    }
}

add_filter('manage_banners_posts_columns', 'add_img_column', 1);
add_action('manage_banners_posts_custom_column', 'manage_img_column', 10, 2);
//add_action('manage_banners_posts_custom_column', 'manage_img_column_asas', 5, 2);
add_filter('manage_campaigns_posts_columns', 'add_img_column_campaign', 1);
add_action('manage_campaigns_posts_custom_column', 'manage_img_column_campaign', 50, 2);

add_filter('manage_advertisers_posts_columns', 'add_img_column_advertisers', 1);
add_action('manage_advertisers_posts_custom_column', 'manage_img_column_advertisers', 50, 2);
function add_img_column_advertisers($columns){
    $columns = [];
    $columns['title'] = 'Name';
    $columns['email'] = 'Email';
    return $columns;
}
function manage_img_column_advertisers($column_name, $post_id){
    if ($column_name == 'email') {
        echo get_post_meta($post_id, 'meta_box_email', true);
    }
}
function add_img_column_campaign($columns)
{
    //Title, Advertiser, Linked Banners, Status, respectively.
     
    $columns = [];
    $columns['title'] = 'Name';
    $columns['advertiser_cs'] = 'Advertiser';
    $columns['linked_banner'] = 'Linked Banner';
    $columns['status'] = 'Status';
    $columns['start_date'] = 'Start Date';
    $columns['end_date'] = 'End Date';
    //$columns['shortcode'] = 'Shortcode';
    return $columns;
}
function manage_img_column_campaign($column_name, $post_id)
{
    if ($column_name == 'advertiser_cs') {
       // echo 'asdsad';
        echo get_the_title(get_post_meta($post_id, 'meta_box_advertiser_ID', true));
    }
    if ($column_name == 'linked_banner') {
       // echo 'asdsad';
        //echo get_post_meta($post_id, 'meta_box_advertiser_ID', true);
        $args = array(
            'post_type'  => 'banners',
            'meta_query' => array(
                array(
                    'key'   => 'meta_box_campaign_ID',
                    'value' => $post_id,
                ),
            ),
            'posts_per_page' => -1
        );
        $total = get_posts($args);
        if(!empty(   $total ) && is_array($total)){
        echo count($total);
        }

    }
    if ($column_name == 'status') {
        // echo 'asdsad';
         //echo get_post_meta($post_id, 'meta_box_advertiser_ID', true);
         
         if(check_if_this_campaignr_running($post_id)){
            echo '<p style="color: #2cc24a;font-size: 16px;">Active</p>';
        }
        else{
            echo '<p style="color:red; font-size: 16px;">Terminated</p>';
        }
 
     }
     if ($column_name == 'start_date') {
        // echo 'asdsad';
         echo get_post_meta($post_id, 'begin_date_hour', true);
         
      
 
     }
     if ($column_name == 'end_date') {
        // echo 'asdsad';
         echo get_post_meta($post_id, 'end_date_hour', true);
         
      
 
     }
}
function add_img_column($columns)
{
    //var_dump($columns);
    $columns = [];
    $columns['img'] = 'Banner Image';
    $columns['title'] = 'Name';
    $columns['advertiser_custom'] = 'Advertiser';
    $columns['campaign_cl'] = 'Campaign';
    $columns['banner_status'] = 'Status';
    $columns['taxonomy-adzones'] = 'Adzones';
    $columns['statistics'] = 'Statistics';
    $columns['view'] = 'View';
    return $columns;
}
add_action('add_meta_boxes', 'add_adzones_meta_box');

function add_adzones_meta_box() {
    add_meta_box('adzones_meta_box', 'Available Adzones', 'display_adzones_meta_box', 'banners', 'side', 'core');
}

function display_adzones_meta_box($post) {
    $terms = get_terms(array(
        'taxonomy' => 'adzones',
        'hide_empty' => false,
    ));

    if (!empty($terms) && !is_wp_error($terms)) {
        echo '<ul>';
        foreach ($terms as $term) {
            echo '<li style="font-size: 16px;">' . $term->name .'<a data-txt="' . $term->name . '" href="" style="text-decoration:none" class="term_add">Add</a></li>';
        }
        echo '</ul>';
    } else {
        echo 'No adzones found.';
    }
    ?>
    <script>
        jQuery('.term_add').on('click', function(e){
            e.preventDefault();
            jQuery('input#new-tag-adzones').val(jQuery(this).attr('data-txt'));
            jQuery('input#new-tag-adzones').siblings('input.button.tagadd').click();
        });
    </script>
    <?php
}

function manage_img_column($column_name, $post_id)
{
    if ($column_name == 'img') {
        $_thumbnail_id = get_post_meta($post_id,'_listing_image_id', true);
        $banner_image = '';
        if($_thumbnail_id){
        $banner_image = wp_get_attachment_image_src($_thumbnail_id, 'full')[0];
        echo '<img style="height: 100px;
        width: 100px;" src="'.$banner_image.'"/>';
        }
        else{
            echo 'Adsense Code';
        }
    }
    if($column_name == 'banner_status'){
        if(check_banner_status_rs_tp_sm($post_id)){
            echo '<p style="color: #2cc24a;font-size: 16px;">Active</p>';
        }
        else{
            echo '<p style="color: red;font-size:16px;">Terminated</p>';
        }
    }
    if($column_name == 'statistics'){
        echo '<img style="cursor:pointer;" class="open_chart" data-id="'.$post_id.'" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABcUlEQVR4nO3WO0tcQRjG8V8RqwhauNiIlQpaahejQhori/0AQbA4TSBfwc4+ZZpcIElhvoFokTZsCi02bVJos40SNCEXIgdmYVj2XHY9ewr1gReGd17mPzPPzDDccj3AW7wO7dq0gP8h5uoE7+EUz+qEruE3ntQJncS3sOLK9DhEnj7iM8aqgs7iH/5iOaNmBz8wXxW0gaPg2xn+4E3PaZ0P0BReiVbwHZ8wHXKrOAgTSO/qFr5gP/Qn0VXqRporrW38xIsMzx7hMBp8KQK3w6RXQrsU+Hk4JFd4WlA7jhMc42EEbkU1rSJw6uVutIJNw6kQ3MAENvABv/AV7/HqBm9sLriBi3A9Uh/fYT3nJXrZE2vDgqdwHmKmxAo6EbRT4FmprZ4qgJYa6Ib1Aw+UZcHIwUmGBQODm6EojmYBeJB8ppLwPCZ92pWAF6OCbixWCMgEJ7iMtvOyYkAuuDVCwD24dbe3ut3nhzDqfOafaKT5a7N38KeMtDeOAAAAAElFTkSuQmCC">';
       // Find the maximum value to scale the chart
       $click_counts = get_post_meta($post_id, 'click_count_h_arr', true);
       $click_counts = empty($click_counts)  ? array() : $click_counts;
              // Find the maximum value to scale the chart
              $impression_counts = get_post_meta($post_id, 'impression_count_date', true);
              $impression_counts = empty($impression_counts)  ? array() : $impression_counts;
              echo '<div data-content="'.$post_id.'" style="display:none" class="uniparent">';
        
        echo '<div class="show_data_now">';
        echo '<div class="close_btn"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAi0lEQVR4nO2Wuw3AIBBDvQDM547ts0NSRUikixAfgxss0b6H4DgOODEmOJgRwAUgCaWpMDO7GgK4RfJuFgXyYQYn5NMb5wBAdlXsACnroxkol7aAl0lrguXSP9E26ZcsesraJrWJ6ThqOoqLjudERwOho2XS8UnQ8S3SMQjQMfpE57AXhNKVzBM05QWoOUelu28NyQAAAABJRU5ErkJggg=="></div>';
        echo '<p style="    font-size: 17px;
        text-align: center;">Showing Data for banner ID: <strong>'.$post_id.'</strong> and Name: <strong>'.get_the_title($post_id).'</strong></p>';
        ?>
            <table class="custom_table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Impressions</th>
            <th>Clicks</th>
        </tr>
    </thead>
    <tbody>
    <?php
       foreach ($click_counts as $date => $click_count) {
            ?>
                  <tr>
            <td><?php echo $date ?></td>
            <td><?php echo  $impression_counts[$date]  ?></td>
            <td><?php echo $click_counts[$date]?></td>
        </tr>
            <?php
       }
       ?>
           </tbody>
</table>
<?php
   echo '</div>';
       echo '</div>';
    
    }

    if($column_name == 'view'){
        $click_count = get_post_meta($post_id, 'click_count_all', true);
        $click_count = empty($click_count) ? 0 :       $click_count;
        echo $click_count;
    }
    if ($column_name == 'advertiser_custom') {
        // echo 'asdsad';
        echo get_the_title(get_post_meta($post_id, 'meta_box_advertiser_ID', true));
    }
    if ($column_name == 'campaign_cl') {
        // echo 'asdsad';
        echo get_the_title(get_post_meta($post_id, 'meta_box_campaign_ID', true));
    }
    // return $column_name;
}
function check_banner_status_rs_tp_sm($post_id){
    return check_if_this_banner_running($post_id);
}
function check_if_this_campaignr_running($id){
    $campaing_id = $id;
    $campagn_begin_date_hour = get_post_meta($campaing_id, 'begin_date_hour', true);
    $campagn_end_date_hour = get_post_meta($campaing_id, 'end_date_hour', true);
    if(    $campagn_begin_date_hour &&     $campagn_end_date_hour){
    $startDate = new DateTime($campagn_begin_date_hour);
    $endDate = new DateTime($campagn_end_date_hour);
    $now = new DateTime(); // Current date and time
    // var_dump($now);
     //var_dump($startDate);
    // var_dump($endDate);
    if ($now >= $startDate && $now <= $endDate) {
     return true;
    } else {
        return false;
    }
    }
    else{
        return false;
    }
   //echo $campagn_begin_date_hour.'<br>';
   // echo $campagn_end_date_hour;
//    / return get_post_meta($id, 'meta_box_campaign_ID', true);
}
function manage_img_column_asas($column_name, $post_id)
{

    // return $column_name;
}
// saving metabox data
add_action('save_post', function ($post_id) {

    // autosave check ...

    // nonce check ...

    // post type check ...
    $tags = isset($_POST['some_tags']) && is_array($_POST['some_tags']) ? array_map('absint', $_POST['some_tags']) : array();
    update_post_meta($post_id, 'some_tags', $tags);
});

// initalizing select2
add_action('admin_footer-post.php', function () {

?><script>
        jQuery(function($) {
            $('#some_tags').select2();
        });
    </script><?php

            });

            add_action('add_meta_boxes', 'campaign_meta_box_add');
            function campaign_meta_box_add()
            {
                add_meta_box('campaign-id', 'Campaign Details', 'campaign_meta_box_cb', 'campaigns', 'normal', 'high');
                add_meta_box('banner-id', 'Banner Details', 'banner_meta_box_callback', 'banners', 'normal', 'high');
            }
            function banner_meta_box_callback()
            {
                global $post;
                $values = get_post_custom($post->ID);
                $advertiser_ID = isset($values['meta_box_advertiser_ID']) ? esc_attr($values['meta_box_advertiser_ID'][0]) : '';

                $banner_url_ss_sr = isset($values['banner_url_ss_sr']) ? esc_attr($values['banner_url_ss_sr'][0]) : '';

                $banner_url_height_ss = isset($values['banner_url_height_ss']) ? esc_attr($values['banner_url_height_ss'][0]) : '';

                $banner_url_width_ss = isset($values['banner_url_width_ss']) ? esc_attr($values['banner_url_width_ss'][0]) : '';

                $banner_url_open_type = isset($values['banner_url_open_type']) ? esc_attr($values['banner_url_open_type'][0]) : '';

                $options =  return_advertiser_dropdown_option($advertiser_ID);
                $campaign_id = '';
                //var_dump($values['meta_box_campaign_ID']);
                if (isset($values['meta_box_campaign_ID'])) {
                    $campaign_id = '<option value="' . $values['meta_box_campaign_ID'][0] . '">' . get_the_title($values['meta_box_campaign_ID'][0]) . '</option>';
                }
                ?>
    <p class="fixer_input_cs"><label for="meta_box_advertiser_ID">Advertiser ID</label> <select style="    width: 200px;" id="meta_box_advertiser_ID" name="meta_box_advertiser_ID"><?php echo $options ?></select></p>

    <p class="fixer_input_cs"><label for="meta_box_campaign_ID">Campaign ID</label> <select style="    width: 200px;" id="meta_box_campaign_ID" name="meta_box_campaign_ID"><?php echo    $campaign_id ?></select></p>

    <p style="display:none" class="fixer_input_cs"><label for="banner_url_height_ss">Height</label> <input type="number" style="    width: 200px;" id="banner_url_height_ss" name="banner_url_height_ss" value="<?php echo    $banner_url_height_ss ?>" /></p>

    <p style="display:none" class="fixer_input_cs"><label for="banner_url_width_ss">Width</label> <input type="number" style="    width: 200px;" id="banner_url_width_ss" name="banner_url_width_ss" value="<?php echo    $banner_url_width_ss ?>" /></p>

    <p class="fixer_input_cs"><label for="banner_url_ss_sr">Link URL</label> <input type="url" style="    width: 200px;" id="banner_url_ss_sr" name="banner_url_ss_sr" value="<?php echo    $banner_url_ss_sr ?>" /></p>

    <p class="fixer_input_cs"><label for="banner_url_open_type">Link Target</label> <select style="    width: 200px;" id="banner_url_open_type" name="banner_url_open_type">
            <option <?php if ($banner_url_open_type == 'new_tab') echo 'selected'; ?> value="new_tab">New Tab</option>
            <option <?php if ($banner_url_open_type == 'new_window') echo 'selected'; ?> value="new_window">New Window</option>
            <option <?php if ($banner_url_open_type == 'same_tab') echo 'selected'; ?> value="same_tab">Current Tab</option>
        </select></p>


    <?php
                // Retrieve the saved value (if any)
                $adsense_cde = get_post_meta($post->ID, '_adsense_code_banners', true);

                echo '<div class="fixer_input_cs"><label for="_adsense_code_banners">Adsense Code</label>';
                // Output the WordPress editor
                wp_editor($adsense_cde, '_adsense_code_banners', [
                    'media_buttons' => false, // Show the Add Media button
                    'textarea_rows' => 15, // Set the number of rows for the textarea
                    'tinymce' => false, // Enable TinyMCE (Visual mode)
                    'quicktags' => false, // Show Visual and Text tabs
                ]);
                echo '</div>';
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("#meta_box_advertiser_ID").change(function() {
                var advertiser_ID = $(this).val();
                console.log(advertiser_ID);
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php') ?>',
                    data: {
                        'action': 'get_campaing_html',
                        'advertiser_ID': advertiser_ID
                    },
                    success: function(data) {
                        // This is where you can handle the HTML response
                        console.log(data);
                        $('#meta_box_campaign_ID').html(data);
                    },
                    error: function(errorThrown) {
                        console.log(errorThrown);
                    }
                });
            });
        });
    </script>
    <style>
        .fixer_input_cs {
            width: 100%;
            display: grid;
            grid-template-columns: 100px auto;
            max-width: 300px;
            align-items: center;
        }

        div.fixer_input_cs {
            width: 100% !important;
            max-width: 90% !important;
            align-items: flex-start;
            margin-top: 15px;
        }
    </style>

<?php
            }
            function campaign_meta_box_cb()
            {
                global $post;
                $values = get_post_custom($post->ID);
                $advertiser_ID = isset($values['meta_box_advertiser_ID']) ? esc_attr($values['meta_box_advertiser_ID'][0]) : '';
                $options =  return_advertiser_dropdown_option($advertiser_ID);
                echo '<p class="fixer_input_cs" ><label for="meta_box_advertiser_ID">Advertiser ID</label> <select style="    width: 200px;" id="meta_box_advertiser_ID" name="meta_box_advertiser_ID" value="' . $advertiser_ID . '">' . $options . '</select></p>';
                $begin = isset($values['begin_date_hour']) ? esc_attr($values['begin_date_hour'][0]) : '';
                $end = isset($values['end_date_hour']) ? esc_attr($values['end_date_hour'][0]) : '';
?>
    <style>
        p.fixer_input_cs {
            width: 100%;
            display: grid;
            grid-template-columns: 100px auto;
            max-width: 300px;
            align-items: center;
        }
    </style>
    <p class="fixer_input_cs">
        <label for="begin_date_hour">Begin DateTime</label>
        <input type="datetime-local" name="begin_date_hour" id="begin_date_hour" value="<?php echo     $begin ?>" />
    </p>
    <p class="fixer_input_cs">
        <label for="end_date_hour">End DateTime</label>
        <input type="datetime-local" name="end_date_hour" id="end_date_hour" value="<?php echo     $end ?>" />
    </p>
<?php
            }

            add_action('save_post', 'campaign_meta_box_save');
            function campaign_meta_box_save($post_id)
            {
                if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
                if (!current_user_can('edit_post', $post_id)) return;

                if (isset($_POST['meta_box_advertiser_ID'])) {
                    $advertiser_ID = sanitize_text_field($_POST['meta_box_advertiser_ID']);
                    $args = array(
                        'post_type' => 'advertisers',
                        'name' => $advertiser_ID,
                        'post_status' => 'publish',
                        'numberposts' => 1
                    );
                    $advertiser_posts = get_posts($args);
                    if ($advertiser_posts) {
                        update_post_meta($post_id, 'meta_box_advertiser_ID', $advertiser_posts[0]->ID);
                    } else if (is_numeric($advertiser_ID)) {
                        update_post_meta($post_id, 'meta_box_advertiser_ID', $advertiser_ID);
                    }
                }
            }
            function return_advertiser_dropdown_option($exisint)
            {
                $args = array(
                    'post_type' => 'advertisers',
                    'post_status' => 'publish',
                    'numberposts' => -1
                );
                $advertiser_posts = get_posts($args);
                $html = '<option value="">Select Advertiser</option>';
                foreach ($advertiser_posts as $single_post) {
                    $newt = '';
                    if ($exisint == $single_post->ID) {
                        $newt = 'selected';
                    }
                    $html .=  '<option ' .   $newt . ' value="' . $single_post->ID . '">' . $single_post->post_title . '</option>';
                }
                return $html;
            }
            add_action('wp_ajax_get_campaing_html', 'get_advertiser_html');
            function get_advertiser_html()
            {
                $advertiser_ID = $_REQUEST['advertiser_ID'];
                //echo $advertiser_ID;
                //var_dump($advertiser_ID);
                $args = array(
                    'post_type'  => 'campaigns',
                    'meta_query' => array(
                        array(
                            'key'   => 'meta_box_advertiser_ID',
                            'value' =>  $advertiser_ID,
                        ),
                    ),
                );

                $advertiser_posts = get_posts($args);
                $html = '<option value="">Select Campaign</option>';
                foreach ($advertiser_posts as $single_post) {
                    // Do something with $post
                    $newt = '';
                    //if($exisint == $single_post->ID){
                    //$newt = 'selected';
                    // }
                    $html .=  '<option ' .   $newt . ' value="' . $single_post->ID . '">' . $single_post->post_title . '</option>';
                }
                echo $html;

                wp_die(); // this is required to terminate immediately and return a proper response
            }

            add_action( 'add_meta_boxes', 'listing_image_add_metabox' );
            function listing_image_add_metabox () {
                add_meta_box( 'whats_in_the_box', __( 'Banner Image', 'text-domain' ), 'listing_image_metabox_calbasa_asas', 'banners', 'side', 'low');
            }
            
            function listing_image_metabox_calbasa_asas ( $post ) {
                global $content_width, $_wp_additional_image_sizes;
            
                $image_id = get_post_meta( $post->ID, '_listing_image_id', true );
            
                $old_content_width = $content_width;
                $content_width = 254;
            
                if ( $image_id && get_post( $image_id ) ) {
            
                    if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
                        $thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
                    } else {
                        $thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
                    }
            
                    if ( ! empty( $thumbnail_html ) ) {
                        $content = $thumbnail_html;
                        $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_listing_image_button" >' . esc_html__( 'Remove banner image', 'text-domain' ) . '</a></p>';
                        $content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="' . esc_attr( $image_id ) . '" />';
                    }
            
                    $content_width = $old_content_width;
                } else {
            
                    $content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
                    $content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set banner image', 'text-domain' ) . '" href="javascript:;" id="upload_listing_image_button" id="set-banner-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'text-domain' ) . '" data-uploader_button_text="' . esc_attr__( 'Set banner image', 'text-domain' ) . '">' . esc_html__( 'Set banner image', 'text-domain' ) . '</a></p>';
                    $content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="" />';
            
                }
                ?>
                <script>
                    jQuery(document).ready(function($) {
            
            // Uploading files
            var file_frame;
            
            jQuery.fn.upload_listing_image = function( button ) {
                var button_id = button.attr('id');
                var field_id = button_id.replace( '_button', '' );
            
                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                  file_frame.open();
                  return;
                }
            
                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                  title: jQuery( this ).data( 'uploader_title' ),
                  button: {
                    text: jQuery( this ).data( 'uploader_button_text' ),
                  },
                  multiple: false
                });
            
                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                  var attachment = file_frame.state().get('selection').first().toJSON();
                  jQuery("#"+field_id).val(attachment.id);
                  jQuery("#whats_in_the_box img").attr('src',attachment.url);
                  jQuery( '#whats_in_the_box img' ).show();
                  jQuery( '#' + button_id ).attr( 'id', 'remove_listing_image_button' );
                  jQuery( '#remove_listing_image_button' ).text( 'Remove banner image' );
                });
            
                // Finally, open the modal
                file_frame.open();
            };
            
            jQuery('#whats_in_the_box').on( 'click', '#upload_listing_image_button', function( event ) {
                event.preventDefault();
                jQuery.fn.upload_listing_image( jQuery(this) );
            });
            
            jQuery('#whats_in_the_box').on( 'click', '#remove_listing_image_button', function( event ) {
                event.preventDefault();
                jQuery( '#upload_listing_image' ).val( '' );
                jQuery( '#whats_in_the_box img' ).attr( 'src', '' );
                jQuery( '#whats_in_the_box img' ).hide();
                jQuery( this ).attr( 'id', 'upload_listing_image_button' );
                jQuery( '#upload_listing_image_button' ).text( 'Set banner image' );
            });
            
            });
                </script>
                <?php
                echo $content;
            }
            
            add_action( 'save_post', 'listing_image_save', 10, 1 );
            function listing_image_save ( $post_id ) {
                if( isset( $_POST['_listing_cover_image'] ) ) {
                    $image_id = (int) $_POST['_listing_cover_image'];
                    update_post_meta( $post_id, '_listing_image_id', $image_id );
                }
            }
            
add_action('admin_menu', 'group_custom_post_types');

function group_custom_post_types() {
    // Remove the default menu items
    remove_menu_page('edit.php?post_type=advertisers');
    remove_menu_page('edit.php?post_type=campaigns');
    remove_menu_page('edit.php?post_type=banners');

    // Add a new top-level menu
    add_menu_page(
        '',
        'Ad Manager',
        'edit_posts',
        'advertising_manager',
        '',
        'dashicons-money-alt',
        5
    );

    // Add each custom post type as a submenu
    add_submenu_page(
        'advertising_manager',
        'Advertisers',
        'Advertisers',
        'edit_posts',
        'edit.php?post_type=advertisers'
    );

    add_submenu_page(
        'advertising_manager',
        'Campaigns',
        'Campaigns',
        'edit_posts',
        'edit.php?post_type=campaigns'
    );

    add_submenu_page(
        'advertising_manager',
        'Banners',
        'Banners',
        'edit_posts',
        'edit.php?post_type=banners'
    );
    add_submenu_page(
        'advertising_manager',
        'Adzones',
        'Adzones',
        'edit_posts',
        'edit-tags.php?taxonomy=adzones&post_type=banners'
    );
    remove_submenu_page('advertising_manager', 'advertising_manager');

}
function my_plugin_enqueue_script_sp_srasd() {
    // Replace 'my-script' with a unique handle for your script.
    // Replace 'path/to/script.js' with the path to your JavaScript file.
    // The path should be relative to the root directory of your plugin.
    wp_enqueue_script('my-script-plug-add', plugins_url('app.js', __FILE__), array('jquery'), '1.0', true);
    wp_localize_script('my-script-plug-add', 'ajax_var', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajaxnonce_data_click_check')
        ));
}
add_action('wp_enqueue_scripts', 'my_plugin_enqueue_script_sp_srasd');
add_action('admin_footer', 'write_some_good_ol_js');
function write_some_good_ol_js($hook){
    global $post;
    $screen = get_current_screen();

    // Now you can access the hook suffix
    $hook_suffix = $screen->id;
// /var_dump($hook_suffix);
    if ($hook_suffix == 'edit-banners' && $post->post_type == 'banners') {
        ?>
        <script>
            jQuery(document).ready(function($){
                $('.open_chart').on('click', function(e){
                    e.preventDefault();
                    var dtatarget = $(this).attr('data-id');
                    $('.uniparent[data-content="'+dtatarget+'"]').show();
                });
                $('.close_btn').on('click', function(){
                    $(this).parent().parent().hide();
                })
            })
        </script>
        <script>
            //console.log('boss I\'m here gos');

        </script>
        <style>
table.custom_table {
    border-collapse: collapse;
    width: 100%;
}

table.custom_table th, table.custom_table td {
    border: 1px solid #000;
    padding: 10px;
    text-align: left;
}

table.custom_table th {
    background-color: #f2f2f2;
}
table.custom_table tr {
    border-bottom: 1px solid;
}
.show_data_now {
    /* max-width: 80VW; */
    margin: auto;
    /* padding: 10vh; */
    background: #fff;
    /* border: 1px solid; */
    /* padding-left: 30vh; */
    width: 65VW;
    height: auto;
    overflow: auto;
    position:relative;
}
.uniparent {
    position: fixed;
    width: 100%;
    height: 100%;
    background: #ffffffc7;
    left: 0;
    top: 0;
    display: grid;
    align-items: center;
    overflow: auto;
    justify-content: center;
}
.close_btn {
    position: absolute;
    right: 0;
    top: 0;
    cursor: pointer;
}
        </style>
        <?php
    }
}

//add_action('admin_enqueue_scripts', 'my_plugin_enqueue_scripts');
function modifyPlainText_st_ver($input) {
    // Define regular expression patterns for shortcodes
    $pattern = '/\(row|text)\\[\/\1\]/s';

    // Find all matches
    preg_match_all($pattern, $input, $matches);

    // Process each match
    foreach ($matches[2] as $plainText) {
        // Modify the plain text (e.g., add a prefix)
        $modifiedText = 'Modified: ' . $plainText;

        // Replace the original plain text with the modified version
        $input = str_replace($plainText, $modifiedText, $input);
    }

    return $input;
}