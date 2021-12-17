<?php
/**
 * @file
 * Contains \Drupal\first_module\Controller\HelloController.
 */

namespace Drupal\first_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {
  
  public function content() {
	return array(
    	'#type' => 'markup',
    	'#markup' => $this->t('Datos'),
	);
  }
}
?>