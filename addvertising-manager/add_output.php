<?php
//var_dump($metas);
//var_dump($randomItem);
$adsense = false;
if(isset($metas['_adsense_code_banners'][0]) && $metas['_adsense_code_banners'][0] != '')
{
    $adsense = true;
    $_adsense_code_banners = $metas['_adsense_code_banners'][0];
}
$meta_box_advertiser_ID = get_post_meta($randomItem->ID,'meta_box_advertiser_ID', true);
$banner_url_width_ss = get_post_meta($randomItem->ID,'banner_url_width_ss', true);
$banner_url_open_type = get_post_meta($randomItem->ID,'banner_url_open_type', true);
$banner_url_height_ss = get_post_meta($randomItem->ID,'banner_url_height_ss', true);
$banner_url_ss_sr = get_post_meta($randomItem->ID,'banner_url_ss_sr', true);
$meta_box_campaign_ID = get_post_meta($randomItem->ID,'meta_box_campaign_ID', true);
$_thumbnail_id = get_post_meta($randomItem->ID,'_listing_image_id', true);
update_impression_data_sm_srs($randomItem->ID);
$banner_image = '';
if($_thumbnail_id)
    $banner_image = wp_get_attachment_image_src($_thumbnail_id, 'full')[0];

//var_dump($adsense);
//var_dump($banner_url_open_type);
$target= '';
if($banner_url_open_type != 'same_tab'){
    $target= '_blank';
}
//var_dump(get_post_meta($randomItem->ID, 'click_count_h_arr', true));
//meta_box_advertiser_ID
//banner_url_width_ss
//banner_url_open_type
// banner_url_height_ss
//banner_url_ss_sr
//meta_box_campaign_ID
//_thumbnail_id
if($adsense == false){
?>
<div class="add_wrapper">
    <div  class="add_content">
        <a data-tag="<?php echo $randomItem->ID ?>" class="banner_button_click" style="display: block;" target="<?php echo $target ?>" href="<?php echo esc_url($banner_url_ss_sr) ?>">
            <img class="banenr_img_ads" style="" src="<?php echo $banner_image?>" />
        </a>
    </div>
</div>
<?php
}else{ ?>
<div class="add_wrapper">
    <div  class="add_content">
        <?php echo     $_adsense_code_banners ?>
    </div>
</div>
<?php
}?>
<style>
    .add_content, .add_content a img {
    width: 100%;
    height: 100%;
}
img.banenr_img_ads{
    width: 100%;
    max-width: 100%;
}
</style>