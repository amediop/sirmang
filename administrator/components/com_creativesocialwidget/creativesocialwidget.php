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

/*
 * Define constants for all pages
 */
if(!defined('DS')){
	define('DS',DIRECTORY_SEPARATOR);
}
define('JV', (version_compare(JVERSION, '3', 'l')) ? 'j2' : 'j3');

// Require the base controller
require_once JPATH_COMPONENT.DS.'helpers'.DS.'helper.php';

// Initialize the controller
$controller	= JControllerLegacy::getInstance('CreativeSocialWidget');

$document = JFactory::getDocument();
$cssFile = JURI::base(true).'/components/com_creativesocialwidget/assets/css/icons_'.JV.'.css';
$document->addStyleSheet($cssFile, 'text/css', null, array());

// Perform the Request task
if(JV == 'j2')
	$controller->execute( JRequest::getCmd('task'));
else
	$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();