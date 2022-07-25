<?php
/**
* J51_Icons
* Version		: 1.0
* Created by	: Joomla51
* Email			: info@joomla51.com
* URL			: www.joomla51.com
* License GPLv2.0 - http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

$baseurl 			= JURI::base();
$j51_items    		= $params->get( 'j51_items' );
$j51_icon_margin_x	= $params->get( 'j51_icon_margin_x' );
$j51_icon_margin_y	= $params->get( 'j51_icon_margin_y' );
$j51_icon_color		= $params->get( 'j51_icon_color' );
$j51_icon_bg_color	= $params->get( 'j51_icon_bg_color' );
$j51_icon_set		= $params->get( 'j51_icon_set' );
$j51_icon_size		= $params->get( 'j51_icon_size' );
$j51_icon_layout	= $params->get( 'j51_icon_layout' );
$j51_icon_align		= $params->get( 'j51_icon_align' );
$j51_bg_style		= $params->get( 'j51_bg_style', 'boxed' );
$j51_bg_color		= $params->get( 'j51_bg_color', '#fff' );
$j51_icon_border_color	= $params->get( 'j51_icon_border_color', '#fff' );
$j51_icon_border_size	= $params->get( 'j51_icon_border_size', '2' );
$j51_icon_style		= $params->get( 'j51_icon_style' );
$j51_icon_columns	= $params->get( 'j51_icon_columns' );
$j51_icon_animate_class	= $params->get( 'j51_icon_animate_class' );
$j51_moduleid       = $module->id;

$j51_circle_size	= $j51_icon_size * 2;


// Load CSS/JS
$document = JFactory::getDocument();
$document->addStyleSheet (JURI::base() . 'modules/mod_j51icons/css/style.css' );

if ($j51_icon_set == 'ps7'){
  $document->addStyleSheet (JURI::base() . 'modules/mod_j51icons/css/pe-icon-7-stroke.css' ); 
}

if ($j51_icon_set == 'typcn'){
  $document->addStyleSheet (JURI::base() . 'modules/mod_j51icons/css/typicons.css' ); 
}

if ($j51_icon_set == 'bicon'){
  $document->addStyleSheet (JURI::base() . 'modules/mod_j51icons/css/bicon.min.css' ); 
}

// Styling from module parameters
$document->addStyleDeclaration('
.j51_icons'.$j51_moduleid.' {
	margin: -'.($j51_icon_margin_y / 2).'px -'.($j51_icon_margin_x / 2).'px;
}
.j51_icons'.$j51_moduleid.' i,
.j51_icons'.$j51_moduleid.' [class^="fa-"]::before, 
.j51_icons'.$j51_moduleid.' [class*=" fa-"]::before {
	font-size: '.$j51_icon_size.'px;
	color: '.$j51_icon_color.';
}
.j51_icons'.$j51_moduleid.' .j51_icon {
	flex: 0 0 '.$j51_icon_columns.';
	max-width: '.$j51_icon_columns.';
	min-height: '.$j51_circle_size.'px;
}
.j51_icons'.$j51_moduleid.' .j51_icon {
	padding: '.($j51_icon_margin_y / 2).'px '.($j51_icon_margin_x / 2).'px;
}
.j51_icons'.$j51_moduleid.' .boxed figure {
	background-color: '.$j51_bg_color.';
}
');

if ($j51_icon_style !== 'none') {
	$document->addStyleDeclaration('
		.j51_icons'.$j51_moduleid.' i {
			background-color: '.$j51_icon_bg_color.';
			line-height: '.($j51_icon_size * 1.8).'px;
			width: '.($j51_icon_size * 1.8).'px;
			border: '.$j51_icon_border_size.'px solid '.$j51_icon_border_color.';
		}
	');
}
if ($j51_icon_align !== 'center' and $j51_icon_style == 'none') {
	$document->addStyleDeclaration('
		.j51_icons' . $j51_moduleid . ' i {
			width: ' . $j51_icon_size . 'px;
		}
	');
}
if ($j51_icon_style == 'circle') {
	$document->addStyleDeclaration('
		.j51_icons'.$j51_moduleid.' i {
			border-radius: 50%;
		}
	');
}

?>

<div class="j51_icons j51_icons<?php echo $j51_moduleid; ?>" >

<?php foreach ($j51_items as $item) : ?>
		<div class="j51_icon j51_icon_layout_<?php echo $j51_icon_layout; ?> j51_icon_align_<?php echo $j51_icon_align; ?> animate <?php echo $item->j51_animate_class;?><?php if ($j51_bg_style == 'boxed') : echo ' boxed'; endif; ?>">
			<?php if($item->j51_iconurl != "") { ?>
			<a href="<?php echo $item->j51_iconurl; ?>" target="<?php echo $item->j51_targeturl; ?>">
			<?php } ?>
			<figure>
				<i class="<?php if ($j51_icon_set == 'typcn') {echo 'typcn typcn-';} ?><?php if ($j51_icon_set == 'bicon') {echo 'bi ';} ?><?php echo $item->j51_icon; ?>" >
				</i>
				<figcaption>
					<?php if($item->j51_icon_title  != "") : ?>
					<h3><?php echo $item->j51_icon_title; ?></h3>
					<?php endif; ?>
					<p><?php echo $item->j51_icon_desc; ?></p>
				</figcaption>
			</figure>
			<?php if($item->j51_iconurl != "") { ?>
			</a>
			<?php } ?> 
		</div>
<?php endforeach ?>

</div>

<div style= "clear:both;"></div>

