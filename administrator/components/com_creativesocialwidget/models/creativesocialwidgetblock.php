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

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

class CreativesocialwidgetModelCreativesocialwidgetblock extends JModelAdmin
{
	
	//get max id
	public function getMax_id()
	{
		// Create a new query object.
		$db		= $this->getDbo();
		$query = 'SELECT COUNT(id) AS count_id FROM #__creativesocialwidget_blocks';
		$db->setQuery($query);
		$max_id = $db->loadResult();
		return $max_id;
	}
	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'Creativesocialwidgetblock', $prefix = 'CreativesocialwidgetblockTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		Data for the form.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	mixed	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true) 
	{
		// Get the form.
		$form = $this->loadForm('com_creativesocialwidget.creativesocialwidgetblock', 'creativesocialwidgetblock', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) 
		{
			return false;
		}
		return $form;
	}
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData() 
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_creativesocialwidget.edit.creativesocialwidgetblock.data', array());
		if (empty($data)) 
		{
			$data = $this->getItem();
		}
			$data = $this->getItem();
		return $data;
	}
	
	protected function canEditState($record)
	{
		return parent::canEditState($record);
	}
	
	/**
	 * Method to save block
	 */
	function saveBlock()
	{
		$date = new JDate();
		$id = JRequest::getInt('id',0);
	
		$req = new JObject();
		
		$req->name =  str_replace('\\','', htmlspecialchars($_REQUEST['name'], ENT_QUOTES) );
		$req->published = (int)$_REQUEST['published'];
		$req->id_template = (int)$_REQUEST['id_template'];
		$req->size = (int)$_REQUEST['size'];
		$req->animation = (int)$_REQUEST['animation'];
		$req->icons_offset =  str_replace('\\','', htmlspecialchars($_REQUEST['icons_offset'], ENT_QUOTES) );
		$req->type = (int)$_REQUEST['type'];
		$req->align = (int)$_REQUEST['align'];
		$req->fixed_place = (int)$_REQUEST['fixed_place'];
		$req->fixed_top_offset = (int)$_REQUEST['fixed_top_offset'];
		$req->fixed_corner_offset = (int)$_REQUEST['fixed_corner_offset'];
		$req->fixed_content_width = (int)$_REQUEST['fixed_content_width'];
		$req->wrapper_width =  str_replace('\\','', htmlspecialchars($_REQUEST['wrapper_width'], ENT_QUOTES) );
		$req->wrapper_offset =  str_replace('\\','', htmlspecialchars($_REQUEST['wrapper_offset'], ENT_QUOTES) );
		$req->wrapper_color =  str_replace('\\','', htmlspecialchars($_REQUEST['wrapper_color'], ENT_QUOTES) );
		$req->wrapper_template = (int)$_REQUEST['wrapper_template'];
		$req->wrapper_animate = (int)$_REQUEST['wrapper_animate'];
	
		if($req->name == "") {
			return false;
		}
		elseif($id == 0) {//if id ==0, we add the record
			$req->id = NULL;
			if(JV == 'j2')
				$req->created = $date->toMySQL();
			else
				$req->created = $date->toSql();
	
			if (!$this->_db->insertObject( '#__creativesocialwidget_blocks', $req, 'id' )) {
				return false;
			}
		}
		else { //else update the record
			$req->id = $id;
			
			if (!$this->_db->updateObject( '#__creativesocialwidget_blocks', $req, 'id' )) {
				return false;
			}
		}
	
		return true;
	}
	
}
