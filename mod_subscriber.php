<?php
/**
 * @copyright   Copyright (C) 2013 GiMeSpace All rights reserved.
 * @license     http://http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL 
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';


jFactory::getDocument()->addStyleSheet(JUri::base(TRUE).'/modules/mod_subscriber/assets/css/mod_subscriber.css');
jFactory::getDocument()->addScript(JUri::base(TRUE).'/modules/mod_subscriber/assets/js/jquery.cookie.js');
jFactory::getDocument()->addScript(JUri::base(TRUE).'/modules/mod_subscriber/assets/js/mod_subscriber.js');



require JModuleHelper::getLayoutPath('mod_subscriber');
