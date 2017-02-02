<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

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