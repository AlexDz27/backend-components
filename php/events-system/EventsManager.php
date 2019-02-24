<?php

class EventsManager
{
  public $eventNameToCallback = array(
    SiteEvents::PASSED_SESSION_ONE_EVENT => 'onPassedSessionOne'
  );

  public function handleEvent($eventName, $args)
  {
    $method = $this->eventNameToCallback[$eventName];
    call_user_func_array(array($this, $method), $args);
  }

  public function onPassedSessionOne($username, $email)
  {
    $content = renderTemplate(
      dirname(__DIR__) . '/templates/email/passed-session-one.tpl.php',
      ['username' => $username]
    );

    $emailService = new EmailService();
    $emailService->send($email, 'Ready for some next level soccer?', $content);

    $currentUser = wp_get_current_user();
    add_user_meta($currentUser->ID, 'passed_session_one', 'true', true);
  }
}