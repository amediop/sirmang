<?php

use Joomla\CMS\Factory;
use Nextend\SmartSlider3\Platform\Joomla\AdministratorComponent;

if (!version_compare(PHP_VERSION, '7.0', '>=')) {
    Factory::getApplication()
           ->enqueueMessage('Smart Slider 3 requires 7.0+, extension is currently NOT RUNNING.', 'warning');
} else if (!version_compare(JVERSION, '3.9', '>=')) {
    Factory::getApplication()
           ->enqueueMessage('Smart Slider 3 requires Joomla 3.9+. Because you are using an earlier version, the extension is currently NOT RUNNING.', 'warning');
} else {

    jimport("smartslider3.joomla");

    if (class_exists('\Nextend\SmartSlider3\Platform\Joomla\AdministratorComponent')) {
        new AdministratorComponent();
    }
}