$(document).ready(function() {
    "use strict";

    initClass();

    $('#new_cat_btn').on('click', function (){
    	$('#modal-add').modal('show');
    });

    $('a.btn_trigger').on('click', function (){
        let parent = $(this).parent('div');
        parent.find('.desc_normal').toggle();
        parent.find('.desc_awake').toggle();
        parent.find('.char_normal').toggle();
        parent.find('.char_awake').toggle();
        $('a.btn_black.btn_video').toggleClass('awake');
        $('span.txt_awake').toggle();
    });

    function initClass() {
        $('ul.list_class li').first().addClass('on');
    }
});