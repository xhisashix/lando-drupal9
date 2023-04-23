<?php

namespace Drupal\marucha\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the Sample entity.
 *
 * @ingroup sample
 *
 * @ContentEntityType(
 * id = "sample",
 * label = @Translation("Sample"),
 * base_table = "sample",
 * entity_keys = {
 * "id" = "id",
 * "uuid" = "uuid",
 * },
 * )
 */
class Sample extends ContentEntityBase implements ContentEntityInterface
{

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
  {

    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Sample entity.'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Sample entity.'))
      ->setReadOnly(TRUE);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the Sample entity.'));

    return $fields;
  }
}
