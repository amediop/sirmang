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

class CreativesocialwidgetModelCreativesocialwidgetitem extends JModelAdmin
{
	
	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	
	public function getTable($type = 'Creativesocialwidgetitem', $prefix = 'CreativesocialwidgetitemTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	//get max id
	public function getMax_id()
	{
		// Create a new query object.
		$db		= $this->getDbo();
		$query = 'SELECT COUNT(id) AS count_id FROM #__creativesocialwidget_items';
		$db->setQuery($query);
		$max_id = $db->loadResult();
		return $max_id;
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
		$form = $this->loadForm('com_creativesocialwidget.creativesocialwidgetitem', 'creativesocialwidgetitem', array('control' => 'jform', 'load_data' => $loadData));
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
		$data = JFactory::getApplication()->getUserState('com_creativesocialwidget.edit.creativesocialwidgetitem.data', array());
		if (empty($data)) 
		{
			$data = $this->getItem();
		}
		return $data;
	}
	
	
	protected function canEditState($record)
	{
		return parent::canEditState($record);
	}
	
	
	/**
	 * Method to save answer
	 */
	function saveAnswer()
	{
		$date = new JDate();
		$id = JRequest::getInt('id',0);
	
	
		$req = new JObject();
		$req->name =  str_replace('\\','', htmlspecialchars($_REQUEST['jform']['name'], ENT_QUOTES) );
	
		$req->id_poll = (int)$_REQUEST['jform']['id_poll'];
		$req->published = (int)$_REQUEST['jform']['published'];
	
		if($req->id_poll == 0 || $req->name == "") {
			return false;
		}
		elseif($id == 0) {//if id ==0, we add the record
			$req->id = NULL;
			if(JV == 'j2')
				$req->created = $date->toMySQL();
			else
				$req->created = $date->toSql();
	
			if (!$this->_db->insertObject( '#__creative_answers', $req, 'id' )) {
				return false;
			}
		}
		else { //else update the record
			$req->id = $id;
			$res = (int)$_REQUEST['jform']['reset_votes'];
			if($res == 1) {
				$sql = 'DELETE FROM `#__creative_votes` '
				. ' WHERE `id_answer` = '.$id;
				$this->_db->setQuery($sql);
				$this->_db->query();
			}
	
			if (!$this->_db->updateObject( '#__creative_answers', $req, 'id' )) {
				return false;
			}
		}
	
		return true;
	}
}