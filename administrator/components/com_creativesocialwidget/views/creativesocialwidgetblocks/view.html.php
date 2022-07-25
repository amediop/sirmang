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

// Import Joomla! libraries
jimport( 'joomla.application.component.view');


class CreativesocialwidgetViewCreativesocialwidgetblocks extends JViewLegacy {
	
	protected $items;
	protected $pagination;
	protected $state;
	
	/**
	 * Display the view
	 *
	 * @return	void
	 */
    public function display($tpl = null) {
    	
    	$this->items		= $this->get('Items');
    	$this->pagination	= $this->get('Pagination');
    	$this->state		= $this->get('State');
 
    	if(JV == 'j2') {
    		
    	}
    	else {
	       	JHtmlSidebar::addFilter(
	       			JText::_('JOPTION_SELECT_PUBLISHED'),
	       			'filter_published',
	       			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true)
	       	);
    	}
       		
       	$this->addToolbar();
       	if(JV == 'j3')
       		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
    }
    
    /**
     * Add the page title and toolbar.
     *
     * @since	1.6
     */
	protected function addToolbar()
	{
		JToolBarHelper::addNew('creativesocialwidgetblock.add');
		JToolBarHelper::editList('creativesocialwidgetblock.edit');
		    	
		JToolBarHelper::divider();
		JToolBarHelper::publish('creativesocialwidgetblocks.publish', 'JTOOLBAR_PUBLISH', true);
		JToolBarHelper::unpublish('creativesocialwidgetblocks.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolBarHelper::divider();
	    
    	if ($this->state->get('filter.published') == -2) {
    		JToolBarHelper::deleteList('', 'creativesocialwidgetblocks.delete', 'JTOOLBAR_EMPTY_TRASH');
    		JToolBarHelper::divider();
    	}
    	else {
    		JToolBarHelper::trash('creativesocialwidgetblocks.trash');
    		JToolBarHelper::divider();
    	}
	    
		JToolBarHelper::divider();
	}
	
	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   3.0
	 */
	protected function getSortFields()
	{
		return array(
				'sp.ordering' => JText::_('JGRID_HEADING_ORDERING'),
				'sp.name' => JText::_('COM_CREATIVESOCIALWIDGET_NAME'),
				'sp.published' => JText::_('JSTATUS'),
				'num_items' => JText::_('COM_CREATIVESOCIALWIDGET_NUM_ITEMS'),
				'sp.id' => JText::_('JGRID_HEADING_ID')
		);
	}
}