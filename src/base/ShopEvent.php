<?php
namespace bl\cms\subshop\base;

use yii\base\Event;

/**
 * Base shop event definition class
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
abstract class ShopEvent extends Event
{
    /**
     * @var string Entity name where triggered the event
     */
    public $entityName;
    /**
     * @var integer Entity primary key
     */
    public $entityId;
}