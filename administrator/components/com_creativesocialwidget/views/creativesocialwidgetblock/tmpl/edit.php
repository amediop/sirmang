<?php
/**
 * Joomla! component creativesocialwidget
 *
 * @version $Id: default.php 2012-04-05 14:30:25 svn $
 * @author creative-solutions.net
 * @package Creative Social Widget
 * @subpackage com_creativesocialwidget
 * @license GNU/GPL
 *
 */

// no direct access
defined('_JEXEC') or die('Restircted access');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<script type="text/javascript">
Joomla.submitbutton = function(task) {
	var form = document.adminForm;
	if (task == 'creativesocialwidgetblock.cancel') {
		submitform( task );
	}
	else {
		if (form.creativesocialwidget_name.value != ""){
			form.creativesocialwidget_name.style.border = "1px solid green";
		} 
		
		if (form.creativesocialwidget_name.value == ""){
			form.creativesocialwidget_name.style.border = "1px solid red";
			form.creativesocialwidget_name.focus();
		} 
		else {
			submitform( task );
		}
	}
	
}
</script>

<?php if(true) {//////////////////////////////////////////////////////////////////////////////////////Joomla3.x/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<?php 
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
//JHtml::_('formbehavior.chosen', 'select');

$document = JFactory::getDocument();
$db = JFactory::getDBO();

//get all parameters
//global options
$id_share = $this->item->id == 0 ? 1 : (int) $this->item->id;
$query = 'SELECT * FROM `#__creativesocialwidget_blocks` WHERE id = \''.$id_share.'\'';
$db->setQuery($query);
$creativesocialwidget_options = $db->loadAssoc();

$ssw_size =  $this->item->id == 0 ? 1 : (int)$creativesocialwidget_options['size'];
$ssw_id_template = $this->item->id == 0 ? 1 : (int)$creativesocialwidget_options['id_template'];
$ssw_animation = $this->item->id == 0 ? 2 : (int)$creativesocialwidget_options['animation'];
$ssw_icons_offset =  $this->item->id == 0 ? '4px 4px 4px 4px' : stripslashes($creativesocialwidget_options['icons_offset']);
$ssw_type =  $this->item->id == 0 ? 0 : (int)$creativesocialwidget_options['type'];
$ssw_align =  $this->item->id == 0 ? 0 : (int)$creativesocialwidget_options['align'];
$ssw_fixed_place =  $this->item->id == 0 ? 1 : (int)$creativesocialwidget_options['fixed_place'];
$ssw_fixed_top_offset = $this->item->id == 0 ? 10 : (int)$creativesocialwidget_options['fixed_top_offset'];
$ssw_fixed_corner_offset = $this->item->id == 0 ? 10 : (int)$creativesocialwidget_options['fixed_corner_offset'];
$ssw_fixed_content_width = $this->item->id == 0 ? 960 : (int)$creativesocialwidget_options['fixed_content_width'];
$ssw_wrapper_width = $this->item->id == 0 ? '100%' : stripslashes($creativesocialwidget_options['wrapper_width']);
$ssw_wrapper_offset = $this->item->id == 0 ? '5px 5px 5px 5px' : stripslashes($creativesocialwidget_options['wrapper_offset']);
$ssw_wrapper_color =  $this->item->id == 0 ? '#ffffff' : stripslashes($creativesocialwidget_options['wrapper_color']);
$ssw_wrapper_template = $this->item->id == 0 ? 0 : (int)$creativesocialwidget_options['wrapper_template'];
$ssw_wrapper_animate = $this->item->id == 0 ? 1 : (int)$creativesocialwidget_options['wrapper_animate'];

$icons_wrapper_animate_class = $ssw_wrapper_animate == 0 ? 'creativesocialwidget_wrapper_animate' : '';

$wrapper_background_color_css = in_array($ssw_wrapper_template, array(110,111,112,113,114,115,999)) ? 'background-color: ' . $ssw_wrapper_color : '';

$ssw_animation_imgname = $ssw_animation == 5 ? 'special' : 'normal';

$sizes_array = array(0 => 24, 1 => 32, 2 => 40, 3 => 48, 4 => 56, 5 => 64);
$icons_width = $sizes_array[$ssw_size];
$icons_width_max_size = 64;

$icons_height = $icons_width;
if($ssw_id_template == 1) {
	$icons_special_animation_steps = 5;
}
elseif($ssw_id_template == 2) {
	$icons_special_animation_steps = 5;
	switch ($icons_width) {
		case 24:
			$icons_height = 21;
			break;
		case 32:
			$icons_height = 28;
			break;
		case 40:
			$icons_height = 34;
			break;
		case 48:
			$icons_height = 40;
			break;
		case 56:
			$icons_height = 47;
			break;
		case 64:
			$icons_height = 55;
			break;
	}
}
elseif($ssw_id_template == 3) {
	$icons_special_animation_steps = 4;
}
elseif($ssw_id_template == 4) {
	$icons_special_animation_steps = 5;
}
elseif($ssw_id_template == 5) {
	$icons_special_animation_steps = 5;
}

//render type
$icons_render_type = $ssw_type;//0 - normal, 1 - fixed
$icons_render_type_class = $icons_render_type == 0 ? 'creativesocialwidget_normal_view' : 'creativesocialwidget_fixed_view';

//normal view options
//0 - center, 1 - left, 2 - right;
$icons_align_class = $ssw_align == 0 ? 'creativesocialwidget_wrapper_aligned_center' : ($ssw_align == 1 ? 'creativesocialwidget_wrapper_aligned_left' : 'creativesocialwidget_wrapper_aligned_right');

$icons_hover_animation_type = $ssw_animation;
switch ($icons_hover_animation_type) {
	case 0:
		$icons_hover_animation_type_class = 'creativesocialwidget_hover_top';
		break;
	case 1:
		$icons_hover_animation_type_class = 'creativesocialwidget_hover_bounce';
		break;
	case 2:
		$icons_hover_animation_type_class = 'creativesocialwidget_hover_zoom';
		break;
	case 3:
		$icons_hover_animation_type_class = 'creativesocialwidget_hover_flip_vertical';
		break;
	case 4:
		$icons_hover_animation_type_class = 'creativesocialwidget_hover_flip_horizontal';
		break;
	case 5:
		$icons_hover_animation_type_class = 'creativesocialwidget_hover_special_animation';
		break;
}

//fixed view options
$creativesocialwidget_fixed_top_offset = $ssw_fixed_top_offset;
$creativesocialwidget_fixed_corner_offset = $ssw_fixed_corner_offset;
$creativesocialwidget_fixed_content_width = $ssw_fixed_content_width;

$creativesocialwidget_fixed_render_place = $ssw_fixed_place; //0 - left, 1 - right, 2 - near_content_left, 3 - near content right
switch ($creativesocialwidget_fixed_render_place) {
	case 0:
		$creativesocialwidget_fixed_render_place_css = 'left: '.$creativesocialwidget_fixed_corner_offset.'px; top: '.$creativesocialwidget_fixed_top_offset.'px;position: absolute !important;';
		break;
	case 1:
		$creativesocialwidget_fixed_corner_offset_backend = $creativesocialwidget_fixed_corner_offset + 15;
		$creativesocialwidget_fixed_render_place_css = 'right: '.$creativesocialwidget_fixed_corner_offset_backend.'px; top: '.$creativesocialwidget_fixed_top_offset.'px;;position: absolute !important;';
		break;
	case 2:
		//$mrg = (int)($ssw_fixed_content_width / 2 + 80) * -1;
		$mrg = -390;
		$creativesocialwidget_fixed_render_place_css = 'left: 50%;margin-left: '.$mrg.'px; top: '.$creativesocialwidget_fixed_top_offset.'px;;position: absolute !important;';
		break;
	case 3:
		//$mrg = (int)($ssw_fixed_content_width / 2 + 80) * -1;
		$mrg = -390;
		$creativesocialwidget_fixed_render_place_css = 'right: 50%;margin-right: '.$mrg.'px; top: '.$creativesocialwidget_fixed_top_offset.'px;;position: absolute !important;';
		break;
}
//add scripts, styles
$document = JFactory::getDocument();

$version = '1.0.2';
$cssFile = JURI::base(true).'/../modules/mod_creativesocialwidget/assets/css/main.css?version='.$version;
$document->addStyleSheet($cssFile, 'text/css', null, array());

$cssFile = JURI::base(true).'/components/com_creativesocialwidget/assets/css/colorpicker.css';
$document->addStyleSheet($cssFile, 'text/css', null, array());

$cssFile = JURI::base(true).'/components/com_creativesocialwidget/assets/css/layout.css';
$document->addStyleSheet($cssFile, 'text/css', null, array());

$cssFile = JURI::base(true).'/../modules/mod_creativesocialwidget/assets/css/wrapper_templates.css?version='.$version;
$document->addStyleSheet($cssFile, 'text/css', null, array());

$jsFile = JURI::base(true).'/components/com_creativesocialwidget/assets/js/creativelib.js';
$document->addScript($jsFile);

$jsFile = JURI::base(true).'/components/com_creativesocialwidget/assets/js/creativelib-ui.js';
$document->addScript($jsFile);

$jsFile = JURI::base(true).'/components/com_creativesocialwidget/assets/js/colorpicker.js';
$document->addScript($jsFile);

$jsFile = JURI::base(true).'/../modules/mod_creativesocialwidget/assets/js/creativesocialwidget.js?version='.$version;
$document->addScript($jsFile);

if(JV == 'j2') {
	echo '<style>

	</style>';
}
else {
	echo '<style>
	.colorpicker input {
	background-color: transparent !important;
	border: 1px solid transparent !important;
	position: absolute !important;
	font-size: 10px !important;
	font-family: Arial, Helvetica, sans-serif !important;
	color: #898989 !important;
	top: 4px !important;
	right: 11px !important;
	text-align: right !important;
	margin: 0 !important;
	padding: 0 !important;
	height: 11px !important;
	outline: none !important;
	box-shadow: none !important;
	width: 32px !important;
	height: 12px !important;
	top: 2px !important;
}
.colorpicker_hex input {
width: 38px !important;
right: 6px !important;
}
</style>';
}

$query = 'SELECT '.
		'sp.id id_link, '.
		'sp.id_type id_type, '.
		'sp.name link_name, '.
		'sp.link link_url, '.
		'sa.name type_name, '.
		'sa.url type_url '.
		'FROM '.
		'`#__creativesocialwidget_items` sp '.
		'JOIN '.
		'`#__creativesocialwidget_link_types` sa ON sa.id = sp.id_type '.
		'WHERE sp.published = \'1\' AND sp.id_share = \''.$id_share.'\' ' .
		'ORDER BY sp.ordering';

$db->setQuery($query);
$links = $db->loadAssocList();

ob_start();
if(is_array($links)) {
	$ssw_wrapper_css = $icons_render_type == 0 ? 'width: ' . $ssw_wrapper_width : $creativesocialwidget_fixed_render_place_css;
	echo '<div id="ssw_main_wrapper" class="'.$icons_render_type_class.'" style="'.$ssw_wrapper_css.'">';
	echo '<div id="ssw_template_wrapper" align_classname="'.$icons_align_class.'" class="creativesocialwidget_wrapper creativesocialwidget_wrapper_template_'.$ssw_wrapper_template.' '.$icons_align_class.' '.$icons_hover_animation_type_class.' '.$icons_wrapper_animate_class.'" style="padding: '.$ssw_wrapper_offset.'; '.$wrapper_background_color_css.'">';
	foreach($links as $k => $link) {
		echo '<div class="creativesocialwidget_item_wrapper" style="width: '.$icons_width.'px;height: '.$icons_height.'px; margin: '.$ssw_icons_offset.';">';
		if($icons_hover_animation_type != 5)
			echo
			'
			<div class="creativesocialwidget_item creativesocialwidget_item_normal" style="">
			<a href="#" title="'.$link['link_name'].'">
			<img src_part="'.JURI::base(true).'/../modules/mod_creativesocialwidget/assets/images/'.$link['type_name'].'/" src="'.JURI::base(true).'/../modules/mod_creativesocialwidget/assets/images/'.$link['type_name'].'/icon-'.$ssw_id_template.'-'.$ssw_animation_imgname.'-'.$icons_width_max_size.'.png" />
			</a>
			</div>
			';
		else
			echo
			'
			<div src_part="'.JURI::base(true).'/../modules/mod_creativesocialwidget/assets/images/'.$link['type_name'].'/" steps="'.$icons_special_animation_steps.'" step_h="'.$icons_height.'" uniq_index="'.$k.'" class="creativesocialwidget_item creativesocialwidget_item_special" style="width: '.$icons_width.'px;height: '.$icons_height.'px;background-image: url(\''.JURI::base(true).'/../modules/mod_creativesocialwidget/assets/images/'.$link['type_name'].'/icon-'.$ssw_id_template.'-'.$ssw_animation_imgname.'-'.$icons_width.'.png\');" >
			<a href="#" title="'.$link['link_name'].'"></a>
			</div>
			';
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';
}
$ssw_html = ob_get_clean();
?>
<script type="text/javascript">
(function($) {
	$(document).ready(function() {

		var ssw_rererender_enable = true,
			ssw_animation_val0 = <?php echo $ssw_animation;?>,
			ssw_cler_info_timeout = '';

		$('#creativesocialwidget_type').change(function() {
			$('#creativesocialwidget_fixed_place').trigger('change');
			if($(this).val() == 1) {
				$("#creativesocialwidget_align").parents('.creativesocialwidget_edit_wrapper').addClass('creativesocialwidget_hidden');
				$("#creativesocialwidget_wrapper_width").parents('.creativesocialwidget_edit_wrapper').addClass('creativesocialwidget_hidden');
				$("#creativesocialwidget_fixed_place").parents('.creativesocialwidget_edit_wrapper').removeClass('creativesocialwidget_hidden');
				$("#creativesocialwidget_fixed_top_offset").parents('.creativesocialwidget_edit_wrapper').removeClass('creativesocialwidget_hidden');
			}
			else {
				$("#creativesocialwidget_align").parents('.creativesocialwidget_edit_wrapper').removeClass('creativesocialwidget_hidden');
				$("#creativesocialwidget_wrapper_width").parents('.creativesocialwidget_edit_wrapper').removeClass('creativesocialwidget_hidden');
				$("#creativesocialwidget_fixed_content_width").parents('.creativesocialwidget_edit_wrapper').addClass('creativesocialwidget_hidden');
				$("#creativesocialwidget_fixed_place").parents('.creativesocialwidget_edit_wrapper').addClass('creativesocialwidget_hidden');
				$("#creativesocialwidget_fixed_top_offset").parents('.creativesocialwidget_edit_wrapper').addClass('creativesocialwidget_hidden');
			}
		});
		$('#creativesocialwidget_fixed_place').change(function() {
			if($(this).val() == 2 || $(this).val() == 3) {
				$("#creativesocialwidget_fixed_content_width").parents('.creativesocialwidget_edit_wrapper').removeClass('creativesocialwidget_hidden');
				$("#creativesocialwidget_fixed_corner_offset").parents('.creativesocialwidget_edit_wrapper').addClass('creativesocialwidget_hidden');
			}
			else {
				$("#creativesocialwidget_fixed_content_width").parents('.creativesocialwidget_edit_wrapper').addClass('creativesocialwidget_hidden');
				$("#creativesocialwidget_fixed_corner_offset").parents('.creativesocialwidget_edit_wrapper').removeClass('creativesocialwidget_hidden');
			}
		});

		var wrapper_template_old_id = <?php echo $ssw_wrapper_template;?>;
		$('#creativesocialwidget_wrapper_template').change(function() {
			if($(this).val() == 999 || $(this).val() == 110 || $(this).val() == 111 || $(this).val() == 112 || $(this).val() == 113 || $(this).val() == 114 || $(this).val() == 115) {
				$("#creativesocialwidget_wrapper_color").parents('.creativesocialwidget_edit_wrapper').removeClass('creativesocialwidget_hidden');

				//set background color
				var bg_val = $("#creativesocialwidget_wrapper_color").val();
				$("#ssw_template_wrapper").css('background-color',bg_val);
			}
			else {
				$("#creativesocialwidget_wrapper_color").parents('.creativesocialwidget_edit_wrapper').addClass('creativesocialwidget_hidden');
			}
			if($(this).val() == 0) {
				$("#creativesocialwidget_wrapper_animate").parents('.creativesocialwidget_edit_wrapper').addClass('creativesocialwidget_hidden');
			}
			else {
				$("#creativesocialwidget_wrapper_animate").parents('.creativesocialwidget_edit_wrapper').removeClass('creativesocialwidget_hidden');
			}
			var template_class_old = 'creativesocialwidget_wrapper_template_' + wrapper_template_old_id;
			var template_class_new = 'creativesocialwidget_wrapper_template_' + $(this).val();
			$("#ssw_template_wrapper").removeClass(template_class_old).addClass(template_class_new);
			wrapper_template_old_id = $(this).val();

			if($(this).val() == 0) {
				$("#ssw_template_wrapper").css('background-color','transparent');
			}
			else if($(this).val() == 999) {
				var bg_val = $("#creativesocialwidget_wrapper_color").val();
				$("#ssw_template_wrapper").css('background-color',bg_val);
			}
		});

		$("#creativesocialwidget_wrapper_color").blur(function() {
			var bg_val = $(this).val();
			$("#ssw_template_wrapper").css('background-color',bg_val);
		});

		//next/prev template
		$('.ssw_next_element').click(function() {
			var select = $(this).parent('div').prev('select');
			var int_val = select.val();
			var new_val = int_val == 999 ? 0 : (int_val == 115 ? 999 : int_val*1 + 1*1);
			select.val(new_val);
			select.trigger("change");
		});
		$('.ssw_prev_element').click(function() {
			var select = $(this).parent('div').prev('select');
			var int_val = select.val();
			var new_val = int_val == 0 ? 999 : (int_val == 999 ? 115 : int_val*1 - 1*1);
			select.val(new_val);
			select.trigger("change");
		});

		//colorpicker
		var active_element;
		$('.colorSelector').click(function() {
			active_element = $(this).parent('div');
		})
		
		$('.colorSelector').ColorPicker({
			onBeforeShow: function () {
				$color = $(active_element).find('input').val();
				$(this).ColorPickerSetColor($color);
			},
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				active_element.find('input').val('#' + hex);
				$(active_element).children('#colorSelector').children('div').css('backgroundColor', '#' + hex);

				$("#ssw_template_wrapper").css('background-color','#' + hex);
			}
		});

		//live preview
		$("#creativesocialwidget_template").change(function() {
			if($("#creativesocialwidget_animation").val() == 5 && $(this).val() == 4)
				ssw_show_info('Template 4 has no special animation.');
			ssw_rerender_img();
		});
		$("#creativesocialwidget_size").change(function() {
			ssw_rerender_img();
		});

		function ssw_show_info(message) {
			clearTimeout(ssw_cler_info_timeout);
			$("#ssw_info").html(message).fadeIn(800);
			ssw_cler_info_timeout = setTimeout(function() {
				$("#ssw_info").fadeOut(800);
			},5000);
		}
		
		function ssw_rerender_img() {
			if(!ssw_rererender_enable) {
				ssw_show_info('The preview not available. Please click <b><u>Save</u></b> to see the the preview.');
				return false;
			}
			var ssw_template_id = parseInt($("#creativesocialwidget_template").val());
			var ssw_animation = parseInt($("#creativesocialwidget_animation").val());
			var ssw_animation_imgname =  ssw_animation == 5 ? 'special' : 'normal';

			var ssw_size_id = parseInt($("#creativesocialwidget_size").val());
			var sizes_array = new Array(24,32,40,48,56,64);
			var ssw_size_readeable = sizes_array[ssw_size_id];
			var ssw_maxsize = 64;
			var ssw_size_imgname = ssw_animation == 5 ? ssw_size_readeable : ssw_maxsize;

			var ssw_steps_count = 0;
			var ssw_img_height = ssw_size_readeable;
			if(ssw_template_id == 1) {
				ssw_steps_count = 5;
				ssw_img_height = ssw_size_readeable;
			}
			else if(ssw_template_id == 2) {
				ssw_steps_count = 5;
				switch(ssw_size_readeable) {
				case 24:
					ssw_img_height = 21;
					break;
				case 32:
					ssw_img_height = 28;
					break;
				case 40:
					ssw_img_height = 34;
					break;
				case 48:
					ssw_img_height = 40;
					break;
				case 56:
					ssw_img_height = 47;
					break;
				case 64:
					ssw_img_height = 55;
					break;
				}
			}

			var img_src2 = 'icon-' +  ssw_template_id + '-' + ssw_animation_imgname + '-' + ssw_size_imgname + '.png';

			$('.creativesocialwidget_item_normal').each(function() {
				var img_scr1 = $(this).find('img').attr('src_part');
				var img_src = img_scr1 + '' + img_src2;
				$(this)
				.parents('.creativesocialwidget_item_wrapper')
				.css({'width' : ssw_size_readeable + 'px','height' : ssw_img_height + 'px'})
				.find('img')
				.attr('src',img_src);
			});
			$('.creativesocialwidget_item_special').each(function() {
				var img_scr1 = $(this).attr('src_part');
				var img_src = img_scr1 + '' + img_src2;
				$(this)
				.attr('steps',ssw_steps_count)
				.attr('step_h',ssw_img_height)
				.css({'width' : ssw_size_readeable + 'px','height' : ssw_img_height + 'px','background-image': 'url("' + img_src + '")'})
				.parents('.creativesocialwidget_item_wrapper')
				.css({'width' : ssw_size_readeable + 'px','height' : ssw_img_height + 'px'});
			});
		};

		$('#creativesocialwidget_animation').change(function() {
			var v = $(this).val();
			if((ssw_animation_val0 != 5 && v == 5) || (ssw_animation_val0 == 5 && v != 5))
					ssw_rererender_enable = false;
			
			ssw_show_info('This option has no live preview. Please click <b><u>Save</u></b> to see the preview.');
			
			if(v == 5 && $("#creativesocialwidget_template").val() == 4)
				ssw_show_info('Template 4 has no special animation.');
		});
		$('#creativesocialwidget_icons_offset').keyup(function() {
			var v = $(this).val();
			$('.creativesocialwidget_item_wrapper').css('margin', v);
		});
		
		$('#creativesocialwidget_type').change(function() {
			ssw_rerender_wrapper();
		});
		$('#creativesocialwidget_fixed_place').change(function() {
			ssw_rerender_wrapper();
		});
		$('#creativesocialwidget_fixed_top_offset').keyup(function() {
			ssw_rerender_wrapper();
		});
		$('#creativesocialwidget_fixed_corner_offset').keyup(function() {
			ssw_rerender_wrapper();
		});

		function ssw_rerender_wrapper() {
			var ssw_wrapper_css = '';
			var type_id = parseInt($("#creativesocialwidget_type").val());
			var ssw_icons_render_type_class = type_id == 0 ? 'creativesocialwidget_normal_view' : 'creativesocialwidget_fixed_view';
			if(type_id == 0)
				ssw_wrapper_css = 'width: ' + $('#creativesocialwidget_wrapper_width').val();
			else {
				var top_offset = parseInt($("#creativesocialwidget_fixed_top_offset").val());
				top_offset = isNaN(top_offset) ? 0 : top_offset;
				var corner_offset = parseInt($("#creativesocialwidget_fixed_corner_offset").val());
				corner_offset = isNaN(corner_offset) ? 0 : corner_offset;
				var render_place = parseInt($("#creativesocialwidget_fixed_place").val());
				switch(render_place) {
					case 0://left
						ssw_wrapper_css = 'left: ' + corner_offset + 'px; top: ' + top_offset + 'px;position: absolute !important;';
						break;
					case 1://right
						var corner_offset_right = corner_offset + 16*1;
						ssw_wrapper_css = 'right: ' + corner_offset_right + 'px; top: ' + top_offset + 'px;position: absolute !important;';
						break;
					case 2://
						ssw_wrapper_css = 'left:50%;margin-left: -390px;top: ' + top_offset + 'px;position: absolute !important;';
						break;
					case 3://
						ssw_wrapper_css = 'right:50%;margin-right: -390px;top: ' + top_offset + 'px;position: absolute !important;';
						break;
				}
			}
			$("#ssw_main_wrapper").attr('class',ssw_icons_render_type_class).attr('style',ssw_wrapper_css);
		}
		
		
		$('#creativesocialwidget_align').change(function() {
			var v = parseInt($(this).val());
			var icons_align_class = v == 0 ? 'creativesocialwidget_wrapper_aligned_center' : (v == 1 ? 'creativesocialwidget_wrapper_aligned_left' : 'creativesocialwidget_wrapper_aligned_right');
			var icons_align_class_old = $("#ssw_template_wrapper").attr('align_classname');
			$("#ssw_template_wrapper").removeClass(icons_align_class_old).addClass(icons_align_class).attr('align_classname',icons_align_class);
		});
		$('#creativesocialwidget_wrapper_width').keyup(function() {
			var v = $(this).val();
			$('.creativesocialwidget_normal_view').css('width', v);
		});
		$('#creativesocialwidget_wrapper_offset').keyup(function() {
			var v = $(this).val();
			$('#ssw_template_wrapper').css('padding', v);
		});
		$('#creativesocialwidget_wrapper_animate').change(function() {
			var v = parseInt($(this).val());
			$('#ssw_template_wrapper').removeClass('creativesocialwidget_wrapper_animate');
			if(v == 0) {
				$('#ssw_template_wrapper').addClass('creativesocialwidget_wrapper_animate');
			}
		});
		
	})
})(creativeJ);
</script>
<form action="<?php echo JRoute::_('index.php?option=com_creativesocialwidget&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal">
	<div class="row-fluid">
		<!-- Begin Newsfeed -->
		<div class=" form-horizontal">
			<?php if(($this->max_id < 1) || ($this->item->id != 0)) {?>
			<table cellpadding="0" cellspacing="0" style="width: 100%;height: 530px;"><tr><td style="width: 420px;height: 530px;">
			<fieldset>
				<div class="tab-content">
					<div class="tab-pane active" id="details">
						<div class="control-group">
							<!-- Name -->
							<div class="control-label"><label id="" for="creativesocialwidget_name" class="hasTooltip required" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_NAME_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_NAME_LABEL' );?><span class="star">&nbsp;*</span></label></div>
							<div class="controls"><input type="text" name="name" id="creativesocialwidget_name" value="<?php echo $v = $this->item->id == 0 ? '' : $this->item->name;?>" class="inputbox" size="40" required="" aria-required="true" ></div>
							
							<div style="clear: both;height: 5px;"></div>
								<div class="control-label"><label id="" for="creativesocialwidget_status_lbl" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_STATUS_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_STATUS_LABEL' );?></label></div>
								<div class="controls">
										<?php 
										$default = $this->item->id == 0 ? 1 : $this->item->published;
										$opts = array(1 => 'Published', 0 => 'Unpublished');
										$options = array();
										echo '<select id="creativesocialwidget_status" class="" name="published">';
										foreach($opts as $key=>$value) :
											$selected = $key == $default ? 'selected="selected"' : '';
											echo '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
										endforeach;
										echo '</select>';
										?>
								</div>
							
							<div style="clear: both;margin: 15px 0 10px 0px;color: #08c; font-style: italic;font-size: 15px;text-decoration: underline;">Main Settings</div>
							<div class="control-label"><label id="" for="creativesocialwidget_template_lbl" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_TEMPLATE_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_TEMPLATE_LABEL' );?></label></div>
							<div class="controls">
									<?php 
									$default = $this->item->id == 0 ? 1 : $this->item->id_template;
									$opts = array(1 => 'Template 1 (Commercial)', 2 => 'Template 2 (Commercial)', 3 => 'Template 3 (Commercial)', 4 => 'Template 4');
									$options = array();
									echo '<select id="creativesocialwidget_template" class="" name="id_template">';
									foreach($opts as $key=>$value) :
										$selected = $key == $default ? 'selected="selected"' : '';
										$disabled = $key != 4 ? 'disabled="disabled"' : '';
										echo '<option '.$selected.' '.$disabled.' value="'.$key.'">'.$value.'</option>';
									endforeach;
									echo '</select>';
									?>
							</div>
							<div style="color: #777;margin-top: 0px;font-style: italic;margin-left: 5px;margin-bottom: 0px;">See <a href="http://creative-solutions.net/joomla/creative-social-widget/demo" target="_blank">Templates Demo</a>.</div>
							
							<div style="clear: both;height: 5px;"></div>
							<div class="control-label"><label id="" for="creativesocialwidget_size_lbl" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SIZE_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SIZE_LABEL' );?></label></div>
							<div class="controls">
									<?php 
									$default = $this->item->id == 0 ? 1 : $this->item->size;
									$opts = array(0 => 'Very Small (24X24)', 1 => 'Small (32X32)', 2 => 'Normal (40X40)', 3 => 'Big (48X48)', 4 => 'Very Big (56X56)', 5 => 'Super Big (64X64)');
									$options = array();
									echo '<select id="creativesocialwidget_size" class="" name="size">';
									foreach($opts as $key=>$value) :
										$selected = $key == $default ? 'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
									endforeach;
									echo '</select>';
									?>
							</div>
							
							<div style="clear: both;height: 5px;"></div>
							<div class="control-label"><label id="" for="creativesocialwidget_animation_lbl" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_ANIMATION_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_ANIMATION_LABEL' );?></label></div>
							<div class="controls">
									<?php 
									$default = $this->item->id == 0 ? 2 : $this->item->animation;
									$opts = array(0 => 'Move Top', 1 => 'Bounce', 2 => 'Zoom', 3 => 'Flip Vertical', 4 => 'Flip Horizontal', 5 => 'Special (Commercial)');
									$options = array();
									echo '<select id="creativesocialwidget_animation" class="" name="animation">';
									foreach($opts as $key=>$value) :
										$selected = $key == $default ? 'selected="selected"' : '';
										$disabled = $key == 5 ? 'disabled="disabled"' : '';
										$special_class = $key == 5 ? 'class="special_animation_option"' : '';
										echo '<option '.$special_class.' '.$selected.' '.$disabled.' value="'.$key.'">'.$value.'</option>';
									endforeach;
									echo '</select>';
									?>
							</div>
							
							<div style="clear: both;height: 5px;"></div>
							<div class="control-label"><label id="" for="creativesocialwidget_icons_offset" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_ICONS_OFFSET_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_ICONS_OFFSET_LABEL' );?></label></div>
							<div class="controls"><input type="text" name="icons_offset" id="creativesocialwidget_icons_offset" value="<?php echo $v = $this->item->id == 0 ? '4px 4px 4px 4px' : $this->item->icons_offset;?>" class="inputbox" size="40" required="" ></div>
							
							
							<div style="clear: both;height: 5px;"></div>
							<div class="control-label"><label id="" for="creativesocialwidget_type_lbl" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_TYPE_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_TYPE_LABEL' );?></label></div>
							<div class="controls">
									<?php 
									$default = $this->item->id == 0 ? 0 : $this->item->type;
									$opts = array(0 => 'Normal', 1 => 'Fixed');
									$options = array();
									echo '<select id="creativesocialwidget_type" class="" name="type">';
									foreach($opts as $key=>$value) :
										$selected = $key == $default ? 'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
									endforeach;
									echo '</select>';
									?>
							</div>
							 
							<div class="creativesocialwidget_edit_wrapper <?php if($this->item->type == 1) echo 'creativesocialwidget_hidden';?>">
								<div style="clear: both;height: 5px;"></div>
								<div class="control-label"><label id="" for="creativesocialwidget_align_lbl" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_ALIGN_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_ALIGN_LABEL' );?></label></div>
								<div class="controls">
										<?php 
										$default = $this->item->id == 0 ? 0 : $this->item->align;
										$opts = array(0 => 'Center', 1 => 'Left', 2 => 'Right');
										$options = array();
										echo '<select id="creativesocialwidget_align" class="" name="align">';
										foreach($opts as $key=>$value) :
											$selected = $key == $default ? 'selected="selected"' : '';
											echo '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
										endforeach;
										echo '</select>';
										?>
								</div>
							</div>
							
							<div class="creativesocialwidget_edit_wrapper <?php if($this->item->type == 0) echo 'creativesocialwidget_hidden';?>">
								<div style="clear: both;height: 5px;"></div>
								<div class="control-label"><label id="" for="creativesocialwidget_fixed_place_lbl" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_FIXED_PLACE_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_FIXED_PLACE_LABEL' );?></label></div>
								<div class="controls">
										<?php 
										$default = $this->item->id == 0 ? 0 : $this->item->fixed_place;
										$opts = array(0 => 'Left', 1 => 'Right', 2 => 'Near-Content Left', 3 => 'Near-Content Right');
										$options = array();
										echo '<select id="creativesocialwidget_fixed_place" class="" name="fixed_place">';
										foreach($opts as $key=>$value) :
											$selected = $key == $default ? 'selected="selected"' : '';
											echo '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
										endforeach;
										echo '</select>';
										?>
								</div>
							</div>
							
							<div class="creativesocialwidget_edit_wrapper <?php if($this->item->type == 0) echo 'creativesocialwidget_hidden';?>">
								<div style="clear: both;margin: 15px 0 10px 0px;color: #08c; font-style: italic;font-size: 12px;text-decoration: underline;">Wrapper Position</div>
								<div class="control-label"><label id="" for="creativesocialwidget_fixed_top_offset" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_FIXED_TOP_OFFSET_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_FIXED_TOP_OFFSET_LABEL' );?></label></div>
								<div class="controls"><input type="text" name="fixed_top_offset" id="creativesocialwidget_fixed_top_offset" value="<?php echo $v = $this->item->id == 0 ? '10' : $this->item->fixed_top_offset;?>" class="inputbox" size="40" required="" ></div>
							</div>
							
							<div class="creativesocialwidget_edit_wrapper <?php if($this->item->type == 0 || $this->item->fixed_place == 2  || $this->item->fixed_place == 3) echo 'creativesocialwidget_hidden';?>">
								<div style="clear: both;height: 5px;"></div>
								<div class="control-label"><label id="" for="creativesocialwidget_fixed_corner_offset" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_FIXED_CORNER_OFFSET_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_FIXED_CORNER_OFFSET_LABEL' );?></label></div>
								<div class="controls"><input type="text" name="fixed_corner_offset" id="creativesocialwidget_fixed_corner_offset" value="<?php echo $v = $this->item->id == 0 ? '10' : $this->item->fixed_corner_offset;?>" class="inputbox" size="40" required="" ></div>
							</div>
							
							<div class="creativesocialwidget_edit_wrapper <?php if($this->item->type == 0 || $this->item->fixed_place == 0  || $this->item->fixed_place == 1) echo 'creativesocialwidget_hidden';?>">
								<div style="clear: both;height: 5px;"></div>
								<div class="control-label"><label id="" for="creativesocialwidget_fixed_content_width" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_FIXED_CONTENT_WIDTH_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_FIXED_CONTENT_WIDTH_LABEL' );?></label></div>
								<div class="controls"><input type="text" name="fixed_content_width" id="creativesocialwidget_fixed_content_width" value="<?php echo $v = $this->item->id == 0 ? '960' : $this->item->fixed_content_width;?>" class="inputbox" size="40" required="" ></div>
							</div>
							
							<div style="clear: both;margin: 15px 0 10px 0px;color: #08c; font-style: italic;font-size: 15px;text-decoration: underline;">Wrapper Settings</div>
							<div class="creativesocialwidget_edit_wrapper <?php if($this->item->type == 1) echo 'creativesocialwidget_hidden';?>">
								<div class="control-label"><label id="" for="creativesocialwidget_wrapper_width" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_WIDTH_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_WIDTH_LABEL' );?></label></div>
								<div class="controls"><input type="text" name="wrapper_width" id="creativesocialwidget_wrapper_width" value="<?php echo $v = $this->item->id == 0 ? '100%' : $this->item->wrapper_width;?>" class="inputbox" size="40" required="" ></div>
							</div>
							
							<div class="creativesocialwidget_edit_wrapper">
								<div style="clear: both;height: 5px;"></div>
								<div class="control-label"><label id="" for="creativesocialwidget_wrapper_offset" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_OFFSET_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_OFFSET_LABEL' );?></label></div>
								<div class="controls"><input type="text" name="wrapper_offset" id="creativesocialwidget_wrapper_offset" value="<?php echo $v = $this->item->id == 0 ? '5px 5px 5px 5px' : $this->item->wrapper_offset;?>" class="inputbox" size="40" required="" ></div>
							</div>
							
							<div style="clear: both;height: 5px;"></div>
							<div class="control-label"><label id="" for="creativesocialwidget_wrapper_template" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_TEMPLATE_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_TEMPLATE_LABEL' );?></label></div>
							<div class="controls" style="overflow: hidden;padding: 5px 0">
									<?php 
									$default = $this->item->id == 0 ? 0 : $this->item->wrapper_template;
									$opts = array//100-115
													(
														"Gray Templates" => array("1" => "Gray 1", "2" => "Gray 2", "3" => "Gray 3", "4" => "Gray 4", "5" => "Gray 5", "6" => "Gray 6", "7" => "Gray 7", "8" => "Gray 8", "9" => "Gray 9", "10" => "Gray 10", "11" => "Gray 11", "12" => "Gray 12", "13" => "Gray 13", "14" => "Gray 14", "15" => "Gray 15", "16" => "Gray 16", "17" => "Gray 17", "18" => "Gray 18", "19" => "Gray 19", "20" => "Gray 20", "21" => "Gray 21", "22" => "Gray 22"),
														"Yellow Templates" => array("23" => "Yellow 1", "24" => "Yellow 2", "25" => "Yellow 3", "26" => "Yellow 4", "27" => "Yellow 5", "28" => "Yellow 6", "29" => "Yellow 7", "30" => "Yellow 8", "31" => "Yellow 9", "32" => "Yellow 10", "33" => "Yellow 11", "34" => "Yellow 12", "35" => "Yellow 13", "36" => "Yellow 14"),
														"Brown Templates" => array("37" => "Brown 1", "38" => "Brown 2", "39" => "Brown 3", "40" => "Brown 4"),
														"Green Templates" => array("41" => "Green 1", "42" => "Green 2", "43" => "Green 3", "44" => "Green 4", "45" => "Green 5", "46" => "Green 6"),
														"Blue Templates" => array("47" => "Blue 1", "48" => "Blue 2", "49" => "Blue 3", "50" => "Blue 4", "51" => "Blue 5", "52" => "Blue 6", "53" => "Blue 7", "54" => "Blue 8", "55" => "Blue 9", "56" => "Blue 10", "57" => "Blue 11", "58" => "Blue 12", "59" => "Blue 13", "60" => "Blue 14", "61" => "Blue 15", "62" => "Blue 16", "63" => "Blue 17"),
														"Red Templates" => array("64" => "Red 1", "65" => "Red 2", "66" => "Red 3", "67" => "Red 4", "68" => "Red 5", "69" => "Red 6", "70" => "Red 7", "71" => "Red 8"),
														"Pink Templates" => array("72" => "Pink 1", "73" => "Pink 2", "74" => "Pink 3", "75" => "Pink 4", "76" => "Pink 5", "77" => "Pink 6", "78" => "Pink 7"),
														"Wood Templates" => array("79" => "Wood 1", "80" => "Wood 2", "81" => "Wood 3", "82" => "Wood 4", "83" => "Wood 5", "84" => "Wood 6", "85" => "Wood 7", "86" => "Wood 8", "87" => "Wood 9", "88" => "Wood 10", "89" => "Wood 11", "90" => "Wood 12", "91" => "Wood 13", "92" => "Wood 14", "93" => "Wood 15", "94" => "Wood 16", "95" => "Wood 17", "96" => "Wood 18", "97" => "Wood 19", "98" => "Wood 20", "99" => "Wood 21"),
														"Black Templates" => array("100" => "Black 1", "101" => "Black 2", "102" => "Black 3", "103" => "Black 4", "104" => "Black 5", "105" => "Black 6", "106" => "Black 7", "107" => "Black 8", "108" => "Black 9", "109" => "Black 10", "110" => "Black 11", "111" => "Black 12", "112" => "Black 13", "113" => "Black 14", "114" => "Black 15", "115" => "Black 16")
													);
									$options = array();
									echo '<select id="creativesocialwidget_wrapper_template" class="" name="wrapper_template" style="width: 150px;float: left;">';
									$def0 = $default == 0 ? 'selected="selected"' : '';
									echo '<option value="0" '.$def0.'>Transparent</option>';
									foreach($opts as $key=>$value) :
										echo '<optgroup label="'.$key.'">';
											foreach($value as $k => $v) {
												$selected = $k == $default ? 'selected="selected"' : '';
												echo '<option '.$selected.' value="'.$k.'">'.$v.'</option>';
											}
										echo '</optgroup>';
									endforeach;
									$def999 = $default == 999 ? 'selected="selected"' : '';
									echo '<option value="999" '.$def999.'>Custom Background Color</option>';
									echo '</select>';
									?>
									<div style="display: block;float:left;width: 43px;height: 32px;position: relative;">
										<div class="ssw_next_element" style='-moz-user-select: none;-webkit-user-select: none;' onselectstart='return false;'>Next</div>
										<div class="ssw_prev_element" style='-moz-user-select: none;-webkit-user-select: none;' onselectstart='return false;'>Prev</div>
									</div>
							</div>
							<div class="creativesocialwidget_edit_wrapper <?php if(!in_array($this->item->wrapper_template, array(110,111,112,113,114,115,999))) echo 'creativesocialwidget_hidden';?>">
								<div style="clear: both;height: 5px;"></div>
								<div class="control-label"><label id="" for="creativesocialwidget_wrapper_color" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_COLOR_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_COLOR_LABEL' );?></label></div>
								<div class="controls">
									<div id="colorSelector" class="colorSelector" style="float: left;"><div style="background-color: <?php echo $this->item->wrapper_color;?>"></div></div>
	               					<input class="colorSelector" type="text" value="<?php echo $v = $this->item->id == 0 ? '#ffffff' : $this->item->wrapper_color;?>" name="wrapper_color" roll=""  id="creativesocialwidget_wrapper_color" style="width: 162px;margin: 4px 0 0 6px;" />
								</div>
							</div>
							<div class="creativesocialwidget_edit_wrapper <?php if(in_array($this->item->wrapper_template, array(0))) echo 'creativesocialwidget_hidden';?>">
								<div style="clear: both;height: 5px;"></div>
								<div class="control-label"><label id="" for="creativesocialwidget_wrapper_animate" class="hasTooltip" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_ANIMATE_DESCRIPTION' );?>" ><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_WRAPPER_ANIMATE_LABEL' );?></label></div>
								<div class="controls">
										<?php 
										$default = $this->item->wrapper_animate == 0 ? 0 : $this->item->wrapper_animate;
										$opts = array(0 => 'Yes', 1 => 'No');
										$options = array();
										echo '<select id="creativesocialwidget_wrapper_animate" class="" name="wrapper_animate">';
										foreach($opts as $key=>$value) :
											$selected = $key == $default ? 'selected="selected"' : '';
											echo '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
										endforeach;
										echo '</select>';
										?>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</fieldset>
			</td>
			<td style="height: 530px;padding: 15px 10px 10px 20px;">
				<div id="ssw_preview_wrapper" style="position: relative;overflow: hidden;">
					<div id="ssw_preview_inner">
						<div id="ssw_container">
							<div id="ssw_header">
								<div id="ssw_sitename">Site Preview</div>
								<input type="text" id="ssw_search" value="Search..." onblur="if (this.value=='') this.value='Search...';" onfocus="if (this.value=='Search...') this.value='';" />
								<div id="ssw_info"></div>
							</div>
							<div id="ssw_navigation">
								<ul>
									<li class=""><a href="#" class="ssw_nav_active">Home</a></li><li class=""><a href="#" >About</a></li><li class=""><a href="" >Author Login</a></li></li><li class=""><a href="" >Contact Us</a></li>
								</ul>
							</div>
							<div id="ssw_left">
								<img style="width: 100%" src="components/com_creativesocialwidget/assets/images/raindrops.jpg" /><br />
								<h2><a href="#">Welcome to your blog</a></h2>
								This is a sample blog posting.<br /><br />
								If you log in to the site (the Author Login link is on the very bottom of this page) you will be able to edit it and all of the other existing articles.<br /><br />
								As you add and modify articles you will see how your site changes and also how you can customise it in various ways.
								<h2><a href="#">About your home page</a></h2>
								Your home page is set to display the four most recent articles from the blog category in a column. Then there are links to the 4 nest oldest articles. You can change those numbers by editing the content options settings in the blog tab in your site administrator. There is a link to your site administrator in the top menu.<br /><br />
								If you want to have your blog post broken into two parts, an introduction and then a full length separate page, use the Read More button to insert a break.<br /><br />
								<h2><a href="#">Your Template</a></h2>
								Templates control the look and feel of your website.<br /><br />
								This blog is installed with the Protostar template.<br /><br />
								You can edit the options by clicking on the Working on Your Site, Template Settings link in the top menu (visible when you login).<br /><br />
								For example you can change the site background color, highlights color, site title, site description and title font used. <br /><br />
								More options are available in the site administrator. You may also install a new template using the extension manager.<br /><br />
							</div>
							<div id="ssw_right">
								<?php if(true) {?>
								<div class="ssw_module_container">
								<?php }?>
									<?php 
										echo $ssw_html;
									?>
								<?php if(true) {?>
								</div>
								<?php }?>
								<div class="ssw_module_container">
									<h3 style="padding-bottom: 2px;border-bottom: 1px solid #E4E4E4;margin: 5px 0 10px 7px;">Older Posts</h3>
									<ul class="">
										<li><a class="" href="#">Welcome to your blog</a></li>
										<li><a class="" href="#">About your home page</a></li>
										<li><a class="" href="#">Your Template</a></li>
										<li><a class="" href="#">Your Modules</a></li>
									</ul>
								</div>
								<div class="ssw_module_container">
									<h3 style="padding-bottom: 2px;border-bottom: 1px solid #E4E4E4;margin: 5px 0 10px 7px;">Blog Roll</h3>
									<ul class="">
										<li><a class="" href="#">Joomla! Community</a></li>
										<li><a class="" href="#">Joomla! Leadership Blog</a></li>
									</ul>
								</div>
								<div class="ssw_module_container">
									<h3 style="padding-bottom: 2px;border-bottom: 1px solid #E4E4E4;margin: 5px 0 10px 7px;">Most Read Posts</h3>
									<ul class="">
										<li><a class="" href="#">Welcome to your blog</a></li>
										<li><a class="" href="#">About your home page</a></li>
										<li><a class="" href="#">Your Modules</a></li>
										<li><a class="" href="#">Your Template</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</td></tr></table>
			<?php } else { ?>
				<div style="color: rgb(235, 9, 9);font-size: 16px;font-weight: bold;"><?php echo JText::_('COM_CREATIVESOCIALWIDGET_PLEASE_UPGRADE_TO_HAVE_MORE_THAN_TWO_POLLS');?></div>
					<div id="cpanel" style="float: left;">
					<div class="icon" style="float: right;">
					<a href="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_BUY_PRO_VERSION_LINK' ); ?>" target="_blank" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_BUY_PRO_VERSION_DESCRIPTION' ); ?>">
					<table style="width: 100%;height: 100%;text-decoration: none;">
					<tr>
					<td align="center" valign="middle">
					<img src="components/com_creativesocialwidget/assets/images/shopping_cart.png" /><br />
											<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_BUY_PRO_VERSION' ); ?>
										</td>
									</tr>
								</table>
							</a>
						</div>
					</div>
			<?php }?>
		</div>
	</div>
<input type="hidden" name="task" value="creativesocialwidgetblock.edit" />
<?php echo JHtml::_('form.token'); ?>
</form>
<?php include (JPATH_BASE.'/components/com_creativesocialwidget/helpers/footer.php'); ?>
<?php }?>
<style>
.form-horizontal .controls {
margin-left: 200px !important;
}

.creativesocialwidget_hidden {
	display: none;
}

#ssw_main_wrapper {
	-webkit-transition:  all linear 0.2s;
	-moz-transition: all linear 0.2s;
	-o-transition: all linear 0.2s;
	transition: all linear 0.2s;
}
#ssw_preview_wrapper {
	box-shadow: 0 0 8px 1px #AFAFAF;
	border: 1px solid #bbb;
	height: 100%;
}
#ssw_preview_inner {
	border-top: 3px solid #0088cc;
	padding: 20px;
	background-color: #f4f6f7;
	height: 546px;
	overflow-y: scroll;
	
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size: 13px;
	line-height: 18px;
	color: #333;
}
#ssw_container {
	background-color: #fff;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	padding: 20px;
	border: 1px solid rgba(0,0,0,0.15);
	-moz-box-shadow: 0px 0px 6px rgba(0,0,0,0.05);
	-webkit-box-shadow: 0px 0px 6px rgba(0,0,0,0.05);
	box-shadow: 0px 0px 6px rgba(0,0,0,0.05);
	
	margin-right: auto;
	margin-left: auto;
	
	width: 550px;
	height: 920px;
}
#ssw_header {
	margin-bottom: 10px;
	position: relative;
}
#ssw_sitename {
	color: #004466;
	-webkit-transition: color .5s linear;
	-moz-transition: color .5s linear;
	-o-transition: color .5s linear;
	transition: color .5s linear;
	display: inline-block;
	cursor: pointer;
	
	font-family: 'Open Sans', sans-serif;
	font-size: 32px;
	line-height: 48px;
	font-weight: bold;
}
#ssw_sitename:hover {
	color: #08c;
}

#ssw_search {
	position: absolute;
	right: 2px;
	top: 9px;
	
	background-color: #fff;
	border: 1px solid #ccc;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
	-moz-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
	box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
	-webkit-transition: border linear .2s, box-shadow linear .2s;
	-moz-transition: border linear .2s, box-shadow linear .2s;
	-o-transition: border linear .2s, box-shadow linear .2s;
	transition: border linear .2s, box-shadow linear .2s;
	-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;
	
	height: 18px;
	width: 150px;
	padding: 4px 6px;
	font-size: 13px;
	line-height: 18px;
	color: #555;
}
#ssw_search:hover,#ssw_search:focus {
	border-color: rgba(82,168,236,0.8);
	outline: 0;
	outline: thin dotted \9;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(82,168,236,.6);
	-moz-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(82,168,236,.6);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(82,168,236,.6);
}
#ssw_navigation {
	padding: 5px 0;
	border-top: 1px solid rgba(0,0,0,0.075);
	border-bottom: 1px solid rgba(0,0,0,0.075);
	margin-bottom: 10px;
	overflow: hidden;
}
#ssw_navigation ul{
	margin: 0;
	padding: 0;
	list-style: none;
}
#ssw_navigation ul li{
	margin: 0;
	padding: 0;
	list-style: none;
	float: left;
}
#ssw_navigation ul li a{
	display: block;
	float: left;
	padding-top: 8px;
	padding-bottom: 8px;
	margin-top: 2px;
	margin-bottom: 2px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	padding-right: 12px;
	padding-left: 12px;
	margin-right: 2px;
	line-height: 14px;
}
#ssw_navigation ul li a:hover,#ssw_navigation ul li a:focus {
text-decoration: none;
background-color: #eee;
}
.ssw_nav_active,.ssw_nav_active:hover,.ssw_nav_active:focus {
	color: #fff !important;
	background-color: #08c !important;
}
#ssw_left {
	float: left;
	width: 350px;
}
#ssw_right {
	float: left;
	width: 190px;
	margin-left: 10px;
}
.ssw_module_container {
	min-height: 20px;
	padding: 8px;
	margin-bottom: 20px;
	background-color: #f5f5f5;
	border: 1px solid #e3e3e3;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);
	-moz-box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);
	box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);
}

.ssw_next_element,.next_tooltip {
color: rgb(128, 69, 15);
padding: 0;
text-align: center;
border-radius: 4px;
width: 65px;
font-size: 12px;
position: absolute;
left: 2px;
top: -5px;
cursor: pointer;
border: 1px solid #e6db55;
background-color: rgb(252, 255, 218);

}
.ssw_next_element:hover,.next_tooltip:hover {
	text-decoration: underline;
	background-color: rgb(253, 234, 194);
	border-radius: 6px;
	border: 1px solid rgb(230, 149, 85);
}
.ssw_prev_element,.prev_tooltip {
color: rgb(128, 69, 15);
padding: 0;
text-align: center;
border-radius: 4px;
width: 65px;
font-size: 12px;
position: absolute;
left: 2px;
bottom: -4px;
cursor: pointer;
border: 1px solid #e6db55;
background-color: rgb(252, 255, 218);
}
.ssw_prev_element:hover,.prev_tooltip:hover {
	text-decoration: underline;
	background-color: rgb(253, 234, 194);
	border-radius: 6px;
	border: 1px solid rgb(230, 149, 85);
}
#ssw_info {
	color: rgb(0, 152, 3);
	font-style: italic;
	display: none;
}
</style>
