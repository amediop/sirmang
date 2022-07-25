<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Component
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\HTML\HTMLHelper;
jimport( 'joomla.application.component.view' );
phocadownloadimport('phocadownload.render.renderadminviews');

class phocaDownloadViewphocaDownloadLinkCats extends HtmlView
{

	protected $t;

	function display($tpl = null) {
		$app	= Factory::getApplication();
		$this->r = new PhocaDownloadRenderAdminViews();
		$this->t = PhocaDownloadUtils::setVars('linkcats');

		//Frontend Changes
		$tUri = '';
		if (!$app->isClient('administrator')) {
			$tUri = Uri::base();

		}

		$document	= Factory::getDocument();
		$uri		= Uri::getInstance();
		HTMLHelper::stylesheet( 'media/com_phocadownload/css/administrator/phocadownload.css' );

		$eName				= $app->input->get('e_name');
		$this->t['ename']		= preg_replace( '#[^A-Z0-9\-\_\[\]]#i', '', $eName );
		$this->t['backlink']	= $tUri.'index.php?option=com_phocadownload&amp;view=phocadownloadlinks&amp;tmpl=component&amp;e_name='.$this->t['ename'];


	/*	// Category Tree
		$db = Factory::getDBO();
		$query = 'SELECT a.title AS text, a.id AS value, a.parent_id as parentid'
		. ' FROM #__phocadownload_categories AS a'
	//	. ' WHERE a.published = 1' You can hide not published and not authorized categories too
	//	. ' AND a.approved = 1'
		. ' ORDER BY a.ordering';
		$db->setQuery( $query );
		$categories = $db->loadObjectList();

		$tree = array();
		$text = '';
		$tree = PhocaDownloadCategory::CategoryTreeOption($categories, $tree, 0, $text, -1);
		//-----------------------------------------------------------------------

		// Multiple
		$ctrl	= 'hidecategories';
		$attribs	= ' ';
		$attribs	.= ' size="5"';
		//$attribs	.= 'class="'.$v.'"';
		$attribs	.= ' class="form-control"';
		$attribs	.= ' multiple="multiple"';
		$ctrl		.= '';
		//$value		= implode( '|', )

		$categoriesOutput = HTMLHelper::_('select.genericlist', $tree, $ctrl, $attribs, 'value', 'text', 0, 'hidecategories' );

		//$this->assignRef('categoriesoutput',	$categoriesOutput);
		//$this->assignRef('tmpl',	$this->t);*/
		parent::display($tpl);
	}
}
?>