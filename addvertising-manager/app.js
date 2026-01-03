//console.log('you got me');
jQuery(document).ready(function($){
    $('.banner_button_click').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var target = $(this).attr('target');
        var pot_id = $(this).attr('data-tag')
            var xhr = new XMLHttpRequest();
            xhr.open('POST', ajax_var.url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status >= 200 && this.status < 400) {
                    // Success!
                    if(target === '_blank') {
                        window.open(url); // Open the link in a new tab if target is _blank
                    } else {
                        window.location.href = url; // Otherwise, change the current window location to the href
                    }
                } else {
                    // Error :(
                }
            };
            xhr.send('action=increment_click_count&post_id='+pot_id);
    })
})

