<?php

trait TriggersEvents
{
  public function triggerEvent($event, ...$args)
  {
    $eventsManager = new EventsManager();
    $eventsManager->handleEvent($event, $args);
  }
}