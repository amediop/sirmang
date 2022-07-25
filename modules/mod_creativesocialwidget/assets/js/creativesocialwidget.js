(function($) {
$(document).ready(function() {

	$('.creativesocialwidget_hover_top .creativesocialwidget_item_wrapper').hover(function() {
		$(this).find('.creativesocialwidget_item').animate({
			top: -5
		},200);
	},function() {
		$(this).find('.creativesocialwidget_item').animate({
			top: 0
		},200);
	});
	
	$('.creativesocialwidget_hover_bounce .creativesocialwidget_item_wrapper').hover(function() {
		$(this).find('.creativesocialwidget_item').stop().animate({
			top: -6
		},250,'easeOutQuint');
	},function() {
		$(this).find('.creativesocialwidget_item').stop().animate({
			top: '0px'
		},600,'easeOutBounce');
	});
	
	$('.creativesocialwidget_hover_zoom .creativesocialwidget_item_wrapper').hover(function() {
		var anim_size = 20;
		var anim_size_margin = anim_size / 2;
		
		$(this).find('.creativesocialwidget_item').css({'z-index' : '1000'}).stop(true,true).animate({
			width: '+=' + anim_size,
			left: '-=' + anim_size_margin,
			top: '-=' + anim_size_margin
		},250,'swing');
	},function() {
		var anim_size = 20;
		var anim_size_margin = anim_size / 2;
		
		$(this).find('.creativesocialwidget_item').css({'z-index' : '10'}).stop(true,true).animate({
			width: '-=' + anim_size,
			left: '+=' + anim_size_margin,
			top: '+=' + anim_size_margin
		},250,'swing');
	});
	
	$('.creativesocialwidget_hover_flip_vertical .creativesocialwidget_item').hover(function() {
		var $anim_img = $(this).find('img');
		$anim_img.stop().animate({  borderSpacing: 180 }, {
		    step: function(now,fx) {
		      $(this).css('-webkit-transform','rotateX('+now+'deg)');
		      $(this).css('-moz-transform','rotateX('+now+'deg)'); 
		      $(this).css('-ms-transform','rotateX('+now+'deg)');
		      $(this).css('-o-transform','rotateX('+now+'deg)');
		      $(this).css('transform','rotateX('+now+'deg)');  
		    },
		    duration:400
		},'linear');
	},function() {
		var $anim_img = $(this).find('img');
		$anim_img.stop().animate({  borderSpacing: 0 }, {
		    step: function(now,fx) {
		      $(this).css('-webkit-transform','rotateX('+now+'deg)');
		      $(this).css('-moz-transform','rotateX('+now+'deg)'); 
		      $(this).css('-ms-transform','rotateX('+now+'deg)');
		      $(this).css('-o-transform','rotateX('+now+'deg)');
		      $(this).css('transform','rotateX('+now+'deg)');  
		    },
		    duration:400
		},'linear');
	});
	
	$('.creativesocialwidget_hover_flip_horizontal .creativesocialwidget_item').hover(function() {
		var $anim_img = $(this).find('img');
		$anim_img.stop().animate({  borderSpacing: 180 }, {
			step: function(now,fx) {
				$(this).css('-webkit-transform','rotateY('+now+'deg)');
				$(this).css('-moz-transform','rotateY('+now+'deg)'); 
				$(this).css('-ms-transform','rotateY('+now+'deg)');
				$(this).css('-o-transform','rotateY('+now+'deg)');
				$(this).css('transform','rotateY('+now+'deg)');  
			},
			duration:400
		},'linear');
	},function() {
		var $anim_img = $(this).find('img');
		$anim_img.stop().animate({  borderSpacing: 0 }, {
			step: function(now,fx) {
				$(this).css('-webkit-transform','rotateY('+now+'deg)');
				$(this).css('-moz-transform','rotateY('+now+'deg)'); 
				$(this).css('-ms-transform','rotateY('+now+'deg)');
				$(this).css('-o-transform','rotateY('+now+'deg)');
				$(this).css('transform','rotateY('+now+'deg)');  
			},
			duration:400
		},'linear');
	});
	
	/*SPECIAL ANIMATION LOOP*/
	
	var creativesocialwidget_special_animations = new Array();
	$('.creativesocialwidget_hover_special_animation .creativesocialwidget_item').hover(function() {
		var uniq_index = parseInt($(this).attr("uniq_index"));
		var steps = parseInt($(this).attr("steps"));
		var step_h = parseInt($(this).attr("step_h"));
		
		creativesocialwidget_make_move($(this), 'down', uniq_index, steps, step_h);
	},function() {
		var uniq_index = parseInt($(this).attr("uniq_index"));
		var steps = parseInt($(this).attr("steps"));
		var step_h = parseFloat($(this).attr("step_h"));
		
		creativesocialwidget_make_move($(this), 'up', uniq_index, steps, step_h);
	});
	
	function creativesocialwidget_make_move($t, direction, uniq_index, steps, step_h) {
		
		//initialaze timeout array
		if(typeof(creativesocialwidget_special_animations[uniq_index]) === 'undefined')
			creativesocialwidget_special_animations[uniq_index] = new Array();
		
		//reset queed animation
		creativesocialwidget_clear_timeout(uniq_index);
		
		//set/get variables
		var delay = 0;
		var delay_interval = 20;//20
		var img_size = step_h;
		var max_bottom_offset = parseInt(steps * img_size * -1);
		var backgroundPos = $t.css('background-position');
		//ie7,8 fix
		if(backgroundPos == 'undefined' || backgroundPos == null){
			backgroundPos =$t.css('background-position-x') + " " +$t.css('background-position-y');
		}
		var backgroundPos = backgroundPos.split(" ");
		var current_position = parseInt(backgroundPos[1]);
		
		//make loop
		if(direction == 'down') {
			while(current_position > max_bottom_offset) {
				current_position -= img_size;
				delay += delay_interval;
				change_back_pos($t,delay,current_position,uniq_index);
			}
		}
		else if(direction == 'up') {
			while(current_position < 0) {
				current_position += img_size;
				delay += delay_interval;
				change_back_pos($t,delay,current_position,uniq_index);
			}
		}
	}
	
	function change_back_pos($elem,del,pos,uniq_index) {
		pos = parseFloat(pos);
		var t = creativesocialwidget_special_animations[uniq_index].length;
		creativesocialwidget_special_animations[uniq_index][t] = setTimeout(function() {
			$elem.css('background-position','0px ' + pos + 'px');
		},del);
	};
	
	function creativesocialwidget_clear_timeout(uniq_index) {
		for(var ii = 0; ii <= creativesocialwidget_special_animations[uniq_index].length; ii ++) {
			clearTimeout(creativesocialwidget_special_animations[uniq_index][ii]);
		}
	}
	
})
})(creativeJ);
