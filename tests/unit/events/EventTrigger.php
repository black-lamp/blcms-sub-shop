<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace tests\unit\events;

use yii\base\Component;

use bl\cms\subshop\base\ShopEventInterface;
use bl\cms\subshop\events\CreateEvent;
use bl\cms\subshop\events\EditEvent;
use bl\cms\subshop\events\RemoveEvent;

/**
 * Helper class for [[LoggerBootstrapTest]]
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class EventTrigger extends Component implements ShopEventInterface
{
    /**
     * Triggering [[CreateEvent]]
     */
    public function triggerCreate()
    {
        $this->trigger(CreateEvent::EVENT_SUB_SHOP_CREATE, new CreateEvent([
            'entityName' => 'Create event test',
            'entityId ' => 1
        ]));
    }

    /**
     * Triggering [[EditEvent]]
     */
    public function triggerEdit()
    {
        $this->trigger(EditEvent::EVENT_SUB_SHOP_EDIT, new EditEvent([
            'entityName' => 'Edit event test',
            'entityId' => 2
        ]));
    }

    /**
     * Triggering [[RemoveEvent]]
     */
    public function triggerRemove()
    {
        $this->trigger(RemoveEvent::EVENT_SUB_SHOP_REMOVE, new RemoveEvent([
            'entityName' => 'Remove event test',
            'entityId' => 3
        ]));
    }
}