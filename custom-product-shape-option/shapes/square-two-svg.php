<?php
if(!isset($name_1)){
   $name_1 = 'LENKA';

}
if(!isset($name_2)){
    $name_2 = 'KAROL';
}
if(!isset($b_text)){
    $b_text = '';
}
$style = '';
if(isset($preview)){
    echo '<p><b>Preview</b></p>';
    $style = 'width:200px';
}
$length_name_1 = mb_strlen($name_1);
if($length_name_1 > 5){
    if ($length_name_1 >= 9) {
        $font_size_name_1 = $length_name_1 * 10;
    } elseif ($length_name_1 > 7) {
        $font_size_name_1 = $length_name_1 * 15;
    } else {
        $font_size_name_1 = $length_name_1 * 20;
    }
}
else{
    $font_size_name_1 = 200;
}

$length_name_2 = mb_strlen($name_2);
if($length_name_2 > 5){
    if ($length_name_2 >= 9) {
        $font_size_name_2 = $length_name_2 * 10;
    } elseif ($length_name_2 > 7) {
        $font_size_name_2 = $length_name_2 * 15;
    } else {
        $font_size_name_2 = $length_name_2 * 20;
    }
}
else{
    $font_size_name_2 = 200;
}
?>

<style>
    @font-face {
  font-family: MinionPro-MediumCn;
  src: url('<?php echo plugin_dir_url( __FILE__ ).'font/Minion-Medium.otf'; ?>')
}

</style>

<div id="capture" style="<?php echo $style ?>" class="svg_love_container">
<img style="display:none;" class="closer_modal_design" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADXUlEQVR4nO2az0tVQRTHP5HpCyPz6cuWuQyj+icqLSt1Z9musE0mFrQqXVurQPDvKEQsKoSK7IfVpjJ1VbmIbNdTsXhx6HthqPfzvvvmXcUvXHh6Zuacc+fMmTPfubCFzYsk0AXcAiaAj8APYE2P/f4gmbU5AzQSEySA88B94DeQKfH5BUwBfUBdNRzYCVwFlhyjVoFHwA3NzAG98R16GvU/k90EHqtP0P8rMKSX4wUngUXHgJfABaAhxFh7gIvAK2e8BaCDCsLe1Lij8DVwLMLx24E3zvhjlZidfTLcFPwELgPbo1bC3zGvAGlntluiGrxV051R1jlI5XEImJPOedlQFlLOgC+AZvyhEXgi3YuKilBIOOH0DKjHP+qB506YhVoz40442WZXLTQ5UWEJoOQUGyxsH2uimDWTlk2W3Yre7IJ9wrJTXDDoLP6iQuyas09UIsWGRQ3wVraZU3lRp1LBGh8lfjgh25YKzUqfkyHiiG1OJj2br+EDNbLaKa7ol42TuRokVVavhiwADSP42SjXgPVcdnbL04dlOGH9fWBauk5lE96W0M4TYZ3w5ciIdI1mE05IeDrkoD4d6Zauu9mEnyS0U1xYJ3w50iZdxgv8h2UJk2U44cuRZun6lk24JmFtGU5E+RTauAOeoCxHrsfZkeUSQyuXMz6Qyhdam2axT0hoDGAp+HdmfKAnX/oNNkQjzzb0htglobGFYRDMjM8SpTNXMRYUjcYAxrVoTDpF4+5cjabkqdGYccUl2WhrOifOqZFxsXE9WM3Kxt5CG80XNTxO/NAp2z4Xcw0xpMazMSQf3sm2gWI6JByu1wjluGBINs2VcinUoU5pkWPVxhFgRTaVfJUx5rwBoy2rhZRIObPlTpgBEqKFMiKSq0Fi7wJmZMNMOfeMKRVmwbWC/e0LSeCpdC9EceHT6kythdlh/KyJeem0qnx/VAO3OGGWFvdq6TBq1Cg7rTjhtDdqJQknAWREKHdEuGPbVUawTwQLu6J37+3OtGfExfaH/IohqdopKDsyCqUob4sLzs6gU85kVJFaeT0s3qlNabtWT5MujXrUZtrhCYKyY6BaX0DUiRWf1BGgVIJhXVVsb7UcyIYGcbF2arunu8fvzkc19vu9jqejapvzPLEFNjj+AM/EZqOYLbGmAAAAAElFTkSuQmCC">
<svg id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.2" baseProfile="tiny" id="Layer_1" x="0px" y="0px" viewBox="0 0 2267.7 2267.2" overflow="visible" xml:space="preserve">
<path stroke="#000000" stroke-width="2.4962" stroke-miterlimit="10" d="M2101.9,1628.4H166.1c-14.4,0-26.1-11.7-26.1-26.1V656.8  c0-14.4,11.7-26.1,26.1-26.1h1935.8c14.4,0,26.1,11.7,26.1,26.1v945.6C2128,1616.8,2116.3,1628.4,2101.9,1628.4z"/>
<text id="name_1_first" text-anchor="middle"  x="33%" y="65%"  fill="#FFFFFF" font-family="'MinionPro-MediumCn'" font-size="1100.6652px"><?php echo strtoupper(substr($name_1, 0, 1))?></text>
<text id="name_2_first" text-anchor="middle"  x="71%" y="65%"  fill="#FFFFFF" font-family="'MinionPro-MediumCn'" font-size="1100.6652px"><?php echo strtoupper(substr($name_2, 0, 1))?></text>
<rect x="371.4" y="1036.3" width="1694.3" height="233.9"/>
<text id="name_1"  x="47%" y="53.5%" text-anchor="end" fill="#FFFFFF" font-family="'MinionPro-MediumCn'" font-size="<?php echo  $font_size_name_1 ?>px"><?php echo strtoupper($name_1) ?></text>
<text transform="matrix(1.1039 0 0 1 1050.0844 1211.4241)" fill="#FFFFFF" font-family="'MinionPro-MediumCn'" font-size="215.0664px"> </text>
<text transform="matrix(1.1039 0 0 1 1097.8016 1211.4241)" fill="#FFFFFF" font-family="'MinionPro-MediumCn'" font-size="215.0664px">&amp;</text>
<text transform="matrix(1.1039 0 0 1 1251.1693 1211.4241)" fill="#FFFFFF" font-family="'MinionPro-MediumCn'" font-size="215.0664px"> </text>
<text id="name_2" transform="matrix(1.1039 0 0 1 1298.8871 1211.4241)" fill="#FFFFFF" font-family="'MinionPro-MediumCn'" font-size="<?php echo $font_size_name_2?>px"><?php echo strtoupper($name_2)  ?></text>
</svg>
</div>
