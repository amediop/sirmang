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

jimport('joomla.application.component.modellist');

class CreativesocialwidgetModelCreativesocialwidgetblocks extends JModelList {
	
	/**
	 * Constructor.
	 *
	 * @param	array	An optional associative array of configuration settings.
	 * @see		JController
	 * @since	1.6
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
					'id', 'sp.id',
					'name', 'sp.name',
					'alias', 'sp.alias',
					'published', 'sp.published',
					'num_items',
					'checked_out', 'sp.checked_out',
					'checked_out_time', 'sp.checked_out_time',
					'access', 'sp.access', 'access_level',
					'ordering', 'sp.ordering',
					'featured', 'sp.featured',
					'publish_up', 'sp.publish_up',
					'publish_down', 'sp.publish_down'
			);
		}
	
		parent::__construct($config);
	}
	
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @return	void
	 * @since	1.6
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$app = JFactory::getApplication();
	
		// Adjust the context to support modal layouts.
		if ($layout = JRequest::getVar('layout')) {
			$this->context .= '.'.$layout;
		}
	
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
	
		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);
	
		// List state information.
		parent::populateState('sp.name', 'asc');
	}
	
	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param	string		$id	A prefix for the store id.
	 *
	 * @return	string		A store id.
	 * @since	1.6
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('filter.search');
		$id	.= ':'.$this->getState('filter.published');
	
		return parent::getStoreId($id);
	}
	
	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return	JDatabaseQuery
	 * @since	1.6
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$user	= JFactory::getUser();
	
		// Select the required fields from the table.
		$query->select(
				$this->getState(
						'list.select',
						'sp.id, sp.name, MAX(sp.id) AS max_id'.
						', sp.published, sp.created, sp.ordering, sp.featured, sp.language'.
						', sp.publish_up, sp.publish_down'
				)
		);
		$query->from('#__creativesocialwidget_blocks AS sp');
		
		// Join over the answers.
		$query->select('COUNT(sa.id) AS num_items');
		$query->join('LEFT', '#__creativesocialwidget_items AS sa ON sa.id_share=sp.id');
	
		// Filter by published state
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('sp.published = ' . (int) $published);
		}
		elseif ($published === '') {
			$query->where('(sp.published = 0 OR sp.published = 1)');
		}
	
		// Filter by search in name.
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('sp.id = '.(int) substr($search, 3));
			}
			else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where('(sp.name LIKE '.$search.' )');
			}
		}
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'sp.name');
		$orderDirn	= $this->state->get('list.direction', 'asc');
		/*
		if ($orderCol == 'a.ordering' || $orderCol == 'category_title') {
			$orderCol = 'c.title '.$orderDirn.', a.ordering';
		}
		*/
		$query->order($db->escape($orderCol.' '.$orderDirn));
		$query->group('sp.id');
	
		return $query;
	}
}