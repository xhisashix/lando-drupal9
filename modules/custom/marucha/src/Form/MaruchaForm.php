<?php

namespace Drupal\marucha\Form;

use Drupal\Component\Utility\EmailValidator;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Psr\Container\ContainerInterface;

/**
 * Class MaruchaForm.
 */
class MaruchaForm extends FormBase
{

  protected $email_validator;

  public function __construct(EmailValidator $email_validator)
  {
    $this->email_validator = $email_validator;
  }

  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('email.validator')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'marucha_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('Name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#description' => $this->t('Email'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone'),
      '#description' => $this->t('Phone'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['radio'] = [
      '#type' => 'radios',
      '#title' => $this->t('ラジオボタン'),
      '#description' => $this->t('Radio'),
      '#options' => [
        '1' => $this->t('1'),
        '2' => $this->t('2'),
        '3' => $this->t('3'),
      ],
      '#weight' => '0',
    ];
    $form['checkbox'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('チェックボックス'),
      '#description' => $this->t('Checkbox'),
      '#options' => [
        '1' => $this->t('1'),
        '2' => $this->t('2'),
        '3' => $this->t('3'),
      ],
      '#weight' => '0',
    ];
    $form['select'] = [
      '#type' => 'select',
      '#title' => $this->t('セレクトボックス'),
      '#description' => $this->t('Select'),
      '#options' => [
        '1' => $this->t('1'),
        '2' => $this->t('2'),
        '3' => $this->t('3'),
      ],
      '#weight' => '0',
    ];
    $form['color'] = [
      '#type' => 'color',
      '#title' => $this->t('カラーピッカー'),
      '#description' => $this->t('Color'),
      '#weight' => '0',
    ];
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
      '#description' => $this->t('Message'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    $email = $form_state->getValue('email');
    // if (!\Drupal::service('email.validator')->isValid($email)) {
    if ($this->email_validator->isValid($email) == FALSE) {
      $form_state->setErrorByName('email', $this->t('The email address is not valid.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // Submit rules.
    $this->messenger()->addMessage($this->t('Your message has been sent.'));
  }
}
