var $ = jQuery.noConflict();
$(document).ready(function () {

});

function get_trips_list_js(id){

    var ajaxData = {
        action : "get_trips_list_php",
        postId : id
    }

    jQuery.ajax({
        url: dataObj.ajax_url,
        type: 'post',
        data: ajaxData
    }).done(
        function(response){

            if(response !== 0 ){
                
            }
        }
    )
}