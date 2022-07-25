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

class CreativesocialwidgetViewCreativesocialwidgetitems extends JViewLegacy {
	
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
    	$shares	= $this->get('CreativeShares');
    	$types	= $this->get('CreativeLinkTypes');
 
    	//get category options
    	$options        = array();
    	foreach($shares AS $share) {
    		$options[]      = JHtml::_('select.option', $share->id, $share->name);
    	}
    	$options1        = array();
    	foreach($types AS $type) {
    		$options1[]      = JHtml::_('select.option', $type->id, $type->name);
    	}
    	if(JV == 'j2') {
    		$this->assignRef( 'share_options', $options );
    		$this->assignRef( 'type_options', $options1 );
    	}
    	else {
    		JHtmlSidebar::addFilter(
    				JText::_('JOPTION_SELECT_PUBLISHED'),
    				'filter_published',
    				JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true)
    		);
    		 
    		JHtmlSidebar::addFilter(
    				JText::_('COM_CREATIVESOCIALWIDGET_SELECT_SHARE'),
    				'filter_id_share',
    				JHtml::_('select.options', $options, 'value', 'text', $this->state->get('filter.id_share'))
    		);
    		 
    		JHtmlSidebar::addFilter(
    				JText::_('COM_CREATIVESOCIALWIDGET_SELECT_TYPE'),
    				'filter_id_link_type',
    				JHtml::_('select.options', $options1, 'value', 'text', $this->state->get('filter.id_link_type'))
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
    	JToolBarHelper::addNew('creativesocialwidgetitem.add');
    	JToolBarHelper::editList('creativesocialwidgetitem.edit');
	    	
		JToolBarHelper::divider();
 		JToolBarHelper::publish('creativesocialwidgetitems.publish', 'JTOOLBAR_PUBLISH', true);
		JToolBarHelper::unpublish('creativesocialwidgetitems.unpublish', 'JTOOLBAR_UNPUBLISH', true);
	    
    	if ($this->state->get('filter.published') == -2) {
    		JToolBarHelper::deleteList('', 'creativesocialwidgetitems.delete', 'JTOOLBAR_EMPTY_TRASH');
    		JToolBarHelper::divider();
    	}
    	else {
    		JToolBarHelper::trash('creativesocialwidgetitems.trash');
    		JToolBarHelper::divider();
    	}
	    
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
    			'sa.ordering' => JText::_('JGRID_HEADING_ORDERING'),
    			'sa.name' => JText::_('COM_CREATIVESOCIALWIDGET_NAME'),
    			'share_name' => JText::_('COM_CREATIVESOCIALWIDGET_SHARE'),
    			'type_name' => JText::_('COM_CREATIVESOCIALWIDGET_TYPE'),
    			'sa.published' => JText::_('JSTATUS'),
    			'sa.id' => JText::_('JGRID_HEADING_ID')
    	);
    }
}