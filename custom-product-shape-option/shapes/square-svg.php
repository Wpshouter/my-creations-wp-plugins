<?php
if(!isset($name_1)){
   $name_1 = 'Maťa';

}
if(!isset($name_2)){
    $name_2 = 'Lukáš';
}
if(!isset($b_text) || $b_text == ''){
    $b_text = 'Love you to the moon';
}
$style = '';
if(isset($preview)){
    echo '<p><b>Preview</b></p>';
    $style = 'width:200px';
}
$length_name_1 = mb_strlen($name_1);
if($length_name_1 >= 5){
  if ($length_name_1 > 8) {
      $font_size_name_1 = $length_name_1 * 14;
  } else {
      
      if ($length_name_1 == 5) {
          $font_size_name_1 = $length_name_1 * 55;
      } elseif ($length_name_1 == 7 || $length_name_1 == 8) {
          $font_size_name_1 = $length_name_1 * 23;
      } else {
          $font_size_name_1 = $length_name_1 * 35;
      }
  }
  }
  else{
    $font_size_name_1 = 240.92;
  }
  $length_name_2 = mb_strlen($name_2);
  if($length_name_2 > 5){
    if (  $length_name_2  > 8) {
      $font_size_name_2 =   $length_name_2  * 14;
    } else {
      
      if (  $length_name_2  == 5) {
        $font_size_name_2 =   $length_name_2  * 55;
      } elseif (  $length_name_2  == 7 ||   $length_name_2  == 8) {
        $font_size_name_2 =   $length_name_2  * 23;
      } else {
        $font_size_name_2 =   $length_name_2  * 35;
      }
    }
    }
    else{
      $font_size_name_2 = 240.92;
    }
?>

<style>
    @font-face {
  font-family: Courgette-Regular;
  src: url('<?php echo plugin_dir_url( __FILE__ ).'font/Courgette-Regular.ttf'; ?>')
}
@font-face {
  font-family: MVBoli;
  src: url('<?php echo plugin_dir_url( __FILE__ ).'font/mvboli.ttf'; ?>')
}

#square_svg .st0{stroke:#000000;stroke-width:2.4962;stroke-miterlimit:10;}
	#square_svg .st1{fill:#FFFFFF;}
	#square_svg .st2{font-family:'Courgette-Regular';}
	#square_svg .st5{font-family:'MVBoli';}
	#square_svg .st6{font-size:118.0318px;}
</style>

<div id="capture" style="<?php echo $style ?>" class="svg_love_container">
<img style="display:none;" class="closer_modal_design" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADXUlEQVR4nO2az0tVQRTHP5HpCyPz6cuWuQyj+icqLSt1Z9musE0mFrQqXVurQPDvKEQsKoSK7IfVpjJ1VbmIbNdTsXhx6HthqPfzvvvmXcUvXHh6Zuacc+fMmTPfubCFzYsk0AXcAiaAj8APYE2P/f4gmbU5AzQSEySA88B94DeQKfH5BUwBfUBdNRzYCVwFlhyjVoFHwA3NzAG98R16GvU/k90EHqtP0P8rMKSX4wUngUXHgJfABaAhxFh7gIvAK2e8BaCDCsLe1Lij8DVwLMLx24E3zvhjlZidfTLcFPwELgPbo1bC3zGvAGlntluiGrxV051R1jlI5XEImJPOedlQFlLOgC+AZvyhEXgi3YuKilBIOOH0DKjHP+qB506YhVoz40442WZXLTQ5UWEJoOQUGyxsH2uimDWTlk2W3Yre7IJ9wrJTXDDoLP6iQuyas09UIsWGRQ3wVraZU3lRp1LBGh8lfjgh25YKzUqfkyHiiG1OJj2br+EDNbLaKa7ol42TuRokVVavhiwADSP42SjXgPVcdnbL04dlOGH9fWBauk5lE96W0M4TYZ3w5ciIdI1mE05IeDrkoD4d6Zauu9mEnyS0U1xYJ3w50iZdxgv8h2UJk2U44cuRZun6lk24JmFtGU5E+RTauAOeoCxHrsfZkeUSQyuXMz6Qyhdam2axT0hoDGAp+HdmfKAnX/oNNkQjzzb0htglobGFYRDMjM8SpTNXMRYUjcYAxrVoTDpF4+5cjabkqdGYccUl2WhrOifOqZFxsXE9WM3Kxt5CG80XNTxO/NAp2z4Xcw0xpMazMSQf3sm2gWI6JByu1wjluGBINs2VcinUoU5pkWPVxhFgRTaVfJUx5rwBoy2rhZRIObPlTpgBEqKFMiKSq0Fi7wJmZMNMOfeMKRVmwbWC/e0LSeCpdC9EceHT6kythdlh/KyJeem0qnx/VAO3OGGWFvdq6TBq1Cg7rTjhtDdqJQknAWREKHdEuGPbVUawTwQLu6J37+3OtGfExfaH/IohqdopKDsyCqUob4sLzs6gU85kVJFaeT0s3qlNabtWT5MujXrUZtrhCYKyY6BaX0DUiRWf1BGgVIJhXVVsb7UcyIYGcbF2arunu8fvzkc19vu9jqejapvzPLEFNjj+AM/EZqOYLbGmAAAAAElFTkSuQmCC">
<svg id="square_svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 2267.7 2267.2" style="enable-background:new 0 0 2267.7 2267.2;" xml:space="preserve">
<path class="st0" d="M2126.9,1645.4H191.1c-14.4,0-26.1-11.7-26.1-26.1V673.8c0-14.4,11.7-26.1,26.1-26.1h1935.8  c14.4,0,26.1,11.7,26.1,26.1v945.6C2153,1633.8,2141.3,1645.4,2126.9,1645.4z"/>
<g>
	<path class="st1" d="M1353.1,1241.2c26.4,0,34.1-2.3,42.4-4c29.4-6,25.7-6.1,58-13.3c76.6-18,179.7-46.6,256.7-27.1   c40.9,10.3,11.6,4,52.4,14.7c21.7,4,82.1,5.3,144.4,1.6c60.3-3.6,122.4-12,151.4-12.4c8.4-0.3,16.6-2.2,25-3   c7.4-0.6,11.8,3.4,13.2,10.4c1.4,6.9-0.5,12.9-7.8,14.8c-22.2,5.7-29.3,7.9-47.8,8.1c-36,3-226.8,19.6-255,14.4   c-53-12.6-52.6-14.6-105.4-27.7c-43.1-10.7-132.8,10.8-175.6,20.2c-48.6,10.7-37.8,9.4-85.4,21.9c-56.8,20-68.3,6-127.3,2.9   c-44.2-2.3-86.7-11.6-127.7-28.3c-2.9-1.2-6.9-2-9.7-1c-57.3,20.9-55.1,24.3-115.4,17c-66.4-8.1-47.2-13.8-113.5-22.6   c-63-8.4-110.6-23.4-172.3-4.6c-25.4,7.8-42.8,18.2-68.4,25.4c-36.5,10.3-73.2,3.4-109.4-3.5c-36.8-7.8-216.9-38.3-275.7-47   c-15.5-2.3-31-4.2-46.7-4.1c-34.6,0.1-35.7-2.6-34.6-12.2c1.6-14.2,18-17,34-17c28.5,0.7,72.1,6.7,107.1,11   c30,3.7,59.9,8.6,89.5,14.8c75.2,15.8,199.6,39.9,234.1,30c28.5-8.1,48.5-19.9,77.2-27.6c54.3-14.6,93.8-0.4,148.8,5.3   c80,8.3,73.7,22.1,154.3,26c37.9,1.9,39.5-3.4,52.2-6.3c2.1-0.5,3.9-2.3,5.8-3.5c-1.3-1.1-2.5-2.3-3.8-3.4   c-57.3-46.9-101.4-102.8-107.4-179.2c-4.7-59.8,40.4-115.3,118.2-98.5c14.7,3.2,28.6,8.1,41,16.4c6.7,4.5,12,4.2,18,0   c27.9-19.3,58.4-25.1,89.6-11.4c21.9,9.6,34.2,30,41,52.4c19.6,64.6-6.9,116.3-47.9,163.4c-20.8,23.9-47.2,40.7-73.6,57.5   c-1.5,1-2.7,2.6-4,3.9c1.3,0.8,2.5,1.9,3.9,2.3c41.3,12.4,80.9,22.9,120.9,22.2 M1297.1,1028.5c0-2.8,0.1-5.6,0-8.4   c-1.4-34.1-19.1-59.5-45.6-64c-16.8-2.8-31.2,7-46.8,10.9c-5.8,1.5-7,4-4.1,9.4c12.9,23.4,15.6,48.5,10.2,74.4   c-4.7,22.8-23.4,37.2-44.3,34.8c-22.4-2.5-34.5-17.5-34.9-42.4c-0.4-25.3,6.4-48.1,22.9-67.5c3.3-3.8,1.7-6.9-1.6-8.2   c-14.7-5.8-29.2-12.8-45.2-13.6c-45.5-2.3-78.4,36.2-69.6,84.4c11.2,61.1,45.6,108.1,93.9,146.6c19.6,15.6,35.5,15,53.9-0.1   c13.4-11,28.6-19.8,42.1-30.8C1267.7,1121.5,1297,1083,1297.1,1028.5z M1186,1028.5c-0.2-5.8,0.7-36.2-9.8-36.2   c-9.5-0.1-15.7,28.2-16.7,35c-1.5,10-3.6,32,12.5,30.5C1184.5,1056.6,1184.3,1038,1186,1028.5z"/>
	<path class="st1" d="M1305.3,836.1c-0.1-26,8.5-39.7,22.2-41.4c9.6-1.2,17.1,3,21.7,11c3.3,5.7,7,6.6,12,3.7   c9.9-5.8,19.7-6.9,28.3,1.8c9.3,9.4,8.6,21.2,4.1,32.3c-9.8,24.2-29.4,37-53.9,42.9c-6.7,1.6-9.8-5.2-13.5-9.2   C1313.9,863.7,1305.8,848.4,1305.3,836.1z M1384.1,827.3c0.1-13.4-12.4-9.7-19.6-5.3c-7.1,4.3-13.7,6.2-19.6-0.9   c-4.9-5.9-7.6-18.8-18.2-14.1c-8.7,3.9-9.9,16.9-9.1,25c1.4,15.1,12.8,47.9,32.7,38.5C1367.5,862.3,1383,847.1,1384.1,827.3z"/>
	<path class="st1" d="M912.1,932.8c-0.4-9.8,5-18.9,15.3-20.4c11.1-1.6,15.7,10.1,25,2c21.3-18.4,34.3,3,32.3,24.9   c-1.4,15.2-16.7,46-36,40.2C929,973.8,912.9,953,912.1,932.8z M973.2,931.5c0-7.9-5.1-17.2-12.9-9.1c-4.4,4.6-5.7,11.2-13.5,11   c-6.9-0.2-10.6-9.9-16.5-9.8c-6.7,0.2-6.7,8.7-5.7,13.6c2.1,10.1,13.9,28.6,25.5,30.2C964.7,969.4,973.2,942.2,973.2,931.5z"/>
</g>
<text id="name_2_square_svg" style="font-size:<?php echo $font_size_name_2 ?>px"  text-anchor="middle"  x="76%" y="50%"  class="st1 st2 st3"><?php echo $name_2 ?></text>
<text id="name_1_square_svg" style="font-size:<?php echo $font_size_name_1 ?>px" text-anchor="middle"  x="26%" y="50%"  class="st1 st2 st4"><?php echo $name_1 ?></text>
<text  id="b_text_square_svg"  text-anchor="middle" id="b_text" x="50%" y="63%" class="st1 st5 st6"><?php echo $b_text ?></text>
</svg>
</div>
