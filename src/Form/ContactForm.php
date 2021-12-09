<?php
/**
 * @file
 * Contains \Drupal\first_module\Form\ContactForm.
 */
namespace Drupal\first_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ContactForm extends FormBase {
  
  public function getFormId() {
    return 'first_module_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['custom_text_field'] = [
      '#type' => 'textfield',
      '#title' => 'Text field:',
      '#required' => TRUE,
    ];
    // var_dump("Hola estoy aqui");
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {}

}