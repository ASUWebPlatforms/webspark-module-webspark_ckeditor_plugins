<?php

namespace Drupal\webspark_ckeditor_plugins\Plugin\CKEditorPlugin;

use Drupal\Core\Plugin\PluginBase;
use Drupal\editor\Entity\Editor;
use Drupal\ckeditor\CKEditorPluginInterface;
use Drupal\ckeditor\CKEditorPluginContextualInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\ckeditor\CKEditorPluginConfigurableInterface;

/**
 * Defines the "websparkmediaalter" plugin.
 *
 * @CKEditorPlugin(
 *   id = "websparkmediaalter",
 *   label = @Translation("Webspark Media Alter"),
 *   module = "ckeditor"
 * )
 */
class WebsparkMediaAlter extends PluginBase implements CKEditorPluginInterface, CKEditorPluginContextualInterface, CKEditorPluginConfigurableInterface {

  /**
   * {@inheritdoc}
   */
  public function isInternal() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return drupal_get_path('module', 'webspark_ckeditor_plugins') . '/js/plugins/' . $this->getPluginId() . '/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   *
   * @see \Drupal\editor\Form\EditorImageDialog
   * @see editor_image_upload_settings_form()
   */
  public function settingsForm(array $form, FormStateInterface $form_state, Editor $editor) {

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function isEnabled(Editor $editor) {
    $format = $editor->getFilterFormat();
    return ($format && $format->id() === 'minimal_format') ? FALSE : TRUE;
  }

}
