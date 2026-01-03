<?php
add_shortcode('addcampaign', 'display_Ads_system_sdadas');
function display_Ads_system_sdadas($atts, $content, $tag){
    $atts = shortcode_atts( array(
		'id' => '',
	), $atts, 'addcampaign' );

	$id = $atts['id'];
    //return get_current_blog_id();
    //var_dump(get_current_blog_id());
    switch_to_blog(1);
    $banners = get_ad_manager_banners_ss_Sf($id);
    $randomIndex = array_rand($banners);

    // Retrieve the random item
    $randomItem = $banners[$randomIndex];
    //var_dump($randomItem->ID);
    $metas = get_post_custom($randomItem->ID);
    ob_start();
    if(!empty($banners)){
        require plugin_dir_path(__FILE__).'add_output.php';
    }
    restore_current_blog();
    return ob_get_clean();
    //return $id;
}
function get_ad_manager_banners_ss_Sf($id){
    $args = array(
        'post_type' => 'banners',
        'meta_key' => 'meta_box_campaign_ID',
        'meta_value' => $id,
        'posts_per_page' => -1, // Retrieve all matching posts
    );
    
    $posts = get_posts($args);
    
   return $posts;
}
add_shortcode('add_display', 'sss_str_aloca_Add_runner');
function sss_str_aloca_Add_runner($atts, $content, $tag){
    $atts = shortcode_atts( array(
		'location' => '',
	), $atts, 'addcampaign' );

	$id = $atts['location'];
    switch_to_blog(1);
    $args = array(
        'post_type' => 'banners', // Replace with your actual custom post type
        'tax_query' => array(
            array(
                'taxonomy' => 'adzones', // Replace with your actual taxonomy
                'field'    => 'term_id',
                'terms'    => $id, // Replace $id with the desired term ID
            ),
        ),
    );
    
    $query = get_posts($args);
    $banners = [];
    if(!empty($query)){
        foreach($query as $single_posts){
            $id = $single_posts->ID;
            //var_dump(check_if_this_banner_running($id));
            if(check_if_this_banner_running($id)){
                array_push($banners, $id);
            }
        }
    }
    if(!empty(    $banners) && is_array( $banners)){
        //var_dump( $banners);
        $randomIndex = array_rand($banners);
        $randomItem = $banners[$randomIndex];
        $randomItem = get_post($randomItem);
        $metas = get_post_custom($randomItem->ID);
        ob_start();
        if(!empty($banners)){
            require plugin_dir_path(__FILE__).'add_output.php';
        }
        restore_current_blog();
        return ob_get_clean();
    }
}
function check_if_this_banner_running($id){
    $campaing_id = get_post_meta($id, 'meta_box_campaign_ID', true);
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
//function get
function update_impression_data_sm_srs($banner_id){
    $impression_count = get_post_meta($banner_id, 'impression_count', true);
    $impression_count = empty($impression_count) ? 1 : $impression_count + 1;


    update_post_meta($banner_id, 'impression_count', $impression_count);


    $impression_count_date = get_post_meta($banner_id, 'impression_count_date', true);
    $impression_count_date = empty($impression_count_date)  ? array() : $impression_count_date;
    $date = date('Y-m-d');
    // If there's already a count for today, increment it, otherwise set it to 1
    if (isset($impression_count_date[$date])) {
     $impression_count_date[$date]++;
    } else {
        $impression_count_date[$date] = 1;
    }
    update_post_meta($banner_id, 'impression_count_date', $impression_count_date);
    return true;
}
function increment_click_count() {
    switch_to_blog(1);
    $post_id = sanitize_text_field($_POST['post_id']);
    $click_count_all = get_post_meta($post_id, 'click_count_all', true);
    $click_count_all = empty($click_count_all) ? 1 : $click_count_all + 1;
    update_post_meta($post_id, 'click_count_all', $click_count_all);
    $click_count = get_post_meta($post_id, 'click_count_h_arr', true);
    $click_count = empty($click_count)  ? array() : $click_count;
    $date = date('Y-m-d');
       // If there's already a count for today, increment it, otherwise set it to 1
       if (isset($click_count[$date])) {
        $click_count[$date]++;
    } else {
        $click_count[$date] = 1;
    }
    update_post_meta($post_id, 'click_count_h_arr', $click_count);
    restore_current_blog();
    wp_die(); // this is required to terminate immediately and return a proper response
}
add_action('wp_ajax_increment_click_count', 'increment_click_count');
add_action('wp_ajax_nopriv_increment_click_count', 'increment_click_count');