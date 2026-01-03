<?php
?>

<div style="display:none" class="popup_container">

    <div class="the_content">
        <a href="#" id="cloe_mama">&#9747;</a>
        <div class="form_div">
            <div class="input-grp">
                <label for="name_1">Vložte meno</label>
                <input class="chager_plus_pro" id="name_1_love_svg" name="name_1" type="text" value="" reduce-size="35" reduce-font="4" maxlength="10" placeholder="Monikina" />
                <span class="charCount">0/10</span>
            </div>
            <!-- <div class="input-grp">
                <label for="name_1">Please add another Name</label>
                <input id="name_1" name="name_1" type="text" value="" placeholder="Paul" />
            </div> -->
           <!--  <div class="input-grp">
                <label for="name_1">Please add Bottom Text</label>
                <input class="chager_plus_pro" id="b_text" name="b_text" type="text" value="" placeholder="Izbička" />
            </div> -->
            <div class="input-grp svg_holder_c">
                <label for="">Náhľad</label>
                <div class="svg_holder">
                    <?php require(plugin_dir_path(__FILE__) . 'love-svg.php'); ?>
                </div>
            </div>
            <input type="hidden" name="shape_name" value="Love" />
            <a href="#" id="c_add_cto_cart_btn">
            VLOŽTE DO KOŠÍKA
            </a>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        var holder_val = '';
        var holder_val2 = '';
        var prev_length = 0;
        var prev_length2 = 0;
        let prev_lengther = '';
        $(document).on('keyup', '.chager_plus_pro', function() {
            var id = $(this).attr('id');
            var value = $(this).val();
            svg_text_ement = $(this).parent().siblings('.svg_holder_c').children('.svg_holder').find('text#'+id);
            value = analyzeAndModifyString(value);
            //console.log(value);
            if (svg_text_ement.length > 0) {
                if (holder_val == "") {
                    console.log( parseFloat(svg_text_ement.css('font-size')));
                    holder_val = parseFloat(svg_text_ement.css('font-size'));
                }
              svg_text_ement.text(value);
                $(this).val(value);
                if (value.length > 8 ) {
                        console.log('reading_this');
                        //holder_val = $('text#'+id).css('font-size');
                        // if(value.length > prev_length){
                        //newFontSize = currentFontSize - 41;
                        // }
                        // else{
                        console.log(value.length );
                        if(value.length>12){
                            newFontSize = value.length*15;
                        }
                        else{
                            newFontSize = value.length*30;
                        }
                  
                        // }

                        console.log(newFontSize);
                        // Set the new font size
                      svg_text_ement.css('font-size', newFontSize + 'px');


                } else {
                    // console.log('readasthiselse');
                     console.log(holder_val);
                  svg_text_ement.css('font-size', holder_val + 'px');
                }
                const currentLength = value.length
            const maxLength = $(this).attr('maxlength'); // or use: inputField.getAttribute('maxlength')
            $(this).siblings('span.charCount').text(`${currentLength}/${maxLength}`);
            }
        })
        $(document).on('click', '#open_ib_popup', function() {
            $('body').addClass('no-scroll');
            $(this).parent().siblings('.popup_container').show();
        })
        $(document).on('click', '#cloe_mama', function() {
            console.log($(this).parent().siblings('.popup_container'));
            $(this).parent().parent('.popup_container').hide();
            $('body').removeClass('no-scroll');
        })
        $(document).on('click', '#c_add_cto_cart_btn', function() {
            //console.log($(this).parent().siblings('.popup_container'));
            $('button.single_add_to_cart_button.button').click();
        })


    })
    function analyzeAndModifyString(input) {
    // Count the number of uppercase characters in the string
    const uppercaseCount = (input.match(/[A-Z]/g) || []).length;

    // If there's more than one uppercase character, capitalize the string
    if (uppercaseCount > 1) {
        return input.charAt(0).toUpperCase() + input.slice(1).toLowerCase();
    }

    // Otherwise, return the string unchanged
    return input;
}
</script>