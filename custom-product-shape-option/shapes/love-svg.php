<?php
if(!isset($name_1)){
   $name_1 = 'Monikina';

}
if(!isset($b_text) || $b_text == ''){
    $b_text = 'Izbička';
}
$style = '';
if(isset($preview)){
    echo '<p><b>Preview</b></p>';
    $style = 'width:200px';
}
$lengtj_name_1 = mb_strlen($name_1);
if($lengtj_name_1 >= 9){
  $font_size = 30 * strlen($name_1);
}
else{
  $font_size = 400.4057;
}
?>

<style>
    @font-face {
  font-family: Barett-Street;
  src: url('<?php echo plugin_dir_url( __FILE__ ).'font/Barett Street.ttf'; ?>')
}
@font-face {
  font-family: ClarendonBT-Black;
  src: url('<?php echo plugin_dir_url( __FILE__ ).'font/Clarendon BT Bold.ttf'; ?>')
}
#love_shape .st0{fill:#FFFFFF;}
	#love_shape .st1{font-family:'Barett-Street';}
	#love_shape .st3{font-family:'ClarendonBT-Black';}
	#love_shape .st4{font-size:170.3462px;}
</style>

<div id="capture" style="<?php echo $style ?>" class="svg_love_container">
<img style="display:none;" class="closer_modal_design" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADXUlEQVR4nO2az0tVQRTHP5HpCyPz6cuWuQyj+icqLSt1Z9musE0mFrQqXVurQPDvKEQsKoSK7IfVpjJ1VbmIbNdTsXhx6HthqPfzvvvmXcUvXHh6Zuacc+fMmTPfubCFzYsk0AXcAiaAj8APYE2P/f4gmbU5AzQSEySA88B94DeQKfH5BUwBfUBdNRzYCVwFlhyjVoFHwA3NzAG98R16GvU/k90EHqtP0P8rMKSX4wUngUXHgJfABaAhxFh7gIvAK2e8BaCDCsLe1Lij8DVwLMLx24E3zvhjlZidfTLcFPwELgPbo1bC3zGvAGlntluiGrxV051R1jlI5XEImJPOedlQFlLOgC+AZvyhEXgi3YuKilBIOOH0DKjHP+qB506YhVoz40442WZXLTQ5UWEJoOQUGyxsH2uimDWTlk2W3Yre7IJ9wrJTXDDoLP6iQuyas09UIsWGRQ3wVraZU3lRp1LBGh8lfjgh25YKzUqfkyHiiG1OJj2br+EDNbLaKa7ol42TuRokVVavhiwADSP42SjXgPVcdnbL04dlOGH9fWBauk5lE96W0M4TYZ3w5ciIdI1mE05IeDrkoD4d6Zauu9mEnyS0U1xYJ3w50iZdxgv8h2UJk2U44cuRZun6lk24JmFtGU5E+RTauAOeoCxHrsfZkeUSQyuXMz6Qyhdam2axT0hoDGAp+HdmfKAnX/oNNkQjzzb0htglobGFYRDMjM8SpTNXMRYUjcYAxrVoTDpF4+5cjabkqdGYccUl2WhrOifOqZFxsXE9WM3Kxt5CG80XNTxO/NAp2z4Xcw0xpMazMSQf3sm2gWI6JByu1wjluGBINs2VcinUoU5pkWPVxhFgRTaVfJUx5rwBoy2rhZRIObPlTpgBEqKFMiKSq0Fi7wJmZMNMOfeMKRVmwbWC/e0LSeCpdC9EceHT6kythdlh/KyJeem0qnx/VAO3OGGWFvdq6TBq1Cg7rTjhtDdqJQknAWREKHdEuGPbVUawTwQLu6J37+3OtGfExfaH/IohqdopKDsyCqUob4sLzs6gU85kVJFaeT0s3qlNabtWT5MujXrUZtrhCYKyY6BaX0DUiRWf1BGgVIJhXVVsb7UcyIYGcbF2arunu8fvzkc19vu9jqejapvzPLEFNjj+AM/EZqOYLbGmAAAAAElFTkSuQmCC">
<svg id="love_shape" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 2267.7 2267.2" style="enable-background:new 0 0 2267.7 2267.2;" xml:space="preserve">
<path d="M1525.5,1322.2c0,12.4,0.4,24.9-0.1,37.3c-0.4,9.4-2.1,18.8-2.9,28.2c-2.3,27.7-7.4,55-15.4,81.6  c-9.1,30.2-19.8,59.9-30,89.8c-7.6,22.3-12.3,45.1-8.8,68.5c3.7,24.6,16.8,44,38,57.5c52.1,33,110.8,2.5,126.5-49.5  c6.9-22.8,2.6-46.7-4.6-69.4c-12.3-38.7-24.7-77.3-37.3-115.9c-6.9-21.4-11.4-43.1-14.3-65.5c-7.5-57.3,9.9-108,38.5-156.3  c22.9-38.7,51.8-72.7,80.7-106.8c57.9-68.6,113.5-138.7,157.5-217.5c25.3-45.3,47.2-91.9,63.1-141.3c9.6-29.9,16.6-60.5,21.7-91.6  c6.4-38.6,7.2-77.4,5.1-116c-2.4-43.1-11.4-85.3-26.6-126.1c-17.5-46.7-42.4-88.5-76.6-125.1c-35.9-38.4-78.2-67.5-126.1-88.5  c-28.1-12.3-57.4-20.5-87.6-26.7c-34.2-6.9-68.6-7.6-102.8-5.2c-38.9,2.8-76.5,12.8-113,27.4c-62.8,25.1-115.7,63.8-161,113.3  c-22.8,24.9-40.9,53.3-57.7,82.5c-4.5,7.9-10,15.4-16.1,22.1c-17.9,19.5-42.9,20.1-61.1,0.9c-10.5-11.1-19.8-23.9-27.2-37.2  c-44.1-78.4-106.7-136-188.5-173.6c-29-13.3-59-23.2-89.9-29.5c-31.4-6.4-63.6-8.8-95.6-6.2c-84.2,6.7-160.8,33.9-227.8,86.4  c-52.2,40.9-87,93.6-110,155.2c-10.4,27.9-16.7,56.6-22.3,85.7c-7.2,38.2-7.4,76.7-5.3,114.9c3.2,59,16.8,116.2,38,171.3  c22.3,57.9,51.5,112.4,85.4,164.4c40.4,62,86.1,120.1,134,176.4c23.2,27.2,45.9,54.9,68.5,82.7c14.5,17.8,24.7,38.5,29.8,60.5  c4.6,20,3.6,40.8-0.4,61.4c-7.6,39.2-25.1,74.8-38.5,111.9c-11.2,31-19.8,62.7-14.8,95.7c5.6,36.5,26.7,71.9,66.2,81.4  c22.1,5.3,43.2,0.3,60.3-15c23.5-21,35.8-47.5,36.6-79.5c0.8-32.7-9.1-62.8-20.2-92.8c-11.8-31.7-26.3-62.4-33.2-95.8  c-2.4-11.3-3.6-22.8-5-34.3c-0.2-1.3,1.6-2.8,2.6-4.3c63.8,31.5,100.1,84.6,120.1,150.5c7.7,25.2,12.7,51,12.1,77.6  c-0.5,22.9,0.6,45.9-2.4,68.5c-3.8,28.5-9.6,56.9-17,84.6c-11.2,41.7-24.1,82.9-37.1,124c-7,22.1-12.1,44.6-9.7,67.6  c4.4,41.7,32.9,72.4,70.3,82.5c50.1,13.5,103.1-19,115.2-69.3c7.5-31.4,1.8-61.4-6.8-90.7c-14.3-49.2-33.9-96.8-43.9-147.3  c-3.8-19.4-7.8-38.9-9.9-58.5c-2-19-3-38.4-1.9-57.4c1.1-18.4,5.3-36.6,8.2-54.9c1.2-0.3,2.3-0.7,3.5-1  c15.8,11.2,32.6,21.2,47.2,33.9c38.7,33.8,68.7,74.2,86.8,122.8c8.7,23.4,16.1,47.3,17.2,72.5c0.8,18.8,3.2,37.8,1.6,56.4  c-2.3,26-5.5,52.3-12.1,77.5c-12.2,46.5-27,92.2-40.9,138.2c-7.8,25.7-13.6,51.7-10.8,78.6c2.8,27.5,16.7,49.2,39.1,65.6  c51.2,37.5,126.8,11.3,144.1-53.5c5.5-20.7,4.7-41.5,1.1-62.5c-6.7-39.1-22.3-75.4-34.3-112.9c-10-31.3-19.6-62.9-23.2-95.7  c-2.4-21.8-6.4-43.7-5.7-65.5c2.2-72.4,27.1-136.2,77.1-189.6c22.1-23.6,47.2-43.1,75.7-58.4c2.8-1.5,5.9-2.4,9-3.7  c0,15.1,0.4,29.6-0.1,44c-0.4,12.1-1.4,24.3-3,36.3c-2.6,20.2-5.4,40.4-9.1,60.5c-8,43.1-23.9,83.8-38,125.1  c-8.4,24.7-14.8,50-14.3,76.6c0.7,35.5,13.4,64.6,45.4,82.5c16.4,9.1,34.6,12.2,53.3,11.2c25.8-1.3,48.9-9.6,66.4-29.3  c12.5-14.2,18.9-31.4,21.4-50.3c5.4-39.8-7.4-76.2-19.2-112.9c-12-37.2-24.4-74.3-34.9-112c-4.9-17.5-6-36.1-8.3-54.3  c-1.3-10-1.9-20.1-2-30.2c-0.5-40.1,8.7-77.6,28-112.9c23.8-43.5,57.6-76.4,101.9-98.7c2.3-1.1,4.7-2,7-3"/>
<path class="st0" d="M1614.2,881.1c-41,0.8-82,1.5-122.9,2.1c-48.4,0.7-96.7,1.4-145.1,2c-53.4,0.7-106.8,1.3-160.2,2  c-46,0.6-92,1.3-138.1,2c-30.9,0.5-61.8,1.1-92.7,2c-40,1.2-80,2.5-119.9,4.1c-24.9,1-49.7,2.2-74.6,4.1  c-17.2,1.3-34.5,2.8-51.3,6.3c-13.9,2.9-19.9,14-18.2,27.9c0.9,7.1,10.5,11.2,17.6,11.1c13.4,0,21.4-0.3,34.8-1.1  c8.4-0.5,16.8-1.5,25.2-2c24.9-1.4,49.7-2.6,74.6-4.1c19.5-1.2,39-2.6,58.5-4c19.1-1.3,38.3-2.7,57.4-4c18.5-1.3,37-2.6,55.4-4.1  c32.6-2.6,65.2-5.4,97.8-8c11.1-0.9,22.2-1.3,33.3-2.1c27.2-2,54.4-4,81.6-6c10.7-0.8,21.5-1.3,32.2-2c28.2-2,56.4-4,84.7-6  c10.7-0.8,21.5-1.5,32.2-2c16.8-0.8,33.6-1.3,50.4-2.1c43.3-2,86.7-4,130-6c1.3-0.1,2.7,0,4,0c30.6-0.7,61.1-1.1,91.7-2.2  c0.1,0,0.2,0,0.3,0c5.5-0.2,5.3-8.5-0.3-8.5c-5.8,0-13.8,0.2-24.8,0.2"/>

<text id="name_1_love_svg"  style="font-size:<?php echo $font_size?>px;"   text-anchor="middle" x="50%" y="34%" class="st0 st1 st2 name_1_love_svg"><?php echo $name_1 ?></text>
<text id="b_text" text-anchor="middle" id="b_text" x="50%" y="50%" class="st0 st3 st4"><?php echo $b_text ?></text>
</svg>
</div>
