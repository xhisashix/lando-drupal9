<?php

namespace Drupal\marucha\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class MaruchaForm.
 */
class MaruchaForm extends FormBase {

    /**
    * {@inheritdoc}
    */
    public function getFormId() {
      return 'marucha_form';
    }

    /**
    * {@inheritdoc}
    */
    public function buildForm(array $form, FormStateInterface $form_state) {
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
    public function validateForm(array &$form, FormStateInterface $form_state) {
      // Validation rules.
    }

    /**
    * {@inheritdoc}
    */
    public function submitForm(array &$form, FormStateInterface $form_state) {
      // Submit rules.
      $this->messenger()->addMessage($this->t('Your message has been sent.'));
    }
}
