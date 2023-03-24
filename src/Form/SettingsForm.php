<?php

namespace Drupal\crossposting_telegram\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configure Расписание settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  public function __construct(
    ConfigFactoryInterface $config_factory
  ) {
    parent::__construct($config_factory);
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'crossposting_telegram.settings'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'crossposting_telegram_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('crossposting_telegram.settings');

    $form['key'] = array(
      '#type' => 'key_select',
      '#title' => $this->t('Access Token'),
      '#default_value' => $config->get('key'),
    );

    $form['chat_id'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Chat ID'),
      '#description' => $this->t('Chat ID in Telegram. You can open any post from wall and copy first value after -this is token_chat_id.'),
      '#default_value' => $config->get('chat_id'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('crossposting_telegram.settings')
      ->set('key', $form_state->getValue('key'))
      ->set('chat_id', $form_state->getValue('chat_id'))
      ->save();
  }
}
