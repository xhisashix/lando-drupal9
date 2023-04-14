<?php

/**
 * This is hello world hook.
 *
 * This hook is used to display hello world message.
 */
function hook_marucha_hello_world()
{
  \Drupal::messenger()->addStatus('Hello World');
}
