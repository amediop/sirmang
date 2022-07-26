<?php
/*
 * @package		Joomla.Framework
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 *
 * @component Phoca Component
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
defined('_JEXEC') or die('Restricted access');
use Joomla\CMS\Table\Table;
use Joomla\CMS\Language\Text;
use Joomla\Utilities\ArrayHelper;
jimport('joomla.filter.input');

class TablePhocaDownload extends Table
{

	function __construct(& $db) {
		parent::__construct('#__phocadownload', 'id', $db);
	}

	function check()
	{

		// check for valid name but not by text
		if ((int)$this->textonly == 1) {
		} else {
			if (trim( $this->filename ) == '') {

				throw new Exception(Text::_( 'FILE MUST HAVE A FILENAME'), 500);
				return false;
			}
		}

		if(empty($this->title)) {
			$this->title = PhocaDownloadFile::getTitleFromFilenameWithoutExt($this->filename);
		}

		if(empty($this->alias)) {
			$this->alias = $this->title;
		}
		$this->alias = PhocaDownloadUtils::getAliasName($this->alias);

		return true;
	}

	public function approve($pks = null, $state = 1, $userId = 0)
	{
		// Initialise variables.
		$k = $this->_tbl_key;

		// Sanitize input.
		ArrayHelper::toInteger($pks);
		$userId = (int) $userId;
		$state  = (int) $state;

		// If there are no primary keys set check to see if the instance key is set.
		if (empty($pks))
		{
			if ($this->$k) {
				$pks = array($this->$k);
			}
			// Nothing to set publishing state on, return false.
			else {

				throw new Exception(Text::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'), 500);
				return false;
			}
		}

		// Build the WHERE clause for the primary keys.
		$where = $k.'='.implode(' OR '.$k.'=', $pks);

		// Determine if there is checkin support for the table.
		if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time')) {
			$checkin = '';
		}
		else {
			$checkin = ' AND (checked_out = 0 OR checked_out = '.(int) $userId.')';
		}

		// Update the publishing state for rows with the given primary keys.
		$this->_db->setQuery(
			'UPDATE `'.$this->_tbl.'`' .
			' SET `approved` = '.(int) $state .
			' WHERE ('.$where.')' .
			$checkin
		);
	/*	$this->_db->query();

		// Check for a database error.
		if ($this->_db->getErrorNum()) {
			throw new Exception($this->_db->getErrorMsg(), 500);
			return false;
		}*/

		try {
			$this->_db->execute();
		} catch (RuntimeException $e) {
		    throw new Exception($e->getMessage(), 500);
			return false;
		}

		// If checkin is supported and all rows were adjusted, check them in.
		if ($checkin && (count($pks) == $this->_db->getAffectedRows()))
		{
			// Checkin the rows.
			foreach($pks as $pk)
			{
				$this->checkin($pk);
			}
		}

		// If the JTable instance value is in the list of primary keys that were set, set the instance.
		if (in_array($this->$k, $pks)) {
			$this->state = $state;
		}


		return true;
	}
}
?>
