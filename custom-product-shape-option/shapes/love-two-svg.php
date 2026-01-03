<?php
if(!isset($name_1)){
   $name_1 = 'Nina';

}
if(!isset($name_2)){
    $name_2 = 'Pavol';
}
if(!isset($b_text) || $b_text == ''){
    $b_text = 'Love you to the moon';
}
$style = '';
if(isset($preview)){
    echo '<p><b>Preview</b></p>';
    $style = 'width:200px';
}
$lengtj_name_1 = mb_strlen($name_1);
if($lengtj_name_1  >= 5){
if ($lengtj_name_1  > 8) {
    $font_size_name_1 = $lengtj_name_1  * 14;
} else {
    
    if ($lengtj_name_1  == 5) {
        $font_size_name_1 = $lengtj_name_1  * 48;
    } elseif ($lengtj_name_1  == 7 || $lengtj_name_1  == 8) {
        $font_size_name_1 = $lengtj_name_1  * 23;
    } else {
        $font_size_name_1 = $lengtj_name_1  * 35;
    }
}
}
else{
	$font_size_name_1 = 277.8252;
}
$lengtj_name_2 = mb_strlen($name_2);
if($lengtj_name_2 >= 5){
	if ($lengtj_name_2 > 8) {
		$font_size_name_2 = $lengtj_name_2 * 14;
	} else {
		
		if ($lengtj_name_2 == 5) {
			$font_size_name_2 = $lengtj_name_2 * 48;
		} elseif ($lengtj_name_2 == 7 || $lengtj_name_2 == 8) {
			$font_size_name_2 = $lengtj_name_2 * 23;
		} else {
			$font_size_name_2 = $lengtj_name_2 * 35;
		}
	}
	}
	else{
		$font_size_name_2 = 277.8252;
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

#love_two_shape .st0{fill:#FFFFFF;}
		#love_two_shape .st1{fill:none;stroke:#FF0000;stroke-width:7.6501;stroke-miterlimit:10;}
		#love_two_shape .st2{font-family:'Courgette-Regular';}
		#love_two_shape .st4{fill:none;}
		#love_two_shape .st5{font-family:'MVBoli';}
		#love_two_shape .st6{font-size:118.0318px;}
		#love_two_shape .st7{stroke:#000000;stroke-width:3;stroke-miterlimit:10;}
</style>

<div id="capture" style="<?php echo $style ?>" class="svg_love_container">
<img style="display:none;" class="closer_modal_design" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADXUlEQVR4nO2az0tVQRTHP5HpCyPz6cuWuQyj+icqLSt1Z9musE0mFrQqXVurQPDvKEQsKoSK7IfVpjJ1VbmIbNdTsXhx6HthqPfzvvvmXcUvXHh6Zuacc+fMmTPfubCFzYsk0AXcAiaAj8APYE2P/f4gmbU5AzQSEySA88B94DeQKfH5BUwBfUBdNRzYCVwFlhyjVoFHwA3NzAG98R16GvU/k90EHqtP0P8rMKSX4wUngUXHgJfABaAhxFh7gIvAK2e8BaCDCsLe1Lij8DVwLMLx24E3zvhjlZidfTLcFPwELgPbo1bC3zGvAGlntluiGrxV051R1jlI5XEImJPOedlQFlLOgC+AZvyhEXgi3YuKilBIOOH0DKjHP+qB506YhVoz40442WZXLTQ5UWEJoOQUGyxsH2uimDWTlk2W3Yre7IJ9wrJTXDDoLP6iQuyas09UIsWGRQ3wVraZU3lRp1LBGh8lfjgh25YKzUqfkyHiiG1OJj2br+EDNbLaKa7ol42TuRokVVavhiwADSP42SjXgPVcdnbL04dlOGH9fWBauk5lE96W0M4TYZ3w5ciIdI1mE05IeDrkoD4d6Zauu9mEnyS0U1xYJ3w50iZdxgv8h2UJk2U44cuRZun6lk24JmFtGU5E+RTauAOeoCxHrsfZkeUSQyuXMz6Qyhdam2axT0hoDGAp+HdmfKAnX/oNNkQjzzb0htglobGFYRDMjM8SpTNXMRYUjcYAxrVoTDpF4+5cjabkqdGYccUl2WhrOifOqZFxsXE9WM3Kxt5CG80XNTxO/NAp2z4Xcw0xpMazMSQf3sm2gWI6JByu1wjluGBINs2VcinUoU5pkWPVxhFgRTaVfJUx5rwBoy2rhZRIObPlTpgBEqKFMiKSq0Fi7wJmZMNMOfeMKRVmwbWC/e0LSeCpdC9EceHT6kythdlh/KyJeem0qnx/VAO3OGGWFvdq6TBq1Cg7rTjhtDdqJQknAWREKHdEuGPbVUawTwQLu6J37+3OtGfExfaH/IohqdopKDsyCqUob4sLzs6gU85kVJFaeT0s3qlNabtWT5MujXrUZtrhCYKyY6BaX0DUiRWf1BGgVIJhXVVsb7UcyIYGcbF2arunu8fvzkc19vu9jqejapvzPLEFNjj+AM/EZqOYLbGmAAAAAElFTkSuQmCC">
<svg id="love_two_shape" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" viewBox="0 0 2267.7 2267.2" style="enable-background:new 0 0 2267.7 2267.2;" xml:space="preserve">
	<path d="M1076,2014.6c0,0,43.4,72.1,109-2.7c50.1-57.1,139.3-175.1,293.7-306.5c91.2-77.5,294.6-175.3,364.7-214  c10.7-6.3,120.8-79.8,198-167.9c58-66.2,87.1-148.6,99.4-173.3c71-143,98.6-790-427.3-885.1c-412.4-74.6-579.9,232.4-579.9,232.4  S859.5,125.5,394,314.3C146.9,414.6,47.7,726.1,81.3,996.4c23.1,185.5,135.8,344.1,232.3,419.3c51.6,40.3,118.2,86.3,191.5,127.7  c89.8,50.8,194.6,91.1,272.3,155.1C958.7,1847.5,1076,2014.6,1076,2014.6z"/>
	<path class="st0" d="M1367,1158c33,0,42.6-2.9,53-5c36.8-7.5,32.1-7.6,72.5-16.6c95.7-22.4,143.4-57,239.6-32.6  c51.1,12.9,14.5,5,65.4,18.4c53.5,9.9,63.5,19.9,137.3,19c10.4-0.4,20.8-2.8,31.2-3.7c9.2-0.8,14.7,4.2,16.5,13  c1.7,8.6-0.6,16.2-9.7,18.5c-27.8,7.1-34.8,5.1-57.9,5.3c-46.8-2.2-52.8-3.2-88-9.6c-66.3-15.8-65.8-18.2-131.8-34.6  c-53.9-13.4-90.5,8.2-144,20c-60.8,13.4-41.4,15.8-100.9,31.4c-71.1,24.9-85.4,7.5-159.2,3.6c-55.3-2.9-108.4-14.5-159.6-35.3  c-3.7-1.5-8.7-2.5-12.1-1.3c-71.6,26.1-68.8,30.4-144.2,21.3c-82.9-10.1-59.1-17.3-141.8-28.3c-78.7-10.5-138.3-29.3-215.3-5.7  c-31.8,9.7-53.5,22.8-85.5,31.8c-45.7,12.8-91.5,4.3-136.8-4.3c-52.6-11.2-55.6-13.2-82.4-19.6c-8.5-2.5-54.1-10.4-52.4-25.7  c2-17.7,12.2-18.7,26.1-15.1c44.1,11.3,46.1,11.3,79,19.2c53.8,11.4,108.4,26.7,164.5,10.6c35.6-10.2,60.6-24.9,96.5-34.5  c67.8-18.2,117.2-0.4,186,6.7c100,10.4,92.1,27.6,192.8,32.5c47.3,2.3,49.3-4.3,65.2-7.9c2.6-0.6,4.8-2.9,7.2-4.4  c-1.6-1.4-3.1-2.9-4.7-4.2c-71.6-58.7-126.7-128.5-134.2-224c-5.9-74.8,50.5-144.2,147.7-123.1c18.4,4,35.8,10.1,51.2,20.4  c8.3,5.6,14.9,5.3,22.5,0c34.9-24.1,73-31.3,112-14.2c27.4,12,42.8,37.5,51.3,65.4c24.5,80.8-8.6,145.4-59.8,204.2  c-26,29.8-59,50.9-92,71.9c-1.9,1.2-3.4,3.3-5,4.9c1.6,1,3.1,2.3,4.8,2.9c51.6,15.5,101.2,28.6,151.1,27.7 M1296.9,892.2  c0-3.5,0.1-7,0-10.5c-1.8-42.6-23.9-74.4-56.9-80c-21-3.5-39.1,8.8-58.5,13.7c-7.3,1.8-8.8,4.9-5.1,11.7  c16.1,29.3,19.5,60.6,12.8,93c-5.9,28.4-29.2,46.5-55.3,43.5c-28-3.2-43.2-21.8-43.7-53c-0.5-31.6,8-60.1,28.6-84.4  c4.1-4.8,2.1-8.6-2-10.3c-18.3-7.3-36.5-16-56.5-17c-56.9-2.8-98,45.3-87,105.5c14,76.4,57,135.1,117.3,183.2  c24.4,19.5,44.4,18.8,67.4-0.1c16.8-13.8,35.8-24.8,52.6-38.5C1260.2,1008.4,1296.9,960.3,1296.9,892.2z M1158.1,892.3  c-0.2-7.2,0.9-45.2-12.2-45.3c-11.9-0.1-19.6,35.2-20.9,43.7c-1.9,12.5-4.5,39.9,15.6,38.1C1156.2,927.4,1156,904.1,1158.1,892.3z"/>
	<path class="st0" d="M1307.1,651.8c-0.1-32.5,10.7-49.6,27.8-51.8c12-1.5,21.4,3.8,27.1,13.7c4.1,7.1,8.7,8.3,14.9,4.7  c12.4-7.2,24.6-8.6,35.3,2.2c11.6,11.8,10.8,26.5,5.2,40.3c-12.3,30.2-36.7,46.3-67.4,53.6c-8.3,2-12.3-6.5-16.9-11.5  C1317.9,686.3,1307.8,667.1,1307.1,651.8z M1405.7,640.8c0.1-16.8-15.5-12.1-24.4-6.7c-8.9,5.4-17.1,7.7-24.5-1.1  c-6.2-7.4-9.5-23.5-22.7-17.6c-10.9,4.9-12.3,21.1-11.4,31.3c1.8,18.9,16,59.9,40.9,48.1C1385,684.5,1404.4,665.5,1405.7,640.8z"/>
	<path class="st0" d="M815.7,772.7c-0.5-12.3,6.2-23.6,19.2-25.5c13.9-2,19.6,12.7,31.3,2.5c26.7-23,42.9,3.7,40.4,31.1  c-1.7,19-20.9,57.4-45,50.3C836.9,823.8,816.7,797.9,815.7,772.7z M892.1,770.9c0-9.9-6.4-21.5-16.1-11.4c-5.5,5.7-7.1,14-16.8,13.7  c-8.6-0.2-13.2-12.4-20.6-12.2c-8.4,0.2-8.4,10.9-7.1,17c2.6,12.6,17.4,35.7,31.9,37.7C881.5,818.3,892.1,784.4,892.1,770.9z"/>
	<path class="st1" d="M698.7,1200.6"/>
	<text id="name_2_love_two_svg"  text-anchor="middle" style="font-size:<?php echo $font_size_name_2 ?>px"  x="75%" y="46%" class="st0 st2 st3"><?php echo $name_2 ?></text>
	<rect x="2722.5" y="988.2" class="st4" width="112.7" height="3.1"/>
	<polygon class="st4" points="3076.2,1520.4 3082.5,1520.4 3082.5,1520.4 "/>
	<text id="name_1_love_two_svg" style="font-size:<?php echo $font_size_name_1 ?>px" text-anchor="middle"  x="25%" y="46%" class="st0 st2 st3"><?php echo $name_1 ?></text>
	<text text-anchor="middle"  x="48%" y="59%" id="b_text_love_two_svg" class="st0 st5 st6"><?php echo $b_text ?></text>
	<path class="st7" d="M1125,2045.5"/>
	</svg>
</div>
