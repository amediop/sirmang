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

$db = JFactory::getDBO();

// get a parameter from the module's configuration
$module_id = $module->id;
$id_share = $params->get('id_share',1);
$ssw_class_suffix = $params->get('moduleclass_sfx','');
$version = '1.0.2-pro';

//global options
$query = 'SELECT * FROM `#__creativesocialwidget_blocks` WHERE id = \''.$id_share.'\'';
$db->setQuery($query);
$creativesocialwidget_options = $db->loadAssoc();

$ssw_size = (int)$creativesocialwidget_options['size'];
$ssw_id_template = (int)$creativesocialwidget_options['id_template'];
$ssw_animation = (int)$creativesocialwidget_options['animation'];
$ssw_icons_offset =  stripslashes($creativesocialwidget_options['icons_offset']);
$ssw_type = (int)$creativesocialwidget_options['type'];
$ssw_align = (int)$creativesocialwidget_options['align'];
$ssw_fixed_place = (int)$creativesocialwidget_options['fixed_place'];
$ssw_fixed_top_offset = (int)$creativesocialwidget_options['fixed_top_offset'];
$ssw_fixed_corner_offset = (int)$creativesocialwidget_options['fixed_corner_offset'];
$ssw_fixed_content_width = (int)$creativesocialwidget_options['fixed_content_width'];
$ssw_wrapper_width = stripslashes($creativesocialwidget_options['wrapper_width']);
$ssw_wrapper_offset = stripslashes($creativesocialwidget_options['wrapper_offset']);
$ssw_wrapper_color =  stripslashes($creativesocialwidget_options['wrapper_color']);
$ssw_wrapper_template = (int)$creativesocialwidget_options['wrapper_template'];
$ssw_wrapper_animate = (int)$creativesocialwidget_options['wrapper_animate'];

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
		$creativesocialwidget_fixed_render_place_css = 'left: '.$creativesocialwidget_fixed_corner_offset.'px; top: '.$creativesocialwidget_fixed_top_offset.'px;';
		break;
	case 1:
		$creativesocialwidget_fixed_render_place_css = 'right: '.$creativesocialwidget_fixed_corner_offset.'px; top: '.$creativesocialwidget_fixed_top_offset.'px;';
		break;
	case 2:
		$mrg = (int)($ssw_fixed_content_width / 2 + 80) * -1;
		$creativesocialwidget_fixed_render_place_css = 'left: 50%;margin-left: '.$mrg.'px; top: '.$creativesocialwidget_fixed_top_offset.'px;';
		break;
	case 3:
		$mrg = (int)($ssw_fixed_content_width / 2 + 80) * -1;
		$creativesocialwidget_fixed_render_place_css = 'right: 50%;margin-right: '.$mrg.'px; top: '.$creativesocialwidget_fixed_top_offset.'px;';
		break;
}

//add scripts, styles
$document = JFactory::getDocument();

$cssFile = JURI::base(true).'/modules/mod_creativesocialwidget/assets/css/main.css?version='.$version;
$document->addStyleSheet($cssFile, 'text/css', null, array());

$cssFile = JURI::base(true).'/modules/mod_creativesocialwidget/assets/css/wrapper_templates.css?version='.$version;
$document->addStyleSheet($cssFile, 'text/css', null, array());

$jsFile = JURI::base(true).'/modules/mod_creativesocialwidget/assets/js/creativelib.js';
$document->addScript($jsFile);

$jsFile = JURI::base(true).'/modules/mod_creativesocialwidget/assets/js/creativelib-ui.js';
$document->addScript($jsFile);

$jsFile = JURI::base(true).'/modules/mod_creativesocialwidget/assets/js/creativesocialwidget.js?version='.$version;
$document->addScript($jsFile);

$query = 'SELECT '.
		'sp.id id_link, '.
		'sp.id_type id_type, '.
		'sp.name link_name, '.
		'sp.link link_url, '.
		'sp.target target, '.
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

if(is_array($links)) {
	$ssw_wrapper_css = $icons_render_type == 0 ? 'width: ' . $ssw_wrapper_width : $creativesocialwidget_fixed_render_place_css;
	echo '<div id="ssw_main_wrapper" class="'.$icons_render_type_class.' '.$ssw_class_suffix.'" style="'.$ssw_wrapper_css.'">';
		echo '<div class="creativesocialwidget_wrapper creativesocialwidget_wrapper_template_'.$ssw_wrapper_template.' '.$icons_align_class.' '.$icons_hover_animation_type_class.' '.$icons_wrapper_animate_class.'" style="padding: '.$ssw_wrapper_offset.'; '.$wrapper_background_color_css.'">';
		foreach($links as $k => $link) {
			$ssw_url = $link['type_url'] == '#' ? ($link['link_url'] == '' ? '#' : 'http://' . $link['link_url']) : $link['type_url'] . $link['link_url'];
			$ssw_target = $link['target'] == 1 ? ' target="_blank"' : '';
			echo '<div class="creativesocialwidget_item_wrapper" style="width: '.$icons_width.'px;height: '.$icons_height.'px; margin: '.$ssw_icons_offset.';">';
				if($icons_hover_animation_type != 5)
					echo
						'
							<div class="creativesocialwidget_item" style="">
								<a href="'.$ssw_url.'" title="'.$link['link_name'].'"'.$ssw_target.'>
									<img  src="'.JURI::base(true).'/modules/mod_creativesocialwidget/assets/images/'.$link['type_name'].'/icon-'.$ssw_id_template.'-'.$ssw_animation_imgname.'-'.$icons_width_max_size.'.png" />
								</a>
							</div>
						';
				else 
					echo 
						'
							<div steps="'.$icons_special_animation_steps.'" step_h="'.$icons_height.'" uniq_index="'.$k.'" class="creativesocialwidget_item" style="width: '.$icons_width.'px;height: '.$icons_height.'px;background-image: url(\''.JURI::base(true).'/modules/mod_creativesocialwidget/assets/images/'.$link['type_name'].'/icon-'.$ssw_id_template.'-'.$ssw_animation_imgname.'-'.$icons_width.'.png\');" >
								<a href="'.$ssw_url.'" title="'.$link['link_name'].'"'.$ssw_target.'></a>
							</div>
						';
				echo '</div>';
		}
		echo '<div title="Powered By Creative Social Widget" class="creativesocialwidget_item_wrapper" style="font-size: 10px !important;text-align: right;font-style: italic;white-space: nowrap;width: '.$icons_width.'px; margin: 0;vertical-align: bottom;">';
			echo 'By <a class="csw_powred_by_a" href="http://creative-solutions.net/joomla/creative-social-widget" target="_blank" >CSW</a>';
		echo '</div>';

		echo '</div>';
	echo '</div>';
}
else echo 'There are no links to be shown!';
?>
<style>
.csw_powred_by_a {
	color: #0092DB;
	font-weight: bold;
	text-shadow: 1px 0px 0px rgba(0, 0, 0, 0.8);
	font-size: 11px;

	-webkit-transition:  all linear 0.2s;
	-moz-transition: all linear 0.2s;
	-o-transition: all linear 0.2s;
	transition: all linear 0.2s;
}
.csw_powred_by_a:hover {
	color: rgb(228, 6, 6);
	text-decoration: none;
}
</style>
