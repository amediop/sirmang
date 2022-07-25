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

?>
<div id="m_wrapper">
<div id="cpanel">
	<div class="icon">
		<a href="index.php?option=com_creativesocialwidget&view=creativesocialwidgetblocks" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_SHARES' ); ?>">
			<table style="width: 100%;height: 100%;text-decoration: none;">
				<tr>
					<td align="center" valign="middle">
						<img src="components/com_creativesocialwidget/assets/images/widgets.png" /><br />
						<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_SHARES' ); ?>
					</td>
				</tr>
			</table>
		</a>
	</div>
</div>
<div id="cpanel">
	<div class="icon">
		<a href="index.php?option=com_creativesocialwidget&view=creativesocialwidgetitems" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_ITEMS' ); ?>">
			<table style="width: 100%;height: 100%;text-decoration: none;">
				<tr>
					<td align="center" valign="middle">
						<img src="components/com_creativesocialwidget/assets/images/icons.png" /><br />
						<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_ITEMS' ); ?>
					</td>
				</tr>
			</table>
		</a>
	</div>
</div>

<div id="cpanel">
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
<div id="cpanel">
	<div class="icon" style="float: right;">
		<a href="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_RATE_US_LINK' ); ?>" target="_blank" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_RATE_US_DESCRIPTION' ); ?>">
			<table style="width: 100%;height: 100%;text-decoration: none;">
				<tr>
					<td align="center" valign="middle">
						<img src="components/com_creativesocialwidget/assets/images/icon-star-48.png" /><br />
						<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_RATE_US' ); ?>
					</td>
				</tr>
			</table>
		</a>
	</div>
</div>
<div id="cpanel">
	<div class="icon" style="float: right;">
		<a href="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_SUPPORT_FORUM_LINK' ); ?>" target="_blank" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_SUPPORT_FORUM_DESCRIPTION' ); ?>">
			<table style="width: 100%;height: 100%;text-decoration: none;">
				<tr>
					<td align="center" valign="middle">
						<img src="components/com_creativesocialwidget/assets/images/forum.png" /><br />
						<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_SUPPORT_FORUM' ); ?>
					</td>
				</tr>
			</table>
		</a>
	</div>
</div>
<div id="cpanel">
	<div class="icon" style="float: right;">
		<a href="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_PROJECT_HOMEPAGE_LINK' ); ?>" target="_blank" title="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_PROJECT_HOMEPAGE_DESCRIPTION' ); ?>">
			<table style="width: 100%;height: 100%;text-decoration: none;">
				<tr>
					<td align="center" valign="middle">
						<img src="components/com_creativesocialwidget/assets/images/project.png" /><br />
						<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_PROJECT_HOMEPAGE' ); ?>
					</td>
				</tr>
			</table>
		</a>
	</div>
</div>


<?php include (JPATH_BASE.'/components/com_creativesocialwidget/helpers/footer.php'); ?>
</div>
