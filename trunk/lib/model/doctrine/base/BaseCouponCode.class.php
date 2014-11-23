<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CouponCode', 'doctrine');

/**
 * BaseCouponCode
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $type
 * @property string $code
 * @property boolean $is_used
 * @property timestamp $created_at
 * 
 * @method integer    getId()         Returns the current record's "id" value
 * @method string     getType()       Returns the current record's "type" value
 * @method string     getCode()       Returns the current record's "code" value
 * @method boolean    getIsUsed()     Returns the current record's "is_used" value
 * @method timestamp  getCreatedAt()  Returns the current record's "created_at" value
 * @method CouponCode setId()         Sets the current record's "id" value
 * @method CouponCode setType()       Sets the current record's "type" value
 * @method CouponCode setCode()       Sets the current record's "code" value
 * @method CouponCode setIsUsed()     Sets the current record's "is_used" value
 * @method CouponCode setCreatedAt()  Sets the current record's "created_at" value
 * 
 * @package    vogue
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCouponCode extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('coupon_code');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('type', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('code', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('is_used', 'boolean', null, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}