<?php

require_once get_template_directory() . '/inc/SiteEvents.php';

require_once get_template_directory() . '/inc/services/TriggersEvents.php';
require_once get_template_directory() . '/inc/services/EventsManager.php';
require_once get_template_directory() . '/inc/services/EventsDispatcher.php';

$eventsDispatcher = new EventsDispatcher();
$eventsDispatcher->triggerEvent(SiteEvents::PASSED_SESSION_ONE_EVENT, 'username', 'email');