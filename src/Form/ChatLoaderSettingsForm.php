<?php
/**
 * @file
 * Contains Drupal\chatloader\Form\ChatLoaderSettingsForm
 */

namespace Drupal\chatloader\Form;

use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form to coonfigure Chat Loader module settings
 */
class ChatLoaderSettingsForm extends ConfigFormBase
{

  /**
   * {@interitdoc}
   */
  public function getFormId()
  {
    return 'chatloader_settings_form';
  }

  function chatloader_perm() {
    return array('administer chatloader');
  }

  /**
   * {@interitdoc}
   */
  protected function getEditableConfigNames()
  {
    return [
      'chatloader.settings'
    ];
  }

  /**
   * {@interitdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    /*$types = node_type_get_names();*/
    $config = $this->config('chatloader.settings');
    $form['chatloader_css'] = array(
      '#type' => 'textarea',
      '#title' => 'CSS',
      '#default_value' => $config->get('chatloader.chatloader_css'),
      '#description' => t('Add the CSS or stylesheets for your chat module.'),
    );
    $form['chatloader_script'] = array(
      '#type' => 'textarea',
      '#title' => 'Script',
      '#default_value' => $config->get('chatloader.chatloader_script'),
      '#description' => t('Add the JavaScript for your chat module.'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@interitdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $css = $form_state->getValue('chatloader_css');
    $script = $form_state->getValue('chatloader_script');
    $config = $this->config('chatloader.settings');
    $config->set('chatloader.chatloader_css', $css);
    $config->set('chatloader.chatloader_script', $script);
    $config->save();
    parent::submitForm($form, $form_state);
  }

}
