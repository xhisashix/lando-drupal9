<?php

namespace Drupal\new_relic_rpm\Commands;

use Drush\Commands\DrushCommands;
use Drupal\new_relic_rpm\Client\NewRelicApiClient;

/**
 * Corporate system drush commands.
 */
class NewRelicRpmCommands extends DrushCommands {

  /**
   * Newrelic API client.
   *
   * @var \Drupal\new_relic_rpm\Client\NewRelicApiClient
   */
  protected $apiClient;

  /**
   * NewRelicRpmCommands constructor.
   *
   * @param \Drupal\new_relic_rpm\Client\NewRelicApiClient $api_client
   *   Newrelic API client.
   */
  public function __construct(NewRelicApiClient $api_client) {
    parent::__construct();
    $this->apiClient = $api_client;
  }

  /**
   * Mark a deployment in newrelic.
   *
   * @param string $revision
   *   The revision label.
   * @param array $options
   *   The options to pass through to the deplopment.
   *
   * @command new-relic-rpm:deploy
   * @aliases nrd
   *
   * @option description
   *   A brief description of the deployment.
   * @option user
   *   User doing the deploy.
   * @option changelog
   *   A list of changes for this deployment.
   *
   * @usage new-relic-rpm:deploy 1.2.3
   *   Create a deployment with revision 1.2.3.
   * @usage new-relic-rpm:deploy 1.2.3 --description="New release".
   *   Create a deployment with revision 1.2.3 and a specific description.
   *
   * @validate-module-enabled new_relic_rpm
   */
  public function deploy($revision, array $options = [
    'description' => NULL,
    'user' => NULL,
    'changelog' => NULL,
  ]) {
    $deployment = $this->apiClient->createDeployment($revision, $options['description'], $options['user'], $options['changelog']);

    if ($deployment) {
      $this->output()->writeln('New Relic deployment created successfully.');
    }
    else {
      $this->logger()->error(dt('New Relic deployment failed.'));
    }
  }

}
