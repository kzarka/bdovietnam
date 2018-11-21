$(document).ready(function() {
    "use strict";

    var className = 'darkknight';
    var awaken = false;

    $('ul.list_class').on('click', 'a', function (){
    	awaken = false;
    	$('ul.list_class li').removeClass('on');
    	$(this).parents('li').addClass('on');
    	$('div.detail_'+className).hide();
    	className = $(this).data("class");
    	$('div.detail_'+className).show();
    	$('.char_normal img.lozad').attr('src', '');
    	let img_front = $('div.detail_'+className+' .char_normal img.front_char.lozad').attr('data-src');
    	let img_back = $('div.detail_'+className+' .char_normal img.back_char.lozad').attr('data-src');

    	$('div.detail_'+className+' .char_normal img.front_char.lozad').attr('src', img_front);
    	$('div.detail_'+className+' .char_normal img.back_char.lozad').attr('src', img_back);
    });
});