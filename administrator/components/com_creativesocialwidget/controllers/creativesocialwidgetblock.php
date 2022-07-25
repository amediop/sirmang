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

jimport('joomla.application.component.controllerform');

class CreativesocialwidgetControllerCreativesocialwidgetblock extends JControllerForm
{
	function __construct($default = array()) {
		parent::__construct($default);
	
		$this->registerTask('save', 'saveBlock');
		$this->registerTask('apply', 'saveBlock');
	}
	
	function saveBlock() {
		$id = JRequest::getInt('id',0);
		$model = $this->getModel('creativesocialwidgetblock');
	
		if ($model->saveBlock()) {
			$msg = JText::_( 'COM_CREATIVESOCIALWIDGET_BLOCK_SAVED' );
		} else {
			$msg = JText::_( 'COM_CREATIVESOCIALWIDGET_ERROR_SAVING_BLOCK' );
		}
	
		if($_REQUEST['task'] == 'apply' && $id != 0)
			$link = 'index.php?option=com_creativesocialwidget&view=creativesocialwidgetblock&layout=edit&id='.$id;
		else
			$link = 'index.php?option=com_creativesocialwidget&view=creativesocialwidgetblocks';
		$this->setRedirect($link, $msg);
	}
}
