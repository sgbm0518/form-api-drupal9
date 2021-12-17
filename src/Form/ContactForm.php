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
    $form['nombre'] = [
      '#type' => 'textfield',
      '#title' => 'Nombre:',
      '#required' => TRUE,
    ];
    $form['apellido'] = [
      '#type' => 'textfield',
      '#title' => 'Apellido:',
      '#required' => TRUE,
    ];
    $form['telefono'] = [
      '#maxlength' => 14,
       '#pattern' => '[0-9]+',
      '#type' => 'tel',
      '#title' => 'Telefono:',
      '#required' => TRUE,
    ];
    $form['email'] = [
      '#type' => 'textfield',
      '#title' => 'Email:',
      '#required' => TRUE,
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Enviar'),
      '#button_type' => 'primary',
    );
    // var_dump("Hola estoy aqui");
    // die("no encuentro el dato");
    // $nombre= $form_state->getValue('nombre');
    // var_dump($nombre);
    return $form;
  }
  

  public function validateForm(array &$form, FormStateInterface $form_state) {
    // ctype_alnum -> tipo alfanumerico -> chequear posibles caracteres alfanumericos.
    // $form_state -> estado del formulario -> Almacena información sobre el estado de un formulario.
    // getValue -> Obtener valor -> Obtener el valor de la propiedad.

    if (ctype_alnum($form_state->getValue('nombre')) === false ) {
      $form_state->setErrorByName('nombre', $this->t('Por favor, introduzca sólo caracteres alfanuméricos'));
    }
    // setErrorByName.
    if (ctype_alnum($form_state->getValue('apellido')) === false) {
      $form_state->setErrorByName('apellido', $this->t('Por favor, introduzca sólo caracteres alfanuméricos'));
    }

    // if (is_numeric($form_state->getValue('telefono')) === false) {
    //   $form_state->setErrorByName('telefono', $this->t('Por favor, introduzca sólo caracteres númericos'));

    // }

    if (!filter_var($form_state->getValue('email'), FILTER_VALIDATE_EMAIL)) {
      $form_state->setErrorByName('email', $this->t('Por favor, introduzca bien su correo'));
    }
  
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage('Tus datos fueron registrados exitosamente');


}

}
