$(document).ready(function() {
    "use strict";

    var className = 'darkknight';
    var awaken = false;

    initClass();

    $('ul.list_class').on('click', 'a', function (){
    	awaken = false;
    	$('ul.list_class li').removeClass('on');
    	$(this).parents('li').addClass('on');
    	$('div.detail_'+className).hide();
    	className = $(this).data("class");
    	$('div.detail_'+className).show();
    });

    $('a.btn_trigger').on('click', function (){
        let parent = $(this).parent('div');
        parent.find('.desc_normal').toggle();
        parent.find('.desc_awake').toggle();
        parent.find('.char_normal').toggle();
        parent.find('.char_awake').toggle();
    });

    function initClass() {
        $('ul.list_class li').first().addClass('on');
    }
});