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
	if (task == 'creativesocialwidgetitem.cancel') {
		submitform( task );
	}
	else {
		if (form.jform_name.value != ""){
			form.jform_name.style.border = "1px solid green";
		} 
		
		if (form.jform_name.value == ""){
			form.jform_name.style.border = "1px solid red";
			form.jform_name.focus();
		} 
		else {
			submitform( task );
		}
	}
}
</script>
<?php if(JV == 'j2') {//////////////////////////////////////////////////////////////////////////////////////Joomla2.x/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<form action="<?php echo JRoute::_('index.php?option=com_creativesocialwidget&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="helloworld-form">
<?php if(($this->max_id < 5) || ($this->item->id != 0)) {?>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_DETAILS' ); ?></legend>
		<ul class="adminformlist">
		<?php foreach($this->form->getFieldset() as $field): ?>
					<li><?php echo $field->label;echo $field->input;?></li>
		<?php endforeach; ?>
		</ul>
	</fieldset>
	<?php } else { ?>
				<div style="color: rgb(235, 9, 9);font-size: 16px;font-weight: bold;">Please Upgrade to PRO Version to have more than five Creative Answers!</div>
					<div id="cpanel" style="float: left;">
					<div class="icon" style="float: right;">
					<a href="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_BUY_PRO_VERSION_LINK' ); ?>" target="_blank" title="Please Upgrade to PRO Version to have more than five Creative Answers!">
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
					<div style="font-style: italic;font-size: 12px;color: #949494;clear: both;">If you've deleted link icons, but still see this message, please clear the answers trash.</div>
			<?php }?>
	<div>
		<input type="hidden" name="task" value="creativesocialwidgetitem.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<?php include (JPATH_BASE.'/components/com_creativesocialwidget/helpers/footer.php'); ?>
<?php }elseif(JV == 'j3') {//////////////////////////////////////////////////////////////////////////////////////Joomla3.x/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<?php 
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>
<form action="<?php echo JRoute::_('index.php?option=com_creativesocialwidget&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal">
	<div class="row-fluid">
		<!-- Begin Newsfeed -->
		<div class="span10 form-horizontal">
			<?php if(($this->max_id < 35) || ($this->item->id != 0)) {?>
			<fieldset>
				<div class="tab-content">
					<div class="tab-pane active" id="details">
						<div class="control-group">
							<?php 
							$k = 0;
							foreach($this->form->getFieldset() as $field): ?>
							<?php if($this->item->id == 0 && $k == 4) {$k++;continue;}?>
								<div class="control-label" style="position: relative;">
									<?php 
										echo $field->label;
										if($k == 4) {
											$db = JFactory::getDBO();
											$query = " SELECT url from #__creativesocialwidget_link_types WHERE id = '".$this->item->id_type."'";
											$db->setQuery($query);
											$url = $db->loadResult();
											$url = $url == '#' ? '' : $url;
											echo '<div style="text-decoration: underline;width: 150px;text-align: right;position: absolute;top: 5px;left: 26px;color: #08c">'.$url.'</div>';
										}
									?>
								</div>
								<div class="controls"><?php echo $field->input;?></div>
								<div style="clear: both;height: 8px;">&nbsp;</div>
							<?php 
							$k ++;
							endforeach; ?>
						</div>
					</div>
				</div>
			</fieldset>
			<?php } else { ?>
				<div style="color: rgb(235, 9, 9);font-size: 16px;font-weight: bold;">Please Upgrade to PRO Version to have more than five Creative Answers!</div>
					<div id="cpanel" style="float: left;">
					<div class="icon" style="float: right;">
					<a href="<?php echo JText::_( 'COM_CREATIVESOCIALWIDGET_SUBMENU_BUY_PRO_VERSION_LINK' ); ?>" target="_blank" title="Please Upgrade to PRO Version to have more than five Creative Answers!">
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
					<div style="font-style: italic;font-size: 12px;color: #949494;clear: both;">If you've deleted link icons, but still see this message, please clear the answers trash.</div>
			<?php }?>
		</div>
	</div>
<input type="hidden" name="task" value="creativesocialwidgetitem.edit" />
<?php echo JHtml::_('form.token'); ?>
</form>
<?php include (JPATH_BASE.'/components/com_creativesocialwidget/helpers/footer.php'); ?>
<?php }?>
