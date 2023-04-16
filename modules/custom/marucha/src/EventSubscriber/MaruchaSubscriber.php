<?php

namespace Drupal\marucha\EventSubscriber;

use Drupal\marucha\Event\MaruchaFirstEvent;
use Drupal\marucha\Event\MaruchaEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class MaruchaSubscriber implements EventSubscriberInterface
{
  public static function getSubscribedEvents()
  {
    return [
      MaruchaEvents::FIRST_EVENT => 'onMaruchaFirstEvent',
    ];
  }

  public function onMaruchaFirstEvent(MaruchaFirstEvent $event)
  {
    $account = $event->getAccount();
    \Drupal::messenger()->addStatus('ログインしました：' . $account->getAccountName());
  }
}

?>
