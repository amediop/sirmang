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
jimport('joomla.application.component.modellist');
	
class CreativesocialwidgetModelCreativesocialwidgetitems extends JModelList {

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
					'id', 'sa.id',
					'name', 'sa.name',
					'share_name',
					'type_name',
					'published', 'sa.published',
					'ordering', 'sa.ordering',
					'publish_up', 'sa.publish_up',
					'publish_down', 'sa.publish_down'
			);
		}

		parent::__construct($config);
	}
	
	/**
	 * Method to get share options
	 *
	 */
	public function getCreativeShares() {
		$db		= $this->getDbo();
		$sql = "SELECT `id`, `name` FROM `#__creativesocialwidget_blocks` WHERE `published` <> '-2' order by `ordering`,`name` ";
		$db->setQuery($sql);
		return $opts = $db->loadObjectList();
	}
	
	/**
	 * Method to get type options
	 *
	 */
	public function getCreativeLinkTypes() {
		$db		= $this->getDbo();
		$sql = "SELECT `id`, `name` FROM `#__creativesocialwidget_link_types`";
		$db->setQuery($sql);
		return $opts = $db->loadObjectList();
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

		$shareId = $this->getUserStateFromRequest($this->context.'.filter.id_share', 'filter_id_share');
		$this->setState('filter.id_share', $shareId);
		
		$linkTypeId = $this->getUserStateFromRequest($this->context.'.filter.id_link_type', 'filter_id_link_type');
		$this->setState('filter.id_link_type', $linkTypeId);
			
		// List state information.
		parent::populateState('sa.ordering', 'asc');
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
		$id	.= ':'.$this->getState('filter.id_share');
		$id	.= ':'.$this->getState('filter.id_link_type');

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
						'sa.id, sa.name, sa.published, sa.ordering'.
						', sa.publish_up, sa.publish_down'
				)
		);
		
		$query->from('#__creativesocialwidget_items AS sa');
			
		// get only published polls answers
		$query->join('INNER', '#__creativesocialwidget_blocks AS sp1 ON sp1.id=sa.id_share AND sp1.published <> -2');

		// Join over the blocks.
		$query->select('sp.name AS share_name,sp.id AS id_share');
		$query->join('left', '#__creativesocialwidget_blocks AS sp ON sp.id=sa.id_share');

		// Join over the blocks.
		$query->select('st.name AS type_name,sp.id AS id_link_type');
		$query->join('left', '#__creativesocialwidget_link_types AS st ON st.id=sa.id_type');

		// Filter by published state
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('sa.published = ' . (int) $published);
		}
		elseif ($published === '') {
			$query->where('(sa.published = 0 OR sa.published = 1)');
		}

		// Filter by a single or group of shares.
		$shareId = $this->getState('filter.id_share');
		if (is_numeric($shareId)) {
			$query->where('sa.id_share = '.(int) $shareId);
		}
		elseif (is_array($shareId)) {
			JArrayHelper::toInteger($shareId);
			$shareId = implode(',', $shareId);
			$query->where('sa.id_share IN ('.$shareId.')');
		}
		// Filter by a single or group of types.
		$linkTypeId = $this->getState('filter.id_link_type');
		if (is_numeric($linkTypeId)) {
			$query->where('sa.id_type = '.(int) $linkTypeId);
		}
		elseif (is_array($linkTypeId)) {
			JArrayHelper::toInteger($linkTypeId);
			$linkTypeId = implode(',', $linkTypeId);
			$query->where('sa.id_type IN ('.$linkTypeId.')');
		}

		// Filter by search in name.
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('sa.id = '.(int) substr($search, 3));
			}
			else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where('(sa.name LIKE '.$search.')');
			}
		}

		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'sa.ordering');
		$orderDirn	= $this->state->get('list.direction', 'asc');
		/*
			if ($orderCol == 'a.ordering' || $orderCol == 'category_title') {
		$orderCol = 'c.title '.$orderDirn.', a.ordering';
		}
		*/
		$query->order($db->escape($orderCol.' '.$orderDirn));
		$query->group('sa.id');

		//echo nl2br(str_replace('#__','jos_',$query));
		return $query;
	}
}
