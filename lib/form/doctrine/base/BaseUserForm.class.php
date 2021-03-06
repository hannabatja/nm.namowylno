<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'username'        => new sfWidgetFormInputText(),
      'password'        => new sfWidgetFormInputText(),
      'firstname'       => new sfWidgetFormInputText(),
      'lastname'        => new sfWidgetFormInputText(),
      'fullname'        => new sfWidgetFormInputText(),
      'about'           => new sfWidgetFormTextarea(),
      'email'           => new sfWidgetFormInputText(),
      'mobile'          => new sfWidgetFormInputText(),
      'avator'          => new sfWidgetFormInputText(),
      'image'           => new sfWidgetFormInputText(),
      'is_active'       => new sfWidgetFormInputCheckbox(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'logged_at'       => new sfWidgetFormDateTime(),
      'activation_code' => new sfWidgetFormInputText(),
      'is_admin'        => new sfWidgetFormInputCheckbox(),
      'ip'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'        => new sfValidatorString(array('max_length' => 255)),
      'password'        => new sfValidatorString(array('max_length' => 255)),
      'firstname'       => new sfValidatorString(array('max_length' => 255)),
      'lastname'        => new sfValidatorString(array('max_length' => 255)),
      'fullname'        => new sfValidatorString(array('max_length' => 255)),
      'about'           => new sfValidatorString(),
      'email'           => new sfValidatorString(array('max_length' => 255)),
      'mobile'          => new sfValidatorString(array('max_length' => 255)),
      'avator'          => new sfValidatorString(array('max_length' => 255)),
      'image'           => new sfValidatorString(array('max_length' => 255)),
      'is_active'       => new sfValidatorBoolean(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'logged_at'       => new sfValidatorDateTime(array('required' => false)),
      'activation_code' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_admin'        => new sfValidatorBoolean(array('required' => false)),
      'ip'              => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
