<?php
/**
 * @version    SVN: <svn_id>
 * @package    ActivityStream
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2016 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */
defined('_JEXEC') or die( 'Restricted access');
jimport('joomla.plugin.plugin');

$lang =  JFactory::getLanguage();
$lang->load('plg_api_tjactivity', JPATH_ADMINISTRATOR);

/**
 * Base Class for api plugin
 *
 * @package     ActivityStream
 * @subpackage  component
 * @since       1.0
 */
class PlgAPITjactivity extends ApiPlugin
{
	/**
	 * ActivityStream api plugin to load com_api classes
	 *
	 * @param   string  $subject  originalamount
	 * @param   array   $config   coupon_code
	 *
	 * @since   1.0
	 */
	public function __construct($subject, $config = array())
	{
		parent::__construct($subject, $config = array());

		// Load all required helpers.
		$component_path = JPATH_ROOT . '/components/com_activitystream';

		if (!file_exists($component_path))
		{
			return;
		}

		$ActivityStreamModelActivitiesPath = JPATH_ADMINISTRATOR . '/components/com_activitystream/models/activities.php';

		if (!class_exists('ActivityStreamModelActivities'))
		{
			JLoader::register('ActivityStreamModelActivities', $ActivityStreamModelActivitiesPath);
			JLoader::load('ActivityStreamModelActivities');
		}

		ApiResource::addIncludePath(dirname(__FILE__) . '/tjactivity');
	}
}
